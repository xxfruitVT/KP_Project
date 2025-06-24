@extends('layouts.layout-eperpus')

@section('content')
<div class="container my-5">
    <a href="{{ route('eperpus') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/cover/' . $book->cover) }}" class="img-fluid shadow" alt="{{ $book->title }}">
        </div>
        <div class="col-md-8">
            <h3>{{ $book->title }}</h3>
            <p><strong>Penulis:</strong> {{ $book->author }}</p>
            <p><strong>Kategori:</strong> {{ $book->category }}</p>
            <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
           
           
        </div>
    </div>
    <p><strong>Deskripsi:</strong></p>
    <p>{{ $book->description }}</p>
</div>
@endsection
