<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KonfirmRegistrasiController extends Controller
{
    public function showPendingUsers()
    {
        $pending = User::where('pending', true)->get();
        return view('superadmin.konfirmasiadmin', compact('pending'));
    }

    public function confirmUser($id)
    {
        $user = User::findOrFail($id);
        $user->pending = false;
        $user->save();

        return redirect()->route('superadmin.pending')->with('status', 'User confirmed successfully.');
    }
}
