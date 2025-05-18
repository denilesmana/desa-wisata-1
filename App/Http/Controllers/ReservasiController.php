<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use App\Models\DiskonPaket;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = Reservasi::with(['pelanggan.user', 'paketWisata'])->latest()->get();

        return view('reservasi.index', [
            'title' => 'Reservasi',
            'reservasi' => $reservasi
        ]);
    }

    public function updateStatus($id, Request $request)
    {
        $validStatuses = ['pesan', 'dibayar', 'selesai'];
        
        if (!in_array($request->status, $validStatuses)) {
            return response()->json(['success' => false, 'message' => 'Status tidak valid']);
        }

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status_reservasi_wisata = $request->status;
        $reservasi->save();

        return response()->json(['success' => true]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_paket_wisata' => 'required|exists:paket_wisata,id',
            'tgl_reservasi_wisata' => 'required|date|after_or_equal:today',
            'tgl_selesai_reservasi' => 'required|date|after_or_equal:tgl_reservasi_wisata',
            'jumlah_peserta' => 'required|integer|min:1',
            'file_bukti_tf' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $user = Auth::user();
        $pelanggan = Pelanggan::where('id_users', $user->id)->firstOrFail();
        $paketWisata = PaketWisata::findOrFail($request->id_paket_wisata);

        // Validasi ketersediaan tanggal hanya untuk pelanggan yang sama
        $existingReservasi = Reservasi::where('id_paket_wisata', $request->id_paket_wisata)
            ->where('id_pelanggan', $pelanggan->id) // Hanya cek untuk pelanggan ini saja
            ->where(function($query) use ($request) {
                $query->whereBetween('tgl_reservasi_wisata', [$request->tgl_reservasi_wisata, $request->tgl_selesai_reservasi])
                    ->orWhereBetween('tgl_selesai_reservasi', [$request->tgl_reservasi_wisata, $request->tgl_selesai_reservasi])
                    ->orWhere(function($q) use ($request) {
                        $q->where('tgl_reservasi_wisata', '<=', $request->tgl_reservasi_wisata)
                            ->where('tgl_selesai_reservasi', '>=', $request->tgl_selesai_reservasi);
                    });
            })
            ->exists();

        if ($existingReservasi) {
            return back()->withErrors([
                'tgl_reservasi_wisata' => 'Anda sudah memiliki reservasi pada tanggal tersebut. Silakan pilih tanggal lain.'
            ])->withInput();
        }

        // Hitung durasi berdasarkan input pengguna
        $tglMulai = new \DateTime($request->tgl_reservasi_wisata);
        $tglSelesai = new \DateTime($request->tgl_selesai_reservasi);
        $durasi = $tglMulai->diff($tglSelesai)->days + 1; // +1 untuk menghitung inklusif

        // Hitung harga dan diskon
        $today = now()->format('Y-m-d');
        $diskonPaket = DiskonPaket::where('id_paket', $paketWisata->id)
            ->where('aktif', 1)
            ->where(function($q) use ($today) {
                $q->whereNull('tgl_mulai')->orWhere('tgl_mulai', '<=', $today);
            })
            ->where(function($q) use ($today) {
                $q->whereNull('tgl_akhir')->orWhere('tgl_akhir', '>=', $today);
            })
            ->first();

        $harga = $paketWisata->harga_per_pack;
        $jumlahPeserta = $request->jumlah_peserta;
        $subtotal = $harga * $jumlahPeserta;

        $diskonPersen = $diskonPaket ? $diskonPaket->diskon : 0;
        $nilaiDiskon = ($subtotal * $diskonPersen) / 100;
        $totalBayar = $subtotal - $nilaiDiskon;

        // Simpan bukti transfer
        $filePath = $request->file('file_bukti_tf')->store('bukti_transfer', 'public');

        // Buat reservasi
        $reservasi = Reservasi::create([
            'id_pelanggan' => $pelanggan->id,
            'id_paket_wisata' => $paketWisata->id,
            'tgl_reservasi_wisata' => $request->tgl_reservasi_wisata,
            'tgl_selesai_reservasi' => $request->tgl_selesai_reservasi,
            'durasi' => $durasi,
            'harga' => $harga,
            'jumlah_peserta' => $jumlahPeserta,
            'diskon' => $diskonPersen,
            'nilai_diskon' => $nilaiDiskon,
            'total_bayar' => $totalBayar,
            'file_bukti_tf' => $filePath,
            'status_reservasi_wisata' => 'pesan',
            'id_diskon_paket' => $diskonPaket ? $diskonPaket->id : null 
        ]);

        return redirect()->route('paket_wisata.show', $paketWisata->id)->with('success', 'Reservasi berhasil dibuat! Total yang harus dibayar: Rp ' . number_format($totalBayar, 0, ',', '.'));
    }


    
    public function calculate(Request $request)
    {
        $request->validate([
            'id_paket_wisata' => 'required|exists:paket_wisata,id',
            'jumlah_peserta' => 'required|integer|min:1',
            'tgl_reservasi_wisata' => 'sometimes|date'
        ]);

        $paketWisata = PaketWisata::findOrFail($request->id_paket_wisata);

        // Cari diskon aktif berdasarkan tanggal hari ini
        $today = now()->format('Y-m-d');
        $diskonPaket = DiskonPaket::where('id_paket', $paketWisata->id)
            ->where('aktif', 1)
            ->where(function($q) use ($today) {
                $q->whereNull('tgl_mulai')->orWhere('tgl_mulai', '<=', $today);
            })
            ->where(function($q) use ($today) {
                $q->whereNull('tgl_akhir')->orWhere('tgl_akhir', '>=', $today);
            })
            ->first();

        // Hitung subtotal
        $harga = $paketWisata->harga_per_pack;
        $jumlahPeserta = $request->jumlah_peserta;
        $subtotal = $harga * $jumlahPeserta;

        // Hitung diskon dan total bayar
        $diskonPersen = $diskonPaket ? $diskonPaket->diskon : 0;
        $nilaiDiskon = ($subtotal * $diskonPersen) / 100;
        $totalBayar = $subtotal - $nilaiDiskon;

        // Hitung tanggal selesai jika tanggal reservasi diberikan
        $tglSelesai = null;
        if ($request->tgl_reservasi_wisata) {
            $tglSelesai = Carbon::parse($request->tgl_reservasi_wisata)
                ->addDays($paketWisata->durasi ?? 1)
                ->format('Y-m-d');
        }

        return response()->json([
            'harga' => $harga,
            'subtotal' => $subtotal,
            'diskon_persen' => $diskonPersen,
            'nilai_diskon' => $nilaiDiskon,
            'total_bayar' => $totalBayar,
            'durasi' => $paketWisata->durasi ?? 1,
            'tgl_selesai' => $tglSelesai,
            'formatted' => [
                'harga' => 'Rp ' . number_format($harga, 0, ',', '.'),
                'subtotal' => 'Rp ' . number_format($subtotal, 0, ',', '.'),
                'diskon_persen' => $diskonPersen . '%',
                'nilai_diskon' => 'Rp ' . number_format($nilaiDiskon, 0, ',', '.'),
                'total_bayar' => 'Rp ' . number_format($totalBayar, 0, ',', '.'),
                'tgl_selesai' => $tglSelesai ? Carbon::parse($tglSelesai)->format('d F Y') : null
            ]
        ]);
    }




    public function generateStruk($id)
    {
        $reservasi = Reservasi::with(['pelanggan.user', 'paketWisata'])->findOrFail($id);
        
        // Verifikasi bahwa user yang mengakses adalah pemilik reservasi atau admin
        if (Auth::user()->role !== 'admin' && Auth::id() !== $reservasi->pelanggan->id_users) {
            abort(403, 'Unauthorized action.');
        }

        $pdf = PDF::loadView('reservasi.struk', compact('reservasi'));
        return $pdf->download('struk-reservasi-' . $reservasi->id . '.pdf');
    }

    
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
