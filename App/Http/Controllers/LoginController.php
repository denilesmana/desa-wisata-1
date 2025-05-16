<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fe.login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            switch ($user->level) {
                case 'admin':
                    return redirect()->intended('/admin');
                case 'pemilik':
                    return redirect()->intended('/admin/pemilik');
                case 'bendahara':
                    return redirect()->intended('/admin/bendahara');
                case 'pelanggan':
                    return redirect()->intended('/');
                default:
                    Auth::logout();
                    return redirect('/login')->with('loginError', 'Level akun tidak valid: '.$user->level);
            }
        }

        return back()->withInput()->with('loginError', 'Email atau password salah!');
    }


    public function logout() 
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
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
