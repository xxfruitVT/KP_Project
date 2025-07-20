@extends('layouts.app')
@section('content')

@if ( auth()->user()->role == 'user' )
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang {{ Auth::user()->name }}🎉</h5>
                            <p class="mb-4">
                                Ingin meminjam buku favoritmu? Silahkan kunjungi halaman peminjaman buku untuk melihat
                                ketersediaan buku yang ingin kamu pinjam.
                            </p>

                            <a href="{{ route('buku.index') }}" class="btn btn-sm btn-outline-primary">Lihat Buku</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                                src="{{ asset('App/Etc/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@else
<!-- Akun admin -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Peminjaman Buku</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Buku Dalam Proses</h5>
                <div class="table-responsive text-nowrap">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Genre</th>
                                <th>Status</th>
                                <th>Pengguna</th>
                                <th>Pengembalian</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if ($books->where('status', 'Proses')->count() == 0)
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p class="mt-4">Belum ada buku yang dalam proses peminjaman.</p>
                                </td>
                            </tr>
                        </tbody>
                        @else
                        <tbody>
                            @foreach($books as $book)
                            @if($book->status == 'Proses')
                            <tr>
                                <td><strong>{{ $book->title }}</strong></td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->genre->name }}</td>
                                <td><span class="badge bg-label-warning">{{ $book->status }}</span></td>
                                <td>{{ $book->user->name ?? 'Tidak diketahui' }}</td>
                                <td>{{ $book->history->last()->return ? \Carbon\Carbon::parse($book->history->last()->return)->translatedFormat('l, d F Y') : 'Pengembalian tidak diketahui' }}</td>
                                <td>
                                    <form action="{{ route('buku.approve', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirmApproval(event);">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <form action="{{ route('buku.reject', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirmRejection(event);">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Daftar Buku yang Dipinjam</h5>
                <div class="table-responsive text-nowrap">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Genre</th>
                                <th>Status</th>
                                <th>Pengguna</th>
                                <th>Tanggal Kembali</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if($books->where('status', 'Dipinjam')->count() == 0)
                        <tbody>
                            <tr class="text-center">
                                <td colspan="7">Tidak ada buku yang dipinjam</td>
                            </tr>
                        </tbody>
                        @else
                        <tbody>
                            @foreach($books as $book)
                            @if($book->status == 'Dipinjam')
                            <tr>
                                <td><strong>{{ $book->title }}</strong></td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->genre->name }}</td>
                                <td><span class="badge bg-label-primary">{{ $book->status }}</span></td>
                                <td>{{ $book->user->name ?? 'Tidak diketahui' }}</td>
                                <td>{{ $book->history->last()->return ? \Carbon\Carbon::parse($book->history->last()->return)->translatedFormat('l, d F Y') : 'Pengembalian tidak diketahui' }}</td>
                                <td class="d-flex gap-2">
                                    <!-- Ubah tombol ingatkan -->
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#reminderModal{{ $book->id }}">
                                        Ingatkan
                                    </button>
                                    <form action="{{ route('buku.return', $book->id) }}" method="POST" onsubmit="return confirmReturn(event);">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-primary btn-sm">Kembalikan</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal untuk Peringatan -->
                            <div class="modal fade" id="reminderModal{{ $book->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="reminderModalLabel" style="white-space: pre-wrap; word-wrap: break-word;">Peringatan Peminjaman Buku</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($book->history->last()->reminder_message)
                                            <p class="fw-bold fs-5" style="white-space: pre-wrap; word-wrap: break-word;">Pesan yang telah dikirim:</p>
                                            <span class="badge rounded-pill bg-success text-white mb-3" style="word-break: break-word; white-space: normal; line-height: 2;">
                                                {{ $book->history->last()->reminder_message }}
                                            </span>
                                            @endif

                                            <p class="fw-bold fs-5" style="white-space: pre-wrap; word-wrap: break-word;">Silakan pilih pesan peringatan untuk dikirim:</p>
                                            <form id="sendReminderForm{{$book->id}}" method="POST" action="{{ route('buku.send.reminder', $book->id) }}">
                                                @csrf
                                                <input type="hidden" name="history_id" value="{{ $book->history->last()->id }}">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message1{{$book->id}}" value="Buku harus dikembalikan dalam keadaan baik!" required>
                                                    <label class="form-check-label" for="message1{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Buku harus dikembalikan dalam keadaan baik!
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message2{{$book->id}}" value="Jika terlambat, biaya denda akan dikenakan." required>
                                                    <label class="form-check-label" for="message2{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Jika terlambat, biaya denda akan dikenakan.
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message3{{$book->id}}" value="Silakan kembalikan buku tepat waktu." required>
                                                    <label class="form-check-label" for="message3{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Silakan kembalikan buku tepat waktu.
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message4{{$book->id}}" value="Pastikan buku dalam kondisi baik saat dikembalikan." required>
                                                    <label class="form-check-label" for="message4{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Pastikan buku dalam kondisi baik saat dikembalikan.
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message5{{$book->id}}" value="Waktu peminjaman telah berakhir, harap segera dikembalikan!" required>
                                                    <label class="form-check-label" for="message5{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Waktu peminjaman telah berakhir, harap segera dikembalikan!
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message6{{$book->id}}" value="Jika kehilangan, anda bertanggung jawab untuk menggantinya." required>
                                                    <label class="form-check-label" for="message6{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Jika kehilangan, anda bertanggung jawab untuk menggantinya.
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message7{{$book->id}}" value="Buku ini adalah aset perpustakaan, jaga keamanannya." required>
                                                    <label class="form-check-label" for="message7{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Buku ini adalah aset perpustakaan, jaga keamanannya.
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message8{{$book->id}}" value="Pastikan untuk mendapatkan tanda terima saat pengembalian." required>
                                                    <label class="form-check-label" for="message8{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Pastikan untuk mendapatkan tanda terima saat pengembalian.
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message9{{$book->id}}" value="Peminjaman buku hanya berlaku selama 14 hari." required>
                                                    <label class="form-check-label" for="message9{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Peminjaman buku hanya berlaku selama 14 hari.
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio" name="reminderMessage" id="message10{{$book->id}}" value="Harap mengembalikan buku dalam waktu yang disepakati." required>
                                                    <label class="form-check-label" for="message10{{$book->id}}" style="word-break: break-word; white-space: normal;">
                                                        Harap mengembalikan buku dalam waktu yang disepakati.
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('sendReminderForm{{$book->id}}').submit()">Kirim Peringatan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif
                            @endforeach
                        </tbody>
                        @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmApproval(event) {
        event.preventDefault();
        const form = event.target;

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menyetujui peminjaman buku ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, setujui!',
            cancelButtonText: 'Tidak, batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }

    function confirmRejection(event) {
        event.preventDefault();
        const form = event.target;

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menolak peminjaman buku ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, tolak!',
            cancelButtonText: 'Tidak, batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Mengirim form jika ditolak
            }
        });
    }

    function confirmReturn(event) {
        event.preventDefault(); // Mencegah form dari pengiriman otomatis
        const form = event.target;

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan mengembalikan buku ini.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, kembalikan!',
            cancelButtonText: 'Tidak, batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Mengirim form jika disetujui
            }
        });
    }
</script>
@endif



@endsection
