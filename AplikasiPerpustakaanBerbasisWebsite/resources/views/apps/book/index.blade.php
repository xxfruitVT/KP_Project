@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Buku</h4>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('buku.index') }}">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input type="text" name="search" class="form-control" placeholder="Cari Judul Buku" value="{{ request('search') }}">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Daftar Semua Buku</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Genre</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($books as $book)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$book->book_image) }}" alt="{{ $book->title }}" class="inline-block rounded" width="50" height="75" />
                        </td>
                        <td><strong class="ml-2">{{ $book->title }}</strong></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre->name }}</td>
                        <td><span class="badge bg-label-{{ [
                            'Tersedia' => 'primary',
                            'Proses' => 'warning',
                            'Dipinjam' => 'danger',
                            'Akan Hadir' => 'info',
                        ][$book->status] }} me-1">{{ $book->status }}</span></td>
                        <td>
                            @if (auth()->user()->role == 'admin')
                            <div class="btn-group gap-2">
                                <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-outline-primary"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form action="{{ route('buku.destroy', $book->id) }}" method="POST" class="inline-form" id="delete-form-{{ $book->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{ $book->id }})"><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                            </div>
                            @else

                            @if ($book->status == 'Tersedia')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Pinjam
                            </button>
                            @else
                            <button type="button" class="btn btn-primary" disabled>
                                Pinjam
                            </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Aturan Peminjaman Buku</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('buku.pinjam', $book->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="book-info mb-4">
                                                    <p style="white-space: pre-wrap; word-wrap: break-word;" class="fw-bold">Judul Buku: <span class="text-primary">{{ $book->title }}</span></p>
                                                    <p style="white-space: pre-wrap; word-wrap: break-word;"><strong>Penulis:</strong> {{ $book->author }}</p>
                                                    <p style="white-space: pre-wrap; word-wrap: break-word;"><strong>Genre:</strong> {{ $book->genre->name }}</p>
                                                    <p style="white-space: pre-wrap; word-wrap: break-word;"><strong>Deskripsi:</strong> {{ $book->description }}</p>
                                                </div>
                                                <p style="white-space: pre-wrap; word-wrap: break-word;" class="fw-bold fs-5">Silakan baca dan setujui aturan peminjaman berikut:</p>
                                                <ul>
                                                    <li style="white-space: pre-wrap; word-wrap: break-word;">Buku harus dikembalikan dalam kondisi baik.</li>
                                                    <li style="white-space: pre-wrap; word-wrap: break-word;">Keterlambatan pengembalian akan dikenakan denda.</li>
                                                    <li style="white-space: pre-wrap; word-wrap: break-word;">Buku yang hilang harus diganti dengan buku baru.</li>
                                                    <li style="white-space: pre-wrap; word-wrap: break-word;">Pengguna tidak boleh melebihi 2 pekan peminjaman buku.</li>
                                                </ul>
                                                <div class="mt-3">
                                                    <label for="return_date" class="form-label">Batas Pengembalian</label>
                                                    <input type="date" class="form-control" id="return_date" name="return_date" required>
                                                </div>
                                                <div class="mt-3">
                                                    <p style="white-space: pre-wrap; word-wrap: break-word;" class="fw-bold fs-5">Risiko Peminjaman:</p>
                                                    <p style="white-space: pre-wrap; word-wrap: break-word;"><em>Kehilangan atau kerusakan buku menjadi tanggung jawab peminjam.</em></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Pinjam</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--
                            <form action="{{ route('buku.pinjam', $book->id) }}" method="POST" class="inline-form" id="pinjam-form-{{ $book->id }}">
                            @csrf
                            <button type="button" class="btn btn-outline-primary" onclick="confirmPinjam({{ $book->id }})"><i class="bx bx-bookmark me-1"></i> Pinjam</button>
                            </form>
                            <script>
                                function confirmPinjam(id) {
                                    Swal.fire({
                                        title: 'Apakah Anda ingin meminjam buku {{ $book->title }}?',
                                        text: "Buku ini akan ditambahkan ke daftar peminjaman!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, pinjam!',
                                        cancelButtonText: 'Tidak, batal!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            const form = document.getElementById('pinjam-form-' + id);
                                            form.submit();
                                        }
                                    });
                                }
                            </script>
                            --}}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($books->isEmpty())
            <div class="text-center">
                <p class="mt-4 text-center">Belum ada buku.</p>
            </div>
            @endif
        </div>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
        <!-- Pagination Controls -->
        <div class="m-4">
            <nav aria-label="Page navigation">
                <ul class="inline-flex flex-wrap -space-x-px">
                    {{-- Previous Page Link --}}
                    @if ($books->onFirstPage())
                    <li>
                        <span class="px-4 py-2 text-gray-500 bg-gray-200 border border-gray-300 rounded-l-lg cursor-not-allowed" aria-disabled="true">
                            &laquo;
                        </span>
                    </li>
                    @else
                    <li>
                        <a href="{{ $books->previousPageUrl() }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-l-lg hover:bg-blue-100 hover:text-blue-800">
                            &laquo; Previous
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @for ($i = 1; $i <= $books->lastPage(); $i++)
                        <li>
                            @if ($books->currentPage() == $i)
                            <span class="px-4 py-2 text-white bg-blue-600 border border-gray-300">{{ $i }}</span>
                            @else
                            <a href="{{ $books->url($i) }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 hover:bg-blue-100 hover:text-blue-800">{{ $i }}</a>
                            @endif
                        </li>
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($books->hasMorePages())
                        <li>
                            <a href="{{ $books->nextPageUrl() }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-r-lg hover:bg-blue-100 hover:text-blue-800">
                                Next &raquo;
                            </a>
                        </li>
                        @else
                        <li>
                            <span class="px-4 py-2 text-gray-500 bg-gray-200 border border-gray-300 rounded-r-lg cursor-not-allowed" aria-disabled="true">
                                &raquo;
                            </span>
                        </li>
                        @endif
                </ul>
            </nav>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Buku ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak, batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('delete-form-' + id);
                form.submit();
            }
        });
    }
</script>
@endsection