@extends('layouts.app')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku /</span> Kelola Genre</h4>

    <div class="row">
        <div class="col-md-6">
            <!-- List Genre -->
            <div class="card mb-4">
                <h5 class="card-header">Daftar Genre Buku</h5>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($genres as $genre)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $genre->name }}
                            <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" onsubmit="return confirmDelete(event);">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    @if ($genres->count() == 0)
                    <p class="text-center">Tidak ada genre buku.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Form Input Genre -->
            <div class="card mb-4">
                <h5 class="card-header">Buat Genre Baru</h5>
                <div class="card-body">
                    <form action="{{ route('genre.store') }}" method="POST" id="createGenreForm">
                        @csrf
                        <div class="mb-3">
                            <label for="genre_name" class="form-label">Nama Genre</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="genre_name" name="name" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Genre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(event) {
        event.preventDefault();
        const form = event.target;

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Genre ini akan dihapus secara permanen dan data buku menggunakan genre ini juga akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak, batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection
