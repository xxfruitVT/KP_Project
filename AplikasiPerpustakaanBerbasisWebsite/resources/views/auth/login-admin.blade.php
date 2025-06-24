@extends('layouts.layout-eperpus')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Login {{ ucfirst($role ?? '') }}</h2>
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="role" value="{{ $role }}">
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" required class="form-control">
        </div>
        <button class="btn btn-primary">Login</button>
        <p class="mt-3">Belum punya akun? <a href="{{ route('register') }}">Registrasi</a></p>
    </form>
    <!-- Tombol Back ke E-Perpus -->
    <div class="mt-4">
        <a href="{{ route('eperpus') }}" class="btn btn-secondary">← Kembali ke E-Perpus</a>
    </div>
</div>
@endsection
