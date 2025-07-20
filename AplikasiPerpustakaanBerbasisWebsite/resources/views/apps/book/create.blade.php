@extends('layoutseperpus.apps')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku /</span> Buat Data Baru</h4>

    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Buat Data Baru Buku</h5>
                    <small class="text-muted float-end">Isi semua kolom di bawah ini</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="book_image">Upload Gambar Buku</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('book_image') is-invalid @enderror" id="book_image" name="book_image" accept="image/png, image/jpeg" required />
                                <div class="form-text">Allowed JPG, PNG. Max size of 800K</div>
                                @error('book_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="title">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Contoh: Belajar Laravel" required />
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="author">Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Contoh: John Doe" required />
                                @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="genre">Genre</label>
                            <div class="col-sm-10">
                                <select id="genre" name="genre" class="form-select @error('genre') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Genre</option>
                                    @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                                @error('genre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="description">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Masukkan deskripsi buku..." required></textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="status">Status</label>
                            <div class="col-sm-10">
                                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Akan Hadir">Akan Hadir</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
                <!-- /Basic Layout -->
            </div>
        </div>
    </div>
</div>

@endsection
