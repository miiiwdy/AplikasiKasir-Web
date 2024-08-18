<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'kode_barang' => 'required|string',
            'harga' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'metodepembayaran' => 'required|string',
        ]);

        try {
            $barang = Barang::where('kode_barang', $validatedData['kode_barang'])->firstOrFail();

            if ($barang->stok < $validatedData['quantity']) {
                return redirect()->back()->withErrors(['error' => 'Stok tidak cukup.']);
            }

            // Create a new checkout entry
            $checkout = Checkout::create([
                'kode_barang' => $validatedData['kode_barang'],
                'quantity' => $validatedData['quantity'],
                'price' => $validatedData['harga'],
                'metodepembayaran' => $validatedData['metodepembayaran'],
            ]);

            // Update the stock
            $barang->stok -= $validatedData['quantity'];
            $barang->save();

            // Create a history entry
            History::create([
                'action' => 'checkout',
                'details' => json_encode([
                    'kode_barang' => $checkout->kode_barang,
                    'quantity' => $checkout->quantity,
                    'price' => $checkout->price,
                    'created_at' => $checkout->created_at,
                ]),
            ]);

            // Delete the item if out of stock
            if ($barang->stok <= 0) {
                $barang->delete();
            }

            // Calculate the total price
            $totalHarga = $validatedData['harga'] * $validatedData['quantity'];

            // Store the purchase data in session
            $purchaseData = Session::get('purchaseData', []);
            $purchaseData[] = [
                'nama_barang' => $validatedData['nama_barang'],
                'kode_barang' => $validatedData['kode_barang'],
                'quantity' => $validatedData['quantity'],
                'harga' => $validatedData['harga'],
                'total_harga' => $totalHarga
            ];
            Session::put('purchaseData', $purchaseData);

            // Redirect to the bill view
            return redirect()->route('checkout.bill');

        } catch (\Exception $e) {
            Log::error('Checkout error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan.']);
        }
    }

    public function showBill()
    {
        $purchaseData = Session::get('purchaseData', []);
        return view('partials.transaksi.bill', ['purchaseData' => $purchaseData]);
    }

    public function clearBill()
    {
        // Clear purchase data from session
        Session::forget('purchaseData');
        return redirect()->route('listbarang');
    }
}
