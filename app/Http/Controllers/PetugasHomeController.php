<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasHomeController extends Controller
{
    public function listbarang_petugas()
    {
        $barangs = Barang::all();
        return view('petugas.listbarang', compact('barangs'));
    }
    public function pendataanbarang_petugas()
    {
        $barangs = Barang::all();
        return view('petugas.pendataanbarang', compact('barangs'));
    }
    public function histori_petugas()
    {
        $histories = History::all();
        return view('petugas.histori', compact('histories'));
    }
}
