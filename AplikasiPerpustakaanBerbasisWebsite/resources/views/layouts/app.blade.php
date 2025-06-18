<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website SMP Padmajaya Palembang</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/tab-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav-bar.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<script>
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.classList.add('navbar-hidden');
        } else {
            navbar.classList.remove('navbar-hidden');
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
</script>

<body>
<header class="bg-dark text-white p-2 d-flex justify-content-between align-items-center">
    <div>
        <strong>0711513366.</strong> &nbsp; smppadmajaya19@gmail.com
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo"
                 style="width: 50px; height: 50px; clip-path: polygon(25% 5%, 75% 5%, 100% 50%, 75% 95%, 25% 95%, 0% 50%); object-fit: cover;">
            SMP Padmajaya Palembang
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTabs">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTabs">
            <ul class="nav nav-tabs ms-auto" id="mainTab" role="tablist">
                <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#beranda">BERANDA</button></li>
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
                    </ul>
                </li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#eperpus">E-PERPUS</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#alumni">IKATAN ALUMNI</button></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container mt-4">
    <div class="tab-content" id="tabContent">
        <div class="tab-pane fade show active" id="beranda">@include('tabs.beranda')</div>
        <div class="tab-pane fade" id="sejarah">@include('tabs.profil.sejarah')</div>
        <div class="tab-pane fade" id="visi">@include('tabs.profil.visi')</div>
        <div class="tab-pane fade" id="struktur">@include('tabs.profil.struktur')</div>
        <div class="tab-pane fade" id="guru">@include('tabs.profil.tenaga')</div>
        <div class="tab-pane fade" id="akademik">@include('tabs.profil.akademik')</div>
        <div class="tab-pane fade" id="kesiswaan">@include('tabs.profil.kesiswaan')</div>
        <div class="tab-pane fade" id="sarpras">@include('tabs.profil.sarpras')</div>
        <div class="tab-pane fade" id="galeri">@include('tabs.menu.galeri')</div>
        <div class="tab-pane fade" id="partnership">@include('tabs.menu.partnership')</div>
        <div class="tab-pane fade" id="berita">@include('tabs.menu.berita')</div>
        <div class="tab-pane fade" id="eperpus">@include('tabs.eperpus')</div>
      
        <div class="tab-pane fade" id="alumni">@include('tabs.alumni')</div>
    </div>
</main>

<footer class="bg-dark text-white pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"
                         style="width: 50px; height: 50px; clip-path: polygon(25% 5%, 75% 5%, 100% 50%, 75% 95%, 25% 95%, 0% 50%); object-fit: cover;">
                    <h5 class="mb-0 ms-2">SMP Padmajaya Palembang</h5>
                </div>
                <p>Jl. Padma Jaya No.114, 11 Ulu <br>Kec. Seberang Ulu II <br> Kota Palembang<br>Sumatera Selatan 30111</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="https://www.facebook.com/share/1C71cU2grw/" class="text-white fs-5"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white fs-5"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.instagram.com/smppadmajaya_plg?igsh=MWFkbTFyeDJteXRqaA==" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
                    <a href="https://youtube.com/@padmajayapalembang5507?si=5K2tCOZTu9LI5MKR" class="text-white fs-5"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Links</h5>
                <div class="row">
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white text-decoration-none">Unduh Persyaratan</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Form Pendaftaran</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Info PPDB</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Info Kelulusan</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white text-decoration-none">E-PERPUS</a></li>
                            <li><a href="#" class="text-white text-decoration-none">E-KBM</a></li>
                            <li><a href="#" class="text-white text-decoration-none">E-POINT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Tetap terhubung</h5>
                <p>Daftarkan alamat email Anda untuk mendapatkan kabar terbaru</p>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Your mail here">
                    <button class="btn btn-warning text-white" type="button">
                        <i class="bi bi-envelope-paper-fill"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            © {{ date('Y') }} SMP Padmajaya Palembang.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
