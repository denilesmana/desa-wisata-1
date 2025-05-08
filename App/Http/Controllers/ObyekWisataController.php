<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWisata;
use App\Models\ObyekWisata;
use Illuminate\Support\Facades\Storage;

class ObyekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obyek_wisata = ObyekWisata::with('kategori_wisata')->paginate(10);
        return view('ObyekWisata.index', compact('obyek_wisata'), [
            'title' => 'Obyek Wisata'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_wisata = KategoriWisata::all();

        return view('ObyekWisata.create', compact('kategori_wisata'), [
            'title' => 'Tambah Obyek Wisata',
            'kategori_wisata' => $kategori_wisata,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_wisata' => 'required|max:255',
            'deskripsi_wisata' => 'required',
            'id_kategori_wisata' => 'required|exists:kategori_wisata,id',
            'fasilitas' => 'required|max:255',
            'foto1' => 'image|file|max:2048',
            'foto2' => 'image|file|max:2048',
            'foto3' => 'image|file|max:2048',
            'foto4' => 'image|file|max:2048',
            'foto5' => 'image|file|max:2048'
        ]);

        if ($request->file('foto1')) {
            $validatedData['foto1'] = $request->file('foto1')->store('obyek-wisata-images', 'public');
        }
        if ($request->file('foto2')) {
            $validatedData['foto2'] = $request->file('foto2')->store('obyek-wisata-images', 'public');
        }
        if ($request->file('foto3')) {
            $validatedData['foto3'] = $request->file('foto3')->store('obyek-wisata-images', 'public');
        }
        if ($request->file('foto4')) {
            $validatedData['foto4'] = $request->file('foto4')->store('obyek-wisata-images', 'public');
        }
        if ($request->file('foto5')) {
            $validatedData['foto5'] = $request->file('foto')->store('obyek-wisata-images', 'public');
        }

        ObyekWisata::create($validatedData);

        return redirect('/obyek_wisata')->with('success', 'Obyek Wisata berhasil ditambahkan!');
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
    public function edit(ObyekWisata $obyek_wisata)
    {
        $kategori_wisata = KategoriWisata::all();

        return view('ObyekWisata.edit', compact('obyek_wisata', 'kategori_wisata'), [
            'title' => 'Edit Obyek Wisata',
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $obyekWisata = ObyekWisata::findOrFail($id);
    
    $validatedData = $request->validate([
        'nama_wisata' => 'required|max:255',
        'deskripsi_wisata' => 'required',
        'id_kategori_wisata' => 'required|exists:kategori_wisata,id',
        'fasilitas' => 'required|max:255',
        'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Handle file uploads
    $photoFields = ['foto1', 'foto2', 'foto3', 'foto4', 'foto5'];
    
    foreach ($photoFields as $field) {
        if ($request->hasFile($field)) {
            // Delete old file if exists
            if ($obyekWisata->$field) {
                Storage::delete($obyekWisata->$field);
            }
            
            // Store new file
            $validatedData[$field] = $request->file($field)->store('obyek-wisata-images', 'public');
        } else {
            // Keep existing file if no new file uploaded
            $validatedData[$field] = $obyekWisata->$field;
        }
    }

    $obyekWisata->update($validatedData);

    return redirect('/obyek_wisata')->with('success', 'Obyek Wisata berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obyek_wisata = ObyekWisata::findOrFail($id);
        if ($obyek_wisata->foto1) {
            Storage::delete($obyek_wisata->foto1);
        }
        if ($obyek_wisata->foto2) {
            Storage::delete($obyek_wisata->foto2);
        }
        if ($obyek_wisata->foto3) {
            Storage::delete($obyek_wisata->foto3);
        }
        if ($obyek_wisata->foto4) {
            Storage::delete($obyek_wisata->foto4);
        }
        if ($obyek_wisata->foto5) {
            Storage::delete($obyek_wisata->foto5);
        }

        $obyek_wisata->delete();

        return redirect('/obyek_wisata')->with('success', 'Obyek Wisata berhasil dihapus!');
    }
}
