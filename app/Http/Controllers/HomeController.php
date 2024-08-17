<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexadmin() {
        return view ('admin.dashboard');
    }
    public function listbarang() {
        $barangs = Barang::all();
        return view('petugas.listbarang', compact('barangs'));
    }
    public function pendataanbarang() {
        $barangs = Barang::all();
        return view('petugas.pendataanbarang', compact('barangs'));
    }
}
