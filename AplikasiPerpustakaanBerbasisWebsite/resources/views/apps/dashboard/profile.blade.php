@extends('layoutseperpus.apps')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <h5 class="card-header">Informasi Pribadi</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if ($user->avatar)
                        <img
                            src="{{ asset('storage/'.$user->avatar) }}"
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
                        <form action="{{ route('dashboard.profile.avatar.update') }}" method="POST" enctype="multipart/form-data" class="button-wrapper">
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
                    <form id="formAccountSettings" action="{{ route('dashboard.profile.update') }}" method="POST">
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
                                    value="{{ old('name', $user->name) }}" />
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
                                    value="{{ old('email', $user->email) }}"
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
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <h5 class="card-header">Get API Buku</h5>
                        <div class="card-body">
                            <div class="mb-3 col-12 mb-0">
                                <div class="alert alert-info">
                                    <h6 class="alert-heading fw-bold mb-1">Penggunaan API Buku</h6>
                                    <p class="mb-0">API ini digunakan untuk mengambil data buku yang ada di database. Anda dapat menggunakannya untuk mengembangkan aplikasi Anda.</p>
                                </div>
                            </div>
                            @if($userApi)
                            <form action="{{ route('buku.api.delete') }}" method="POST" id="formApiDelete">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="deleteApi()">Hapus API Buku</button>
                            </form>
                            <div class="mt-3 alert alert-success">
                                <strong>Client ID Anda:</strong> <span id="client_id">{{ $userApi->client_id }}</span>
                                <button class="btn btn-secondary btn-sm" onclick="copyToClipboard()">Salin</button>
                            </div>
                            <p class="mt-2">Panduan penggunaan client ID:
                            <ul>
                                <li>Gunakan client ID untuk mengakses API Buku di <u><a href="{{ url('/books/api/' . $userApi->client_id) }}" target="_blank">URL Berikut</a></u>: <code>{{ url('/books/api/' . $userApi->client_id) }} </code></li>
                            </ul>
                            </p>
                            @else
                            <form action="{{ route('buku.api.create') }}" method="POST" id="formApiCreate">
                                @csrf
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="api" id="api" required />
                                    <label class="form-check-label" for="api">Saya mengkonfirmasi penggunaan API buku</label>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="createApi()">Membuat API Buku</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function copyToClipboard() {
                    const clientId = document.getElementById('client_id').innerText;
                    navigator.clipboard.writeText(clientId)
                        .then(() => {
                            alert('Client ID telah disalin ke clipboard!');
                        })
                        .catch(err => {
                            console.error('Gagal menyalin: ', err);
                        });
                }

                function deleteApi() {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "API Buku akan dihapus dan tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Tidak, batal!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('formApiDelete').submit();
                        }
                    });
                }

                function createApi() {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "API Buku akan dibuat!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, buat!',
                        cancelButtonText: 'Tidak, batal!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('formApiCreate').submit();
                        }
                    });
                }
            </script>

            <div class="card">
                <h5 class="card-header">Hapus Akun</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Apakah Anda yakin ingin menghapus akun Anda?</h6>
                            <p class="mb-0">Setelah Anda menghapus akun, tidak ada jalan kembali. Silakan pastikan.</p>
                        </div>
                    </div>
                    <form action="{{ route('account.delete') }}" method="POST" id="formAccountDeactivation">
                        @csrf
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" required />
                            <label class="form-check-label" for="accountActivation">Saya mengkonfirmasi penghapusan akun saya</label>
                        </div>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Eliminasi Akun</button>
                    </form>
                </div>
            </div>

            @if (auth()->user()->role == 'admin')
            <div class="card mt-4">
                <h5 class="card-header">Penyimpanan Sistem</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Apakah Anda yakin ingin mengaktifkan penyimpanan Anda?</h6>
                            <p class="mb-0">Setelah Anda mengaktifkan penyimpanan, terdapat linked storage untuk gambar di sistem</p>
                        </div>
                    </div>
                    <form action="{{ route('storage-link') }}" method="get" id="formStorage">
                        @csrf
                        <button type="button" class="btn btn-danger" onclick="confirmActivatedStorage()">Aktifkan Penyimpanan</button>
                    </form>
                </div>
            </div>
            @endif
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
            text: "Akun Anda akan dihapus secara permanen!",
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

<script>
    function confirmActivatedStorage() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Penyimpanan Anda akan diaktifkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, aktifkan!',
            cancelButtonText: 'Tidak, batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formStorage').submit();
            }
        });
    }
</script>

@endsection
