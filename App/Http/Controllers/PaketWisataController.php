<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('PaketWisata.index', [
            'title' => 'Paket Wisata',
            'paket_wisata' => PaketWisata::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PaketWisata.create', [
            'title' => 'Tambah Paket Wisata'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket' => 'required|max:255',
            'deskripsi' => 'required',
            'fasilitas' => 'required|max:255',
            'harga_per_pack' => 'required|numeric',
            'foto1' => 'image|file|max:2048',
            'foto2' => 'image|file|max:2048',
            'foto3' => 'image|file|max:2048',
            'foto4' => 'image|file|max:2048',
            'foto5' => 'image|file|max:2048'
        ]);

        // Store the images
        if ($request->hasFile('foto1')) {
            $validatedData['foto1'] = $request->file('foto1')->store('paket-wisata-images', 'public');
        }
        if ($request->hasFile('foto2')) {
            $validatedData['foto2'] = $request->file('foto2')->store('paket-wisata-images', 'public');
        }
        if ($request->hasFile('foto3')) {
            $validatedData['foto3'] = $request->file('foto3')->store('paket-wisata-images', 'public');
        }
        if ($request->hasFile('foto4')) {
            $validatedData['foto4'] = $request->file('foto4')->store('paket-wisata-images', 'public');
        }
        if ($request->hasFile('foto5')) {
            $validatedData['foto5'] = $request->file('foto5')->store('paket-wisata-images', 'public');
        }

        PaketWisata::create($validatedData);

        return redirect()->route('paket_wisata.index')->with('success', 'Paket Wisata created successfully.');
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
        $paket_wisata = PaketWisata::findOrFail($id);
        return view('PaketWisata.edit', [
            'title' => 'Edit Paket Wisata',
            'paket_wisata' => $paket_wisata
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paket_wisata = PaketWisata::findOrFail($id);

        $validatedData = $request->validate([
            'nama_paket' => 'required|max:255',
            'deskripsi' => 'required',
            'fasilitas' => 'required|max:255',
            'harga_per_pack' => 'required|numeric',
            'foto1' => 'image|file|max:2048',
            'foto2' => 'image|file|max:2048',
            'foto3' => 'image|file|max:2048',
            'foto4' => 'image|file|max:2048',
            'foto5' => 'image|file|max:2048'
        ]);

        $photoFields = ['foto1', 'foto2', 'foto3', 'foto4', 'foto5'];
        foreach ($photoFields as $field) {
            if ($request->hasFile($field)) {
                $validatedData[$field] = $request->file($field)->store('paket-wisata-images', 'public');
            }
        }

        $paket_wisata->update($validatedData);
        return redirect()->route('paket_wisata.index')->with('success', 'Paket Wisata updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paket_wisata = PaketWisata::findOrFail($id);

        // Hapus file foto dari storage jika perlu
        for ($i = 1; $i <= 5; $i++) {
            $foto = 'foto' . $i;
            if ($paket_wisata->$foto && Storage::exists($paket_wisata->$foto)) {
                Storage::delete($paket_wisata->$foto);
            }
        }

        $paket_wisata->delete();

        return redirect()->route('paket_wisata.index')->with('success', 'Paket wisata berhasil dihapus.');
    }

}
