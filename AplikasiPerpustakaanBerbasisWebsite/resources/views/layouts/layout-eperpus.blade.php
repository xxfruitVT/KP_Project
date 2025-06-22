<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan - SMP Padmajaya Palembang</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/tab-style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>

    @yield('content')

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
