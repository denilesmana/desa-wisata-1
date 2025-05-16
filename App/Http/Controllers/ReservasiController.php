<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

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
        // Validasi input
        $request->validate([
            'id_paket_wisata' => 'required|exists:paket_wisata,id',
            'tgl_reservasi_wisata' => 'required|date',
            'jumlah_peserta' => 'required|integer|min:1',
            'file_bukti_tf' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'diskon' => 'nullable|numeric|min:0|max:100'
        ]);

        // Dapatkan data pelanggan dari user yang login
        $user = Auth::user();
        $pelanggan = Pelanggan::where('id_users', $user->id)->firstOrFail();

        // Dapatkan data paket wisata
        $paketWisata = PaketWisata::findOrFail($request->id_paket_wisata);

        // Hitung subtotal, diskon, dan total bayar
        $harga = $paketWisata->harga_per_pack;
        $jumlahPeserta = $request->jumlah_peserta;

        // Diskon 5% per peserta
        $diskonPersen = 5 * $jumlahPeserta; // 5% per peserta, sesuaikan dengan jumlah peserta
        if ($diskonPersen > 100) {
            $diskonPersen = 100; // Tidak boleh lebih dari 100%
        }
        
        $subtotal = $harga * $jumlahPeserta;
        $nilaiDiskon = ($subtotal * $diskonPersen) / 100;
        $totalBayar = $subtotal - $nilaiDiskon;

        // Simpan file bukti transfer
        $filePath = $request->file('file_bukti_tf')->store('bukti_transfer', 'public');

        // Buat reservasi baru
        $reservasi = Reservasi::create([
            'id_pelanggan' => $pelanggan->id,
            'id_paket_wisata' => $paketWisata->id,
            'tgl_reservasi_wisata' => $request->tgl_reservasi_wisata,
            'harga' => $harga,
            'jumlah_peserta' => $jumlahPeserta,
            'diskon' => $diskonPersen,
            'nilai_diskon' => $nilaiDiskon,
            'total_bayar' => $totalBayar,
            'file_bukti_tf' => $filePath,
            'status_reservasi_wisata' => 'pesan'
        ]);

        return redirect()->route('paket_wisata.show', $paketWisata->id)
            ->with('success', 'Reservasi berhasil dibuat! Total yang harus dibayar: Rp ' . number_format($totalBayar, 0, ',', '.'));
    }


    public function calculate(Request $request)
    {
        // Endpoint untuk kalkulasi real-time (AJAX)
        $request->validate([
            'id_paket_wisata' => 'required|exists:paket_wisata,id',
            'jumlah_peserta' => 'required|integer|min:1',
            'diskon' => 'nullable|numeric|min:0|max:100'
        ]);

        $paketWisata = PaketWisata::findOrFail($request->id_paket_wisata);
        
        $harga = $paketWisata->harga_per_pack;
        $jumlahPeserta = $request->jumlah_peserta;

        // Diskon 5% per peserta
        $diskonPersen = 5 * $jumlahPeserta;
        if ($diskonPersen > 100) {
            $diskonPersen = 100;
        }
        
        $subtotal = $harga * $jumlahPeserta;
        $nilaiDiskon = ($subtotal * $diskonPersen) / 100;
        $totalBayar = $subtotal - $nilaiDiskon;

        return response()->json([
            'harga' => $harga,
            'subtotal' => $subtotal,
            'nilai_diskon' => $nilaiDiskon,
            'total_bayar' => $totalBayar,
            'formatted' => [
                'harga' => 'Rp ' . number_format($harga, 0, ',', '.'),
                'subtotal' => 'Rp ' . number_format($subtotal, 0, ',', '.'),
                'nilai_diskon' => 'Rp ' . number_format($nilaiDiskon, 0, ',', '.'),
                'total_bayar' => 'Rp ' . number_format($totalBayar, 0, ',', '.')
            ]
        ]);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
