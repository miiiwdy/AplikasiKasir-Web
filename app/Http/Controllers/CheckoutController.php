<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'purchaseData.*.kode_barang' => 'required|string',
            'purchaseData.*.quantity' => 'required|integer|min:1',
            'purchaseData.*.price' => 'required|numeric',
            'purchaseData.*.metode_pembayaran' => 'required|string',
        ]);

        session(['purchaseData' => $validatedData['purchaseData']]);

        foreach ($validatedData['purchaseData'] as $data) {
            Checkout::create([
                'kode_barang' => $data['kode_barang'],
                'quantity' => $data['quantity'],
                'price' => $data['price'],
                'metode_pembayaran' => $data['metode_pembayaran'],
            ]);
        }

        return redirect()->route('receipt');
    }

    public function showReceipt()
    {
        $purchaseData = session('purchaseData', []);

        foreach ($purchaseData as &$item) {
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();
            if ($barang) {
                $item['nama_barang'] = $barang->nama_barang;
            } else {
                $item['nama_barang'] = 'Unknown';
            }
        }

        return view('receipt', ['purchaseData' => $purchaseData]);
    }

    public function print()
    {
        return redirect()->route('listbarang_petugas');
    }
}
