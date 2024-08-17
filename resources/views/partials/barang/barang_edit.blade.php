<div class="modal fade" id="editModal_{{ $barang->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
            </div>
            <form action="{{ route('barangs.update', $barang->id) }}" method="POST">

                @csrf
                @method('PUT')
                
                <div class="modal-body container-fluid">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input autocomplete="off" type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="kategori" class="form-label">Kategori</label>
                        <input autocomplete="off" type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ old('kategori', $barang->kategori) }}">
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="harga" class="form-label">Harga</label>
                        <input autocomplete="off" type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $barang->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <label for="stok" class="form-label">Stok</label>
                        <input autocomplete="off" type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $barang->stok) }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
