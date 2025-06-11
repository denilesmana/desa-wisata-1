<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('level', ['admin', 'pemilik', 'bendahara'])->with('karyawan')->get();

        
        return view('Karyawan.index', [
            'users' => $users,
            'title' => 'Data Karyawan'
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::with('karyawan')->findOrFail($id);
        
        if (!$user->karyawan) {
            $user->setRelation('karyawan', new Karyawan());
        }

        return view('Karyawan.edit', [
            'user' => $user,
            'title' => 'Edit Karyawan'
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:50',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'jabatan' => 'required|in:administrasi,bendahara,pemilik'
        ]);

        $user = User::findOrFail($id);
        
        $jabatan = $request->jabatan;
        $levelUser = match($jabatan) {
            'administrasi' => 'admin',
            'bendahara' => 'bendahara',
            'pemilik' => 'pemilik',
            default => 'admin' // fallback jika tidak sesuai
        };

        $user->update([
            'name' => $request->nama_karyawan,
            'level' => $levelUser
        ]);


        Karyawan::updateOrCreate(
            ['id_users' => $id],
            [
                'nama_karyawan' => $request->nama_karyawan,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jabatan' => $request->jabatan
            ]
        );

        Alert::success('Berhasil', 'User Karyawan berhasil diperbarui!');
        return redirect()->route('karyawan.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        Alert::success('Berhasil', 'User Karyawan berhasil dihapus!');
        return redirect()->route('karyawan.index');
    }
}
