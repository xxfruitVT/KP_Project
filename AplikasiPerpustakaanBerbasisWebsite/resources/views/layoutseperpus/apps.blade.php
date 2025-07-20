<!DOCTYPE html>

<!-- =========================================================
* Coder by Penjarah Kos
==============================================================

* Dibuat untu memenuhi tugas besar Analisis dan Desain Sistem Informasi

=========================================================
 -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('App/Etc/assets') }}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Apps Perpustakaan Digital</title>

    <meta name="description" content="Perpustakaan Digital: Akses buku favorit Anda secara online dengan mudah dan cepat. Temukan berbagai genre buku berkualitas, pengembalian buku mudah, dan peningkatan literasi.">
    <meta name="keywords" content="perpustakaan, buku, pinjam buku, digital library, peminjaman buku, baca buku, genre, literature">
    <meta name="author" content="Lazuardi Irham Karaman, Andika Dwi Putra, Agya Gilar Cahyono">

    <meta property="og:title" content="Perpustakaan Digital - Baca dan Pinjam Buku Sekarang!">
    <meta property="og:description" content="Jelajahi koleksi buku kami. Pinjam dengan mudah, tingkatkan literasi Anda!">
    <meta property="og:image" content="https://blog-eperpus.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/01/13044959/logo-eperpus-300x82.png">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Perpustakaan Digital - Baca dan Pinjam Buku Sekarang!">
    <meta name="twitter:description" content="Jelajahi koleksi buku kami. Pinjam dengan mudah, tingkatkan literasi Anda!">
    <meta name="twitter:image" content="https://blog-eperpus.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/01/13044959/logo-eperpus-300x82.png">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://png.pngtree.com/png-vector/20230414/ourmid/pngtree-book-library-logo-vector-education-free-download-png-image_6705087.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('App/Etc/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('App/Etc/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('App/Etc/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('App/Etc/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('App/Etc/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('App/Etc/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('App/Etc/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('App/Etc/assets/js/config.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('partials.sidebar-app')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('partials.navbar-app')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')

                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Kelas B</a>
                            </div>

                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- <div class="buy-now">
        <a
            href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
            target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div> -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('App/Etc/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('App/Etc/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('App/Etc/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('App/Etc/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('App/Etc/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('App/Etc/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('App/Etc/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('App/Etc/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    @if(session('success'))
    <script>
        const success = "{{ session('success') }}";
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: success,
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        const error = "{{ session('error') }}";
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error,
            confirmButtonText: 'OK'
        });
    </script>
    @endif
</body>

</html>
