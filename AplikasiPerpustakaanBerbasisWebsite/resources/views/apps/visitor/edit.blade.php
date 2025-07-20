@extends('layoutseperpus.apps')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Visitor /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header"><b>{{ $visitorAccount->name }}</b></h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if ($visitorAccount->avatar)
                        <img
                            src="{{ asset('storage/'.$visitorAccount->avatar) }}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="imagePreview" />
                        @else
                        <img
                            src="{{ asset('App/Etc/assets/img/avatars/1.png') }}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="imagePreview" />
                        @endif
                        <form action="{{ route('users.avatar.update', $visitorAccount->id) }}" method="POST" enctype="multipart/form-data" class="button-wrapper">
                            @csrf
                            @method('PUT')
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input
                                    type="file"
                                    id="upload"
                                    class="account-file-input"
                                    hidden
                                    name="avatar" z
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="submit" class="btn btn-outline-secondary account-image-reset mb-4" id="removeImage">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>

                        </form>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('users.update', $visitorAccount->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $visitorAccount->name) }}" />
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                    class="form-control @error('email') is-invalid @enderror"
                                    type="text"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $visitorAccount->email) }}"
                                    placeholder="email@example.com" />
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Ganti Kata Sandi Baru</label>
                                <input
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password" />
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                <input
                                    type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation"
                                    name="password_confirmation" />
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="admin" {{ old('role', $visitorAccount->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $visitorAccount->role) == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="card">
                <h5 class="card-header">Hapus Akun</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Apakah Anda yakin ingin menghapus akun ini?</h6>
                            <p class="mb-0">Setelah Anda menghapus akun, tidak ada jalan kembali. Silakan pastikan.</p>
                        </div>
                    </div>
                    <form action="{{ route('users.destroy', $visitorAccount->id) }}" method="POST" id="formAccountDeactivation">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Eliminasi Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const uploadInput = document.getElementById('upload');
        const imagePreview = document.getElementById('imagePreview');
        const uploadedAvatar = document.getElementById('uploadedAvatar');

        uploadInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    uploadedAvatar.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        const removeImageButton = document.getElementById('removeImage');
        removeImageButton.addEventListener('click', function() {
            uploadedAvatar.classList.remove('hidden');
            imagePreview.classList.add('hidden');
            imagePreview.src = '';
            uploadInput.value = '';
        });
    });
</script>

<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Akun yang ingin anda hapus secara permanen, tidak dapat kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak, batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formAccountDeactivation').submit();
            }
        });
    }
</script>

@endsection
