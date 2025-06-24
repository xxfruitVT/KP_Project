@extends('layouts.layout-eperpus')

@section('content')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    html {
        scroll-behavior: smooth;
    }

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

    @keyframes slideInLeft {
        0% { transform: translateX(-50px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInRight {
        0% { transform: translateX(50px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }

    .slide-in-left { animation: slideInLeft 1s ease-out; }
    .slide-in-right { animation: slideInRight 1s ease-out; }

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

    .hero-btn-orange:hover { background-color: #e25f10; }

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

    .hero-btn-green:hover { background-color: #449d48; }

    .hero-image {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
    }

    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .swiper-kearifan,
    .swiper-baca-online {
        padding: 0 10px;
    }

    .swiper-wrapper {
        justify-content: center;
    }

    .swiper-pagination {
        text-align: center;
    }

    .swiper-pagination-bullet {
        background: #d3d3d3;
        opacity: 1;
        width: 10px;
        height: 10px;
        margin: 0 4px;
    }

    .swiper-pagination-bullet-active {
        background: #f37021;
    }
</style>

<!-- === Navbar === -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <div class="brand-text">PERPUSTAKAAN<br>SMP PADMAJAYA PALEMBANG</div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#kearifan-lokal">Kearifan Lokal</a></li>
                <li class="nav-item"><a class="nav-link" href="#book-read">Baca Online</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown">Login</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('login', ['role' => 'admin']) }}">Login Admin</a></li>
                        <li><a class="dropdown-item" href="{{ route('login', ['role' => 'siswa']) }}">Login Siswa</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- === Hero Section === -->
<section class="hero-section">
    <div class="container d-flex align-items-center justify-content-between flex-wrap">
        <div class="text-section col-md-6 mb-4 slide-in-left">
            <h6 class="text-muted">SELAMAT DATANG DI</h6>
            <h1 class="hero-title">Perpustakaan SMP Padmajaya Palembang</h1>
            <p class="hero-subtitle mt-3 mb-4">Temukan buku kesukaan kamu dan pinjam buku kapanpun kamu mau hanya di layanan E-Perpus SMP Padmajaya Palembang</p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('login', ['role' => 'admin']) }}" class="hero-btn-orange">Login Admin</a>
                <a href="{{ route('login', ['role' => 'siswa']) }}" class="hero-btn-orange">Login Siswa</a>
                <a href="{{ route('register') }}" class="btn btn-outline-dark align-self-center">Registrasi →</a>
            </div>
            <a href="{{ asset('pdf/SOP.pdf') }}" target="_blank" class="hero-btn-green">SOP PELAYANAN SIRKULASI PERPUSTAKAAN</a>
        </div>
        <div class="image-section col-md-5 text-center slide-in-right">
            <img src="{{ asset('images/perpus.png') }}" alt="Buku" class="hero-image">
        </div>
    </div>
</section>
<!-- Koleksi Buku -->
<section class="container my-5" id="book-section">
    <h2 class="text-center fw-bold mb-4">Koleksi Buku Terbaru</h2>

    <div id="book-list" class="row">
        @foreach ($books as $book)
        <div class="col-md-3 mb-4">
            <a href="{{ url('/eperpus/' . $book->id) }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm" style="cursor: pointer;">
                    <img src="{{ asset('storage/cover/' . $book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ \Illuminate\Support\Str::limit($book->title, 40) }}</h6>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- === Kearifan Lokal === -->
<section id="kearifan-lokal" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-2" style="color: #1a1f36;">Koleksi Tematik Kearifan Lokal Sumatera Selatan</h2>
        <p class="text-center text-secondary mb-4 fw-semibold">Kunjungi Perpus Untuk Membaca!</p>

        <div class="swiper swiper-kearifan d-flex justify-content-center flex-column align-items-center">
            <div class="swiper-wrapper" style="max-width: 1000px;">
                @foreach (['kLokal1.jpeg','kLokal2.jpg','kLokal3.jpg','kLokal4.jpg','kLokal5.jpg','kLokal6.jpeg'] as $i => $img)
                <div class="swiper-slide text-center" style="width: 220px;">
                    <img src="{{ asset('images/' . $img) }}" class="rounded shadow-sm w-100" alt="kearifan {{ $i }}">
                    <h6 class="mt-2 fw-bold text-dark">Judul Buku {{ $i + 1 }}</h6>
                    <p class="text-muted mb-0">Kunjungi Perpus Untuk Membaca!</p>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- === Baca Online === -->
<section class="container my-5" id="book-read">
    <h2 class="text-center fw-bold mb-4">Baca Online</h2>

    <div class="swiper swiper-baca-online">
        <div class="swiper-wrapper">
            @foreach ($books as $book)
            <div class="swiper-slide text-center" style="width: 220px;">
                <div class="card shadow-sm text-center h-100" style="cursor: pointer;">
                    <img src="{{ asset('storage/cover/' . $book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ \Illuminate\Support\Str::limit($book->title, 40) }}</h6>
                        <p class="text-muted mb-2">{{ $book->kelas }}</p>
                        <a href="{{ route('buku.detail', $book->id) }}" class="btn btn-warning mt-auto">Baca Online</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    new Swiper(".swiper-kearifan", {
        slidesPerView: 'auto',
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-kearifan .swiper-pagination',
            clickable: true,
        },
    });

    new Swiper(".swiper-baca-online", {
        slidesPerView: 'auto',
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-baca-online .swiper-pagination',
            clickable: true,
        },
    });
</script>
@endsection
