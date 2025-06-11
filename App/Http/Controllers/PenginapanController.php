<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penginapan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Penginapan.index', [
            'title' => 'Penginapan',
            'penginapan' => Penginapan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Penginapan.create', [
            'title' => 'Tambah Penginapan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penginapan' => 'required|max:255',
            'deskripsi' => 'required',
            'fasilitas' => 'required|max:255',
            'foto1' => 'image|file|max:2048',
            'foto2' => 'image|file|max:2048',
            'foto3' => 'image|file|max:2048',
            'foto4' => 'image|file|max:2048',
            'foto5' => 'image|file|max:2048'
        ]);
  
        if ($request->hasFile('foto1')) {
            $validatedData['foto1'] = $request->file('foto1')->store('penginapan-images', 'public');
        }
        if ($request->hasFile('foto2')) {
            $validatedData['foto2'] = $request->file('foto2')->store('penginapan-images', 'public');
        }
        if ($request->hasFile('foto3')) {
            $validatedData['foto3'] = $request->file('foto3')->store('penginapan-images', 'public');
        }
        if ($request->hasFile('foto4')) {
            $validatedData['foto4'] = $request->file('foto4')->store('penginapan-images', 'public');
        }
        if ($request->hasFile('foto5')) {
            $validatedData['foto5'] = $request->file('foto5')->store('penginapan-images', 'public');
        }

  
        Penginapan::create($validatedData);

        Alert::success('Berhasil', 'Penginapan berhasil ditambahkan!');
        return redirect('/penginapan');
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
        $penginapan = Penginapan::findOrFail($id);
        return view('Penginapan.edit', [
            'title' => 'Edit Penginapan',
            'penginapan' => $penginapan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penginapan = Penginapan::findOrFail($id);
        
        $validatedData = $request->validate([
            'nama_penginapan' => 'required|max:255',
            'deskripsi' => 'required',
            'fasilitas' => 'required|max:255',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photoFields = ['foto1', 'foto2', 'foto3', 'foto4', 'foto5'];
        
        foreach ($photoFields as $field) {
            if ($request->hasFile($field)) {
                // Hapus foto lama jika ada
                if ($penginapan->$field && Storage::disk('public')->exists($penginapan->$field)) {
                    Storage::disk('public')->delete($penginapan->$field);
                }
                
                // Simpan foto baru
                $validatedData[$field] = $request->file($field)->store('penginapan-images', 'public');
            } else {
                // Pertahankan foto lama jika tidak ada upload baru
                $validatedData[$field] = $penginapan->$field;
            }
        }

        $penginapan->update($validatedData);

        Alert::success('Berhasil', 'Penginapan berhasil diperbarui!');
        return redirect()->route('penginapan.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penginapan = Penginapan::findOrFail($id);

        // Hapus semua foto yang terkait
        for ($i = 1; $i <= 5; $i++) {
            $field = 'foto'.$i;
            if ($penginapan->$field && Storage::disk('public')->exists($penginapan->$field)) {
                Storage::disk('public')->delete($penginapan->$field);
            }
        }

        $penginapan->delete();

        Alert::success('Berhasil', 'Penginapan berhasil dihapus!');
        return redirect()->route('penginapan.index');
    }

}
