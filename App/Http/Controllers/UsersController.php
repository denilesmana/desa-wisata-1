<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Users;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Users.index', compact('users'), [
            'title' => 'User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.create', [
            'title' => 'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'level' => 'required'
    ]);

    $validated['password'] = bcrypt($validated['password']);

    User::create($validated);
    
    return redirect('users')->with('success', 'User berhasil dibuat!');
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
    public function edit(User $user)
{
    return view('Users.edit', [
        'title' => 'Edit User',
        'user' => $user
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'level' => 'required',
    ]);

    $user->update($validated);
    return redirect()->route('users.index')->with('success', 'Data user diperbarui!');
    }

    public function destroy(User $user) {
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
