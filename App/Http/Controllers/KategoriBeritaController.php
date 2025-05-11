<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $kategori_berita = KategoriBerita::all();
        return view('KategoriBerita.index', compact('kategori_berita'), [
            'title' => 'Kategori Berita',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('KategoriBerita.create', [
            'title' => 'Tambah Kategori Berita',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_berita' => 'required|string|max:255',
        ]);

        KategoriBerita::create([
            'kategori_berita' => $request->kategori_berita,
        ]);


        return redirect('/kategori_berita')->with('success', 'Kategori Berita berhasil ditambahkan');
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
    public function edit(KategoriBerita $kategori_berita)
    {
    return view('KategoriBerita.edit', [
        'title' => 'Edit Kategori Berita',
        'kategori_berita' => $kategori_berita,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBerita $kategori_berita)
    {
        $validatedData = $request->validate([
            'kategori_berita' => 'required|string|max:255',
        ]);

        KategoriBerita::where('id', $kategori_berita->id)
            ->update($validatedData);

        return redirect('/kategori_berita')->with('success', 'Kategori Berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBerita $kategori_berita)
    {
        KategoriBerita::destroy($kategori_berita->id);

        return redirect('/kategori_berita')->with('success', 'Kategori Berita berhasil dihapus');
    }
}
