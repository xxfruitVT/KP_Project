<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Perpustakaan Digital - Baca dan Pinjam Buku Online</title>
    <link rel="icon" href="https://png.pngtree.com/png-vector/20230414/ourmid/pngtree-book-library-logo-vector-education-free-download-png-image_6705087.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('Home/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Home/icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Home/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Home/style.css') }}">

    {{-- Chatbot --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="{{ asset('Home/chatbot.css') }}">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    @include('partials.navbar-home')

    @yield('content')

    @include('home.chatbot')
    <script src="{{ asset('Home/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="{{ asset('Home/js/plugins.js') }}"></script>
    <script src="{{ asset('Home/js/script.js') }}"></script>

</body>

</html>
