<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nama_barang' => 'required|string',
        'kode_barang' => 'required|string',
        'harga' => 'required|numeric',
        'quantity' => 'required|integer|min:1',
    ]);

    $barang = Barang::where('kode_barang', $request->kode_barang)->first();

    if (!$barang) {
        return redirect()->back()->withErrors(['error' => 'Barang tidak ditemukan.']);
    }

    if ($barang->stok < $request->quantity) {
        return redirect()->back()->withErrors(['error' => 'Stok tidak cukup.']);
    }

    $checkout = Checkout::create([
        'kode_barang' => $request->kode_barang,
        'quantity' => $request->quantity,
        'price' => $request->harga,
    ]);

    $barang->stok -= $request->quantity;
    $barang->save();

    History::create([
        'action' => 'checkout',
        'details' => json_encode([
            'kode_barang' => $checkout->kode_barang,
            'quantity' => $checkout->quantity,
            'price' => $checkout->price,
            'created_at' => $checkout->created_at,
        ]),
    ]);

    if ($barang->stok <= 0) {
        $barang->delete();
    }

    $totalHarga = $request->harga * $request->quantity;

    return redirect()->route('checkout.receipt', [
        'nama_barang' => $request->nama_barang,
        'kode_barang' => $request->kode_barang,
        'harga' => $request->harga,
        'quantity' => $request->quantity,
        'total_harga' => $totalHarga,
    ]);
}



    public function showReceipt(Request $request)
    {
        return view('receipt', [
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'total_harga' => $request->total_harga,
        ]);
    }
}
