@extends('layouts.app')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>History Peminjaman Buku</h4>

    <div class="card">
        <h5 class="card-header">Riwayat Peminjaman</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $entry)
                    <tr>
                        <td><strong>{{ $entry->book->title }}</strong></td>
                        <td>{{ $entry->book->author }}</td>
                        <td>{{ \Carbon\Carbon::parse($entry->created_at)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $entry->return ? \Carbon\Carbon::parse($entry->return)->translatedFormat('l, d F Y') : '-' }}</td>
                        <td><span class="badge {{ [
                            'Tersedia' => 'bg-label-primary',
                            'Proses' => 'bg-label-warning',
                            'Dipinjam' => 'bg-label-danger',
                            'Ditolak' => 'bg-label-dark',
                            'Dikembalikan' => 'bg-label-info',
                        ][$entry->status] ?? 'bg-label-secondary' }}">{{ $entry->status }}</span>
                        @if ($entry->reminder_message !== null)
                        <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-reminder-{{ $entry->id }}">
                            <i class="bx bx-error-circle"></i>
                        </button>
                        <div class="modal fade" id="modal-reminder-{{ $entry->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pesan Peringatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="white-space: pre-wrap; word-wrap: break-word;">{{ $entry->reminder_message }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($history->isEmpty())
            <div class="text-center">
                <p class="mt-4 text-center">Belum ada riwayat peminjaman.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
