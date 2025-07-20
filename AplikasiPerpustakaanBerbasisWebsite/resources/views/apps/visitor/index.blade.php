@extends('layoutseperpus.apps')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Data Pengunjung</h4>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Buku Paling Banyak Dipinjam</h5>
                <div class="card-body">
                    <canvas id="mostBorrowedBooksChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Pengguna Paling Sering Meminjam Buku</h5>
                <div class="card-body">
                    <canvas id="mostFrequentUsersChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Total Buku</div>
                <div class="card-body">
                    <p><strong style="font-size: 32px">{{ $totalBooks }}</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Total Genre Buku</div>
                <div class="card-body">
                    <p><strong style="font-size: 32px">{{ $totalGenres }}</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Total Pengguna</div>
                <div class="card-body">
                    <p><strong style="font-size: 32px">{{ $totalUsers }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pengguna -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Daftar Pengguna</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><strong>{{ auth()->user()->name }}</strong></td>
                                <td>{{ auth()->user()->email }}</td>
                                <td>{{ auth()->user()->role }}</td>
                                <td>
                                    <span class="text-muted text-sm">Akun Anda</span>
                                </td>
                            </tr>

                            @foreach($users as $k)
                            <tr>
                                <td><strong>{{ $k->name }}</strong></td>
                                <td>{{ $k->email }}</td>
                                <td>{{ $k->role }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $k->id) }}" method="POST" class="d-inline" id="delete-form-{{ $k->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmDelete({{ $k->id }})">Hapus</button>
                                    </form>
                                    <a href="{{ route('users.edit', $k->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($users->isEmpty())
                    <div class="text-center">
                        <p class="mt-4 text-center">Belum ada pengguna.</p>
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
                            @if ($users->onFirstPage())
                            <li>
                                <span class="px-4 py-2 text-gray-500 bg-gray-200 border border-gray-300 rounded-l-lg cursor-not-allowed" aria-disabled="true">
                                    &laquo;
                                </span>
                            </li>
                            @else
                            <li>
                                <a href="{{ $users->previousPageUrl() }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-l-lg hover:bg-blue-100 hover:text-blue-800">
                                    &laquo; Previous
                                </a>
                            </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li>
                                    @if ($users->currentPage() == $i)
                                    <span class="px-4 py-2 text-white bg-blue-600 border border-gray-300">{{ $i }}</span>
                                    @else
                                    <a href="{{ $users->url($i) }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 hover:bg-blue-100 hover:text-blue-800">{{ $i }}</a>
                                    @endif
                                </li>
                                @endfor

                                {{-- Next Page Link --}}
                                @if ($users->hasMorePages())
                                <li>
                                    <a href="{{ $users->nextPageUrl() }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-r-lg hover:bg-blue-100 hover:text-blue-800">
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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const mostBorrowedBooks = @json($mostBorrowedBooks);
    const bookLabels = mostBorrowedBooks.map(book => book.book.title);
    const bookData = mostBorrowedBooks.map(book => book.total);

    const ctxBooks = document.getElementById('mostBorrowedBooksChart').getContext('2d');
    new Chart(ctxBooks, {
        type: 'bar',
        data: {
            labels: bookLabels,
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: bookData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });

    const mostFrequentUsers = @json($mostFrequentUsers);
    const userLabels = mostFrequentUsers.map(user => user.user.name);
    const userData = mostFrequentUsers.map(user => user.total);

    const ctxUsers = document.getElementById('mostFrequentUsersChart').getContext('2d');
    new Chart(ctxUsers, {
        type: 'pie',
        data: {
            labels: userLabels,
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: userData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 205, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(201, 203, 207, 0.6)'
                ],
            }]
        },
        options: {
            responsive: true,
        }
    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pengguna ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
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
