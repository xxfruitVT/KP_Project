<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website SMP Padmajaya Palembang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-white p-2 d-flex justify-content-between align-items-center">
    <div>
        <strong>021 5482914</strong> &nbsp; sman78-jkt@sman78-jkt.sch.id
    </div>
    <div>
        <i class="bi bi-person"></i> <i class="bi bi-person-circle"></i>
    </div>
</header>

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

<main class="container mt-4">
    <div class="tab-content" id="tabContent">
        <div class="tab-pane fade show active" id="beranda">@include('tabs.beranda')</div>

        <!-- Profil Subtabs -->
        <div class="tab-pane fade" id="sejarah">@include('tabs.profil.sejarah')</div>
        <div class="tab-pane fade" id="visi">@include('tabs.profil.visi')</div>
        <div class="tab-pane fade" id="struktur">@include('tabs.profil.struktur')</div>
        <div class="tab-pane fade" id="guru">@include('tabs.profil.tenaga')</div>
        <div class="tab-pane fade" id="akademik">@include('tabs.profil.akademik')</div>
        <div class="tab-pane fade" id="kesiswaan">@include('tabs.profil.kesiswaan')</div>
        <div class="tab-pane fade" id="sarpras">@include('tabs.profil.sarpras')</div>

        <!-- Menu Utama Subtabs -->
        <div class="tab-pane fade" id="galeri">@include('tabs.menu.galeri')</div>
        <div class="tab-pane fade" id="partnership">@include('tabs.menu.partnership')</div>
        <div class="tab-pane fade" id="berita">@include('tabs.menu.berita')</div>
        <div class="tab-pane fade" id="elearning">@include('tabs.menu.elearning')</div>
        <div class="tab-pane fade" id="ptn">@include('tabs.menu.ptn')</div>
        <div class="tab-pane fade" id="evoting">@include('tabs.menu.evoting')</div>

        <!-- Lainnya -->
        <div class="tab-pane fade" id="eperpus">@include('tabs.eperpus')</div>
        <div class="tab-pane fade" id="ppid">@include('tabs.ppid')</div>
        <div class="tab-pane fade" id="jak">@include('tabs.jak')</div>
        <div class="tab-pane fade" id="alumni">@include('tabs.alumni')</div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; {{ date('Y') }} SMP Padmajaya Palembang. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
