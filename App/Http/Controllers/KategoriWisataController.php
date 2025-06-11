<?php

namespace App\Http\Controllers;

use App\Models\KategoriWisata;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $kategori_wisata = KategoriWisata::all(); 
    return view('KategoriWisata.index', compact('kategori_wisata'), [
        'title' => 'Kategori Wisata',
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('KategoriWisata.create', [
            'title' => 'Tambah Kategori Wisata'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_wisata' => 'required|string|max:255',
        ]);

        KategoriWisata::create([
            'kategori_wisata' => $request->kategori_wisata,
        ]);

        Alert::success('Berhasil', 'Kategori Wisata berhasil ditambahkan!');
        return redirect('/kategori_wisata');
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
    public function edit(KategoriWisata $kategori_wisata)
    {
        return view('KategoriWisata.edit', [
            'title' => 'Edit Kategori Wisata',
            'kategori_wisata' => $kategori_wisata,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriWisata $kategori_wisata)
    {
        $validatedData = $request->validate([
            'kategori_wisata' => 'required|string|max:255',
        ]);

        KategoriWisata::where('id', $kategori_wisata->id)
            ->update($validatedData);

        Alert::success('Berhasil', 'Kategori Wisata berhasil diperbarui!');
        return redirect('/kategori_wisata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriWisata $kategori_wisata)
    {
        KategoriWisata::destroy($kategori_wisata->id);

        Alert::success('Berhasil', 'Kategori Wisata berhasil dihapus!');
        return redirect('/kategori_wisata');
    }
}
