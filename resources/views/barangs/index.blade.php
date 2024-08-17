<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Tautan Tambah Barang -->
                    <a href="{{ route('barangs.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Tambah Barang</a>

                    <!-- Tabel Daftar Barang -->
                    <table class="mt-6 w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border p-2">Kode Barang</th>
                                <th class="border p-2">Nama Barang</th>
                                <th class="border p-2">Harga</th>
                                <th class="border p-2">Stok</th>
                                <th class="border p-2">Kategori</th>
                                <th class="border p-2">Deskripsi</th>
                                <th class="border p-2">Foto</th>
                                <th class="border p-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang)
                            <tr>
                                <td class="border p-2">{{ $barang->kode_barang }}</td>
                                <td class="border p-2">{{ $barang->nama_barang }}</td>
                                <td class="border p-2">{{ $barang->harga }}</td>
                                <td class="border p-2">{{ $barang->stok }}</td>
                                <td class="border p-2">{{ $barang->kategori }}</td>
                                <td class="border p-2">{{ $barang->deskripsi }}</td>
                                <td class="border p-2">
                                    @if($barang->foto)
                                        <img src="{{ asset('storage/fotos/' . $barang->foto) }}" alt="{{ $barang->nama_barang }}" width="100">
                                    @else
                                        <span>Foto tidak tersedia</span>
                                    @endif
                                </td>
                                <td class="border p-2">
                                    <a href="{{ route('barangs.edit', $barang->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
