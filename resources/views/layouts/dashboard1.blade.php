<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Petugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __("You're logged in! Petugas") }}</h3>
                </div>

                <!-- Tab Navigasi -->
                <div class="mt-6 flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Actions</h3>
                    <ul class="flex space-x-4">
                        <li><a href="{{ route('barangs.create') }}" class="text-blue-500 hover:underline flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Barang
                        </a></li>
                    </ul>
                </div>

                <!-- Daftar Barang -->
                <div id="barangs" class="mt-6">
                    <h3 class="text-lg font-semibold">Daftar Barang</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                        @foreach($barangs as $barang)
                        @php
                            $idr = number_format($barang->harga, 2, ',', '.'); 
                        @endphp
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <div class="flex items-center justify-center">
                                @if($barang->foto_barang)
                                    <img src="{{ asset('storage/fotos/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}" class="w-full h-32 object-cover rounded">
                                @endif
                            </div>
                            <div class="mt-4">
                                <h4 class="text-lg font-semibold">{{ $barang->nama_barang }}</h4>
                                <p class="text-sm text-gray-500">{{ $barang->kode_barang}}</p>
                                <p class="mt-2 text-gray-800 dark:text-gray-300">Harga: Rp {{ $idr }}</p>
                                <p class="mt-1 text-gray-800 dark:text-gray-300">Stok: {{ $barang->stok }}</p>
                                <p class="mt-1 text-gray-800 dark:text-gray-300">Kategori: {{ $barang->kategori }}</p>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('barangs.edit', $barang->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
