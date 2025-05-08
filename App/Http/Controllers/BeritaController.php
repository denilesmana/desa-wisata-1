<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::with('kategori_berita')->paginate(10);
        return view('Berita.index', compact('berita'), [
        'title' => 'Berita'
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_berita = KategoriBerita::all();

        return view('Berita.create', compact('kategori_berita'), [
            'title' => 'Tambah Berita',
            'kategori_berita' => $kategori_berita,
    ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'berita' => 'required',
            'tgl_post' => 'required|date',
            'id_kategori_berita' => 'required|exists:kategori_berita,id',
            'foto' => 'image|file|max:2048'
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('berita-images', 'public');
        }

        Berita::create($validatedData);

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan!');
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
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategori_berita = KategoriBerita::all();

        return view('Berita.edit', compact('berita', 'kategori_berita'), [
            'title' => 'Edit Berita',
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'judul' => 'required|max:255',
        'berita' => 'required',
        'tgl_post' => 'required|date',
        'id_kategori_berita' => 'required|exists:kategori_berita,id',
        'foto' => 'image|file|max:2048'
    ]);

    $berita = Berita::findOrFail($id);

    if ($request->file('foto')) {
        // Hapus foto lama jika ada
        if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
            Storage::disk('public')->delete($berita->foto);
        }

        // Simpan foto baru
        $validatedData['foto'] = $request->file('foto')->store('berita-images', 'public');
    }

    $berita->update($validatedData);

    return redirect('/berita')->with('success', 'Berita berhasil diubah!');
}


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $berita = Berita::findOrFail($id);

    if ($berita->foto && Storage::exists('public/' . $berita->foto)) {
        Storage::delete('public/' . $berita->foto);
    }

    $berita->delete();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}

