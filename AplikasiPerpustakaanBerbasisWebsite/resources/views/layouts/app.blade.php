<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SMP Padmajaya Palembang') }}</title>
    
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tailwind via Vite (jika digunakan) --}}
    @vite('resources/css/app.css')
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- Header Atas --}}
    <header class="bg-dark text-white p-2 d-flex justify-content-between align-items-center">
        <div>
            <strong>021 5482914</strong> &nbsp; smpPadmadjaya-Palembang@smpPadmajaya-Palembang.sch.id
        </div>
        <div>
            <i class="bi bi-person"></i> <i class="bi bi-person-circle"></i>
        </div>
    </header>

    {{-- Navbar dan Tabs --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('logo78.png') }}" width="40"> SMP Padmajaya Palembang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTabs">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTabs">
                <ul class="nav nav-tabs ms-auto" id="mainTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#beranda">BERANDA</button>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">PROFIL</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#sejarah">Sejarah</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#visi">Visi & Misi</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#struktur">Struktur</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#guru">Tenaga Pendidik</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#akademik">Akademik</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#kesiswaan">Kesiswaan & Humas</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#sarpras">Sarpras</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">MENU UTAMA</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#galeri">Photo Galeri</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#partnership">Partnership</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#berita">Berita & Artikel</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#elearning">E-Learning</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#ptn">PTN/PTS</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="tab" data-bs-target="#evoting">E-Voting</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#eperpus">E-PERPUS</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ppid">PPID</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#jak">JAK KONEK</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alumni">IKATAN ALUMNI</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <main class="flex-grow container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
