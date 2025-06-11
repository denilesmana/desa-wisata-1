<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::with('kategori_berita')->paginate(10);
        return view('berita.index', compact('berita'), [
        'title' => 'Berita'
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_berita = KategoriBerita::all();

        return view('berita.create', compact('kategori_berita'), [
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

        Alert::success('Berhasil', 'Berita berhasil ditambahkan!');
        return redirect('/berita');
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

        return view('berita.edit', compact('berita', 'kategori_berita'), [
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
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }

            $validatedData['foto'] = $request->file('foto')->store('berita-images', 'public');
        }

        $berita->update($validatedData);
        
        Alert::success('Berhasil', 'Berita berhasil diperbarui!');
        return redirect('/berita');
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

    Alert::success('Berhasil', 'Berita berhasil dihapus!');
    return redirect()->route('berita.index');
    }
}

