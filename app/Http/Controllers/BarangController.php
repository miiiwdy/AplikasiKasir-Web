<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'nama_barang_asc');
        $search = $request->input('search', ''); 

        $query = Barang::query();

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('nama_barang', 'like', "%{$search}%")->orWhere('kode_barang', 'like', "%{$search}%");
            });
        }

        switch ($sortBy) {
            case 'nama_barang_asc':
                $query->orderBy('nama_barang', 'asc');
                break;
            case 'nama_barang_desc':
                $query->orderBy('nama_barang', 'desc');
                break;
            case 'harga_asc':
                $query->orderBy('harga', 'asc');
                break;
            case 'harga_desc':
                $query->orderBy('harga', 'desc');
                break;
            case 'stok_asc':
                $query->orderBy('stok', 'asc');
                break;
            case 'stok_desc':
                $query->orderBy('stok', 'desc');
                break;
            default:
                $query->orderBy('nama_barang', 'asc'); 
        }

        $barangs = $query->get();

        return view('petugas.listbarang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $kodeBarang = Str::uuid()->toString();
        $kodeBarang = substr($kodeBarang, 0, 4);

        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $barang = new Barang($request->all());

        History::create([
            'action' => 'add',
            'details' => json_encode([
                'nama_barang' => $barang->nama_barang,
                'harga' => $barang->harga,
                'stok' => $barang->stok,
                'created_at' => $barang->created_at
            ]),
        ]);

        $barang->kode_barang = $kodeBarang;

        if ($request->hasFile('foto_barang')) {
            $fileName = $request->file('foto_barang')->store('public/fotos');
            $barang->foto_barang = basename($fileName);
        }
        $barang->save();

        return redirect()->route('dashboard')->with('success', 'Barang berhasil ditambahkan');
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang->fill($request->except('kode_barang'));
        if ($request->hasFile('foto_barang')) {
            $fileName = $request->file('foto_barang')->store('public/fotos');
            $barang->foto_barang = basename($fileName);
        }
        $barang->save();

        History::create([
            'action' => 'edit',
            'details' => json_encode([
                'nama_barang' => $barang->nama_barang,
                'harga' => $barang->harga,
                'stok' => $barang->stok,
                'updated_at' => $barang->updated_at
            ]),
        ]);

        return redirect()->route('dashboard')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('dashboard')->with('success', 'Barang berhasil dihapus');
    }
}
