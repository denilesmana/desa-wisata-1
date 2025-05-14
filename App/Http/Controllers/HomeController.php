<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWisata;
use App\Models\ObyekWisata;
use App\Models\PaketWisata;
use App\Models\Penginapan;
use App\Models\Berita;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_wisata = KategoriWisata::all(); 
        $penginapan = Penginapan::all();
        $paket_wisata = PaketWisata::all();
        $berita = Berita::all();
        return view('fe.home', [
            'title' => 'Home',
            'kategori_wisata' => $kategori_wisata,
            'penginapan' => $penginapan,
            'paket_wisata' => $paket_wisata,
            'berita' => $berita,
            
        ]);
    }

    public function obyekWisataByKategori($id)
    {
        $kategori = KategoriWisata::findOrFail($id);
        $wisata = ObyekWisata::where('id_kategori_wisata', $id)->get();

        return view('fe.detail_wisata', [
            'title' => 'Obyek Wisata ' . $kategori->kategori_wisata,
            'wisata' => $wisata,
            'kategori' => $kategori
        ]);
    }

    public function showPenginapan($id)
    {
        $penginapan = \App\Models\Penginapan::findOrFail($id);

        return view('fe.detail_penginapan', [
            'title' => 'Detail Penginapan',
            'penginapan' => $penginapan
        ]);
    }

    public function showPaket($id)
    {
        $paket = PaketWisata::findOrFail($id);
        $paket->galeri = json_decode($paket->galeri, true) ?? [];

        return view('fe.detail_paket', compact('paket'), [
            'title' => 'Detail Paket Wisata',
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
    public function showKategoriWisata(string $id)
    {
        $kategori = ObyekWisata::with('kategori_wisata')->findOrFail($id);

        return view('fe.detail_wisata', compact('kategori'), [
            'title' => 'Obyek Wisata ',
        ]);
    }

    public function showObyekWisata(string $id)
    {
        $obyek_wisata = ObyekWisata::with('kategori_wisata')->findOrFail($id);

        return view('fe.detail_wisata', compact('obyek_wisata'), [
            'title' => 'Obyek Wisata ',
        ]);
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
