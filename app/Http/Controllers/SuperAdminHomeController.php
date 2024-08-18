<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminHomeController extends Controller
{
    public function listbarang_superadmin()
    {
        $barangs = Barang::all();
        return view('superadmin.listbarang', compact('barangs'));
    }
    public function pendataanbarang_superadmin()
    {
        $barangs = Barang::all();
        return view('superadmin.pendataanbarang', compact('barangs'));
    }
    public function histori_superadmin()
    {
        $histories = History::all();
        return view('superadmin.histori', compact('histories'));
    }
    public function petugasmanager_superadmin()
    {
        $users = User::where('role', 'petugas')->get();
        return view('superadmin.petugasmanager', compact('users'));
    }
}
