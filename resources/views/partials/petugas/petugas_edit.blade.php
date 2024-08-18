<div class="modal fade" id="editModal_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Petugas</h5>
            </div>
            <form action="{{ route('petugas.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body container-fluid">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Petugas</label>
                        <input autocomplete="off" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="email" class="form-label">Email</label>
                        <input autocomplete="off" type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="password" class="form-label">Passowrd</label>
                        <input autocomplete="off" type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password', $user->password) }}">
                        @error('password')
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