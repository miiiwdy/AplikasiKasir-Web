<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Petugas</h5>
            </div>
            <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body container-fluid">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Petugas</label>
                        <input autocomplete="off" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
            
                        <label for="email" class="form-label">Email</label>
                        <input autocomplete="off" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="password" class="form-label">Password</label>
                        <input autocomplete="off" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
            
                        <label for="role" class="form-label">Role</label>
                        <input autocomplete="off" type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="petugas" readonly   >
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Tambah Petugas</button>
                </div>
            </form>            
        </div>
    </div>
</div>
