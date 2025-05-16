<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fe.register', [
            'title' => 'Register'
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
    $validatedData = $request->validate([
        'name' => ['required', 'min:3', 'max:50', 'unique:users'],
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|max:255'
    ]);


    $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['level'] = 'pelanggan'; // atur level default
    $validatedData['aktif'] = true; // atau false, sesuai kebutuhan


    $user = User::create($validatedData);

  
    Pelanggan::create([
        'nama_lengkap' => $user->name, 
        'no_hp' => '',  
        'alamat' => '',
        'foto' => 'default.png', 
        'id_users' => $user->id
    ]);

    return redirect('login')->with('success', 'Registration successful! Please login');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
