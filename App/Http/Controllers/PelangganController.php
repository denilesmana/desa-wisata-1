<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('level', 'pelanggan')->get();

        return view('pelanggan.index', [
            'pelanggans' => $users,
            'title' => 'Data Pelanggan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pelanggan.create', [
            'title' => 'Tambah Pelanggan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'pelanggan',
            'aktif' => 1,
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pelanggan', 'public');
        }

        Pelanggan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
            'id_users' => $user->id,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
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
        $user = User::with('pelanggan')->findOrFail($id);

        if (!$user->pelanggan) {
            $user->setRelation('pelanggan', new Pelanggan());
        }

        return view('Pelanggan.edit', [
            'user' => $user,
            'title' => 'Edit Pelanggan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $user = User::findOrFail($id);
        
        $updateData = [
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'level' => 'pelanggan',
            'aktif' => 1,
        ];

        // Only update password if provided
        if ($request->password) {
            $updateData['password'] = bcrypt($request->password);
        }

        $user->update($updateData);

        $pelangganData = [
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ];

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($user->pelanggan && $user->pelanggan->foto) {
                Storage::disk('public')->delete($user->pelanggan->foto);
            }
            
            $pelangganData['foto'] = $request->file('foto')->store('pelanggan', 'public');
        }

        // Update or create pelanggan data
        if ($user->pelanggan) {
            $user->pelanggan->update($pelangganData);
        } else {
            $pelangganData['id_users'] = $user->id;
            Pelanggan::create($pelangganData);
        }

        Alert::success('Berhasil', 'User Pelanggan berhasil diperbarui!');
        return redirect()->route('pelanggan.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        Alert::success('Berhasil', 'User Pelanggan berhasil dihapus!');
        return redirect()->route('pelanggan.index');
    }
}
