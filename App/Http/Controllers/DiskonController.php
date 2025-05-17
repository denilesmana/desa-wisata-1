<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiskonPaket;
use Carbon\Carbon;
use App\Models\PaketWisata;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DiskonPaket::whereNotNull('tgl_akhir')
            ->where('tgl_akhir', '<', Carbon::today())
            ->where('aktif', 1)
            ->update(['aktif' => 0]);
        
        $paket = PaketWisata::all();
        $today = Carbon::today()->format('Y-m-d');
        $diskon = DiskonPaket::with('paket_wisata')
            ->where('aktif', 1)
            ->where(function($q) use ($today) {
                $q->whereNull('tgl_mulai')->orWhere('tgl_mulai', '<=', $today);
            })
            ->where(function($q) use ($today) {
                $q->whereNull('tgl_akhir')->orWhere('tgl_akhir', '>=', $today);
            })
            ->get()
            ->keyBy('id_paket');

        return view('diskon.index', [
            'title' => "Diskon",
            'paket' => $paket,
            'diskon' => $diskon,
        ]);
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
        //
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

    public function updateAll(Request $request)
    {
        DiskonPaket::whereNotNull('tgl_akhir')
            ->where('tgl_akhir', '<', Carbon::today())
            ->where('aktif', 1)
            ->update(['aktif' => 0]);

        foreach ($request->id_paket as $id) {
            $tglMulai = $request->tgl_mulai[$id] ?? null;
            $tglAkhir = $request->tgl_akhir[$id] ?? null;

            $aktif = (!empty($tglMulai) && !empty($tglAkhir)) ? 1 : (in_array($id, $request->aktif ?? []) ? 1 : 0);

            DiskonPaket::updateOrCreate(
                ['id_paket' => $id],
                [
                    'aktif' => $aktif,
                    'diskon' => $request->diskon[$id] ?? 0,
                    'tgl_mulai' => $tglMulai,
                    'tgl_akhir' => $tglAkhir,
                ]
            );
        }
        return back()->with('success', 'Diskon berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
