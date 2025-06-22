@extends('layouts.layout-eperpus')

@section('content')



<style>
    /* === Navbar Style === */
    .custom-navbar {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px 0;
    }

    .navbar-brand img {
        height: 40px;
        margin-right: 10px;
    }

    .brand-text {
        line-height: 1.2;
        font-weight: bold;
        font-size: 0.95rem;
        color: #1a1f36;
    }

    .navbar-nav .nav-link {
        color: #333;
        font-weight: 500;
        margin: 0 10px;
    }

    .navbar-nav .nav-link.active {
        color: #f37021;
        font-weight: 600;
    }

    .dropdown-toggle::after {
        margin-left: 0.4em;
    }

    /* === Hero Animation === */
    @keyframes slideInLeft {
        0% { transform: translateX(-50px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInRight {
        0% { transform: translateX(50px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }

    .slide-in-left {
        animation: slideInLeft 1s ease-out;
    }

    .slide-in-right {
        animation: slideInRight 1s ease-out;
    }

    /* === Hero Section === */
    .hero-section {
        background-color: #f8f9fc;
        padding: 80px 0;
    }

    .hero-title {
        font-weight: 800;
        font-size: 2.7rem;
        color: #1a1f36;
    }

    .hero-subtitle {
        font-size: 1rem;
        color: #5f6368;
    }

    .hero-btn-orange {
        background-color: #f37021;
        color: white;
        padding: 12px 32px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .hero-btn-orange:hover {
        background-color: #e25f10;
    }

    .hero-btn-green {
        background-color: #4CAF50;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        margin-top: 20px;
        display: inline-block;
    }

    .hero-btn-green:hover {
        background-color: #449d48;
    }

    .hero-image {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
    }
</style>

<!-- === Navbar === -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo-sman78.png') }}" alt="Logo">
            <div class="brand-text">
                PERPUSTAKAAN<br>SMAN 78 JAKARTA
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Beranda<br><small class="text-muted">JAK KONEK</small></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Kearifan Lokal</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Baca Online</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Podcast</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown">
                        Login
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Login Admin</a></li>
                        <li><a class="dropdown-item" href="#">Login Siswa</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- === Hero Section === -->
<section class="hero-section">
    <div class="container d-flex align-items-center justify-content-between flex-wrap">
        <!-- Teks kiri -->
        <div class="text-section col-md-6 mb-4 slide-in-left">
            <h6 class="text-muted">SELAMAT DATANG DI</h6>
            <h1 class="hero-title">Perpustakaan SMP Padmajaya Palembang</h1>
            <p class="hero-subtitle mt-3 mb-4">
                Temukan buku kesukaan kamu dan pinjam buku kapanpun kamu mau hanya di layanan E-Perpus SMP Padmajaya Palembang
            </p>

            <div class="d-flex gap-3 flex-wrap">
                <button class="hero-btn-orange">Login</button>
                <a href="#" class="btn btn-outline-dark align-self-center">Registrasi →</a>
            </div>

            <a href="#" class="hero-btn-green">SOP PELAYANAN SIRKULASI PERPUSTAKAAN</a>
        </div>

        <!-- Gambar kanan -->
        <div class="image-section col-md-5 text-center slide-in-right">
            <img src="{{ asset('images/perpus.png') }}" alt="Buku" class="hero-image">
        </div>
    </div>
</section>
@endsection
