@extends('layouts.layout-eperpus')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Registrasi</h2>
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Daftar Sebagai</label>
            <select name="role" class="form-control" required>
                <option value="siswa">Siswa</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button class="btn btn-success">Registrasi</button>
        <p class="mt-3">
            Sudah punya akun? 
            <a href="{{ route('login', ['role' => 'siswa']) }}">Login sebagai Siswa</a> |
            <a href="{{ route('login', ['role' => 'admin']) }}">Login sebagai Admin</a>
        </p>
        
    </form>
    <!-- Tombol Back ke E-Perpus -->
    <div class="mt-4">
        <a href="{{ route('eperpus') }}" class="btn btn-secondary">← Kembali ke E-Perpus</a>
    </div>
</div>
@endsection
