<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function listUsersForPetugas()
    {
        $users = User::where('role', 'petugas')->get();
        return view('petugasmanager', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User($request->only('name', 'email'));
        $user->role = 'petugas';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('petugasmanager_admin')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $petugas)
    {
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, User $petugas)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $petugas->id,
        ]);

        $petugas->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('petugasmanager_admin')->with('success', 'Petugas berhasil diperbarui.');
    }

    public function destroy(User $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugasmanager_admin')->with('success', 'Petugas berhasil dihapus.');
    }
}