<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan SMP Padmajaya Palembang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Top bar -->
    <div class="bg-black text-white text-sm flex justify-between px-6 py-2">
        <div>+62215482914</div>
        <div>✉️ smpPadmajaya-palembang@smpPadmajaya-palembang.sch.id</div>
    </div>

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-12 h-12">
                <span class="font-bold text-lg">PERPUSTAKAAN SMP PADMAJAYA PALEMBANG</span>
            </div>
            <ul class="flex space-x-8 text-gray-800 font-medium items-center">
                <li><a href="#" class="text-orange-500">Beranda</a></li>

                <!-- Dropdown -->
                <li class="relative group">
                    <button class="flex items-center text-orange-500 hover:text-orange-600 focus:outline-none">
                        Login
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul class="absolute hidden group-hover:block bg-white shadow-md rounded-md py-2 mt-2 w-40 z-10">
                        <li><a href="{{ route('login.admin') }}" class="block px-4 py-2 hover:bg-gray-100">Admin</a></li>
                        <li><a href="{{ route('login.student') }}" class="block px-4 py-2 hover:bg-gray-100">Siswa</a></li>
                        <li><a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-100">Registrasi</a></li>
                    </ul>
                </li>

                <li><a href="#" class="hover:text-orange-600">Kearifan Lokal</a></li>
                <li><a href="#" class="hover:text-orange-600">Berita</a></li>
                <li><a href="#" class="hover:text-orange-600">Baca Online</a></li>
                <li><a href="#" class="hover:text-orange-600">Podcast</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mx-auto px-6 py-16 text-center">
        <h2 class="text-lg text-gray-500 font-semibold">SELAMAT DATANG DI</h2>
        <h1 class="text-4xl font-bold text-gray-800 mt-2 mb-4">Perpustakaan SMAN 78 JAKARTA</h1>
        <p class="text-gray-600 mb-6">Temukan buku kesukaan kamu dan pinjam buku kapanpun kamu mau hanya di layanan E-Perpus SMAN 78 Jakarta</p>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="bg-orange-500 text-white px-6 py-3 rounded-md font-bold hover:bg-orange-600">Login</a>
            <a href="{{ route('register') }}" class="text-gray-700 font-semibold hover:underline">Registrasi →</a>
        </div>
        <div class="mt-6">
            <a href="#" class="bg-green-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-green-600">
                SOP PELAYANAN SIRKULASI PERPUSTAKAAN
            </a>
        </div>
    </div>
</body>
</html>
