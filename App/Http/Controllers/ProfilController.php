<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $pelanggan = $user->pelanggan ?: Pelanggan::create([
            'id_users' => $user->id,
            'nama_lengkap' => $user->name,
            'no_hp' => '081234567890',
            'alamat' => 'Alamat belum diisi',
            'foto' => null
        ]);

        return view('ProfilPelanggan.index', [
            'title' => 'Profil Saya',
            'user' => $user,
            'pelanggan' => $pelanggan
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
    public function show()
    {
        $pelanggan = Pelanggan::where('id_users', Auth::id())->firstOrFail();
        return view('profil.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        
        // Get or create pelanggan data
        $pelanggan = $user->pelanggan ?? Pelanggan::create([
            'id_users' => $user->id,
            'nama_lengkap' => $user->name,
            'no_hp' => '081234567890',
            'alamat' => 'Alamat belum diisi',
            'foto' => null
        ]);

        return view('ProfilPelanggan.edit', [
            'title' => 'Edit Profil',
            'user' => $user,
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($user instanceof \App\Models\User) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save(); 
            
            if ($user->pelanggan) {
                $pelangganData = [
                    'nama_lengkap' => $request->nama_lengkap,
                    'no_hp' => $request->no_hp,
                    'alamat' => $request->alamat
                ];

                if ($request->hasFile('foto')) {
                    if ($user->pelanggan->foto) {
                        Storage::delete('public/'.$user->pelanggan->foto);
                    }
                    $path = $request->file('foto')->store('pelanggan-photos', 'public');
                    $pelangganData['foto'] = $path;
                }

                $user->pelanggan->update($pelangganData);
            }

            return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
        }

        return back()->with('error', 'User tidak valid');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
