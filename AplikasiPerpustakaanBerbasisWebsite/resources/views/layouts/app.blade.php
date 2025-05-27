<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 78 Jakarta</title>
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
            <a class="navbar-brand" href="#"><img src="{{ asset('logo78.png') }}" width="40"> SMAN 78 JAKARTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active text-danger" href="#">BERANDA</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">PROFIL</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#">Struktur</a></li>
                            <li><a class="dropdown-item" href="#">Tenaga Pendidik</a></li>
                            <li><a class="dropdown-item" href="#">Akademik</a></li>
                            <li><a class="dropdown-item" href="#">Kesiswaan & Humas</a></li>
                            <li><a class="dropdown-item" href="#">Sarpras</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">MENU UTAMA</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Photo Galeri</a></li>
                            <li><a class="dropdown-item" href="#">Partnership</a></li>
                            <li><a class="dropdown-item" href="#">Berita & Artikel</a></li>
                            <li><a class="dropdown-item" href="#">E-Learning</a></li>
                            <li><a class="dropdown-item" href="#">PTN/PTS</a></li>
                            <li><a class="dropdown-item" href="#">E-Voting</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">E-PERPUS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">PPID</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">JAK KONEK</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">IKATAN ALUMNI</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <div class="tab-content" id="tabContent">
            <div class="tab-pane fade show active" id="beranda">@include('tabs.beranda')</div>
            <div class="tab-pane fade" id="profil">@include('tabs.profil')</div>
            <div class="tab-pane fade" id="menu">@include('tabs.menu')</div>
            <div class="tab-pane fade" id="eperpus">@include('tabs.eperpus')</div>
            <div class="tab-pane fade" id="ppid">@include('tabs.ppid')</div>
            <div class="tab-pane fade" id="jak">@include('tabs.jak')</div>
            <div class="tab-pane fade" id="alumni">@include('tabs.alumni')</div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; {{ date('Y') }} SMAN 78 Jakarta. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
