<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KonfirmRegistrasiController extends Controller
{
    public function showPendingUsers()
    {
        $pending = User::where('pending', true)->where('role', '!=', 'petugas')->get();
        return view('superadmin.konfirmasiadmin', compact('pending'));
    }

    public function confirmUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->role !== 'petugas') {
            $user->pending = false;
            $user->save();
        }

        return redirect()->route('superadmin.pending')->with('status', 'Akun dikonfirmasu');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->role === 'petugas') {
            $user->pending = false;
        }

        $user->delete();

        return redirect()->route('superadmin.pending')->with('status', 'Akun Dihapus.');
    }
}
