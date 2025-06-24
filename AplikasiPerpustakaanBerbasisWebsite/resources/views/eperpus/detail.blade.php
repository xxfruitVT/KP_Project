@extends('layouts.layout-eperpus')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <img src="{{ asset('storage/cover/' . $book->cover) }}" class="img-fluid p-4" alt="{{ $book->title }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title fw-bold">{{ $book->title }}</h3>
                    <p class="card-text text-muted">Kelas: {{ $book->kelas }}</p>
                    <p class="card-text">Deskripsi: {{ $book->deskripsi ?? 'Tidak tersedia' }}</p>

                    @if ($book->link_baca)
                        <a href="{{ $book->link_baca }}" target="_blank" class="btn btn-success mt-3">Buka Buku</a>
                    @else
                        <p class="text-danger mt-3">Link baca belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
