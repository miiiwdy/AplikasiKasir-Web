@foreach ($barangs as $barang)
@php
    $idr = number_format($barang->harga, 2, ',', '.'); 
@endphp
<div class="barang">
    <div id="column">
        <div id="row">
            <div id="barangimages">
                @if($barang->foto_barang)
                <img src="{{ asset('storage/fotos/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}" style="width: 80%; height: auto; border-radius: 10px; object-fit: cover;">
            @endif
            </div>
            <div id="barangdetail">
                <h4 id="nb">{{ $barang->nama_barang }}</h4>
                <p id="kd">Kode: <span>{{ $barang->kode_barang }}</span></p>
                <p id="stk">Stok: <span>{{ $barang->stok }}</span></p>
                <p id="hrg">Harga: <span>{{ $idr }}</span></p>
            </div>
        </div>
        <div id="transaksibtn">
            <form method="GET" action="{{ route('barangs.edit', $barang->id) }}">
            <button id="transaksibtn" style="border: none; cursor: pointer;">
                <center>Transaksi Barang ini</center>
            </button>
            </form>
        </div>
    </div>
</div>
@endforeach
