<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function listbarang_admin()
    {
        $barangs = Barang::all();
        return view('admin.listbarang', compact('barangs'));
    }
    public function pendataanbarang_admin()
    {
        $barangs = Barang::all();
        return view('admin.pendataanbarang', compact('barangs'));
    }
    public function histori_admin()
    {
        $histories = History::all();
        return view('admin.histori', compact('histories'));
    }
    public function petugasmanager_admin()
    {
        $users = User::where('role', 'petugas')->get();
        return view('admin.petugasmanager', compact('users'));
    }
}
