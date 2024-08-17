<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Barang</h5>
            </div>
            <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body container-fluid">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input autocomplete="off" type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
            
                        <label for="kategori" class="form-label">Kategori</label>
                        <input autocomplete="off" type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
            
                        <label for="harga" class="form-label">Harga</label>
                        <input autocomplete="off" type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <label for="stok" class="form-label">Stok</label>
                        <input autocomplete="off" type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" required>
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="foto_barang" class="form-label">Foto Barang</label>
                        <input autocomplete="off" type="file" class="form-control @error('foto_barang') is-invalid @enderror" id="foto_barang" name="foto_barang" required>
                        @error('foto_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Tambah Barang</button>
                </div>
            </form>            
        </div>
    </div>
</div>
