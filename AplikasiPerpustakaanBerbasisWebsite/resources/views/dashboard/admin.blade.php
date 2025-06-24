@extends('layouts.layout-eperpus')

@section('content')
<div class="container py-5">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger mt-3">Logout</button>
    </form>
</div>
@endsection
