<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $purchaseData = json_decode($request->input('purchaseData'), true);

        foreach ($purchaseData as $item) {
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();
            if ($barang) {
                $barang->stok -= $item['quantity'];
                $barang->save();
            }
        }

        return redirect()->route('listbarang_petugas'); 
    }
}
