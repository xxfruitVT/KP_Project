<footer class="bg-gray-900 text-white py-10 px-4">
    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">
        {{-- Logo dan Alamat --}}
        <div>
            <div class="flex items-center space-x-3 mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMAN 78" class="w-12">
                <h2 class="text-xl font-bold">SMP PADMAJAYA PALEMBANG</h2>
            </div>
            <p class="text-sm">Jl. jalan, Palembang 11480</p>
            <div class="flex space-x-4 mt-4">
                <a href="#" class="hover:text-orange-500"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-orange-500"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="hover:text-orange-500"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-orange-500"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        {{-- Links --}}
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="font-semibold mb-2">Links</p>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-orange-500">Unduh Persyaratan</a></li>
                    <li><a href="#" class="hover:text-orange-500">Form Pendaftaran</a></li>
                    <li><a href="#" class="hover:text-orange-500">Info PPDB</a></li>
                    <li><a href="#" class="hover:text-orange-500">Info Kelulusan</a></li>
                </ul>
            </div>
            <div>
                <p class="font-semibold mb-2 invisible md:visible">&nbsp;</p>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-orange-500">E-LEARNING</a></li>
                    <li><a href="#" class="hover:text-orange-500">E-PERPUS</a></li>
                    <li><a href="#" class="hover:text-orange-500">E-KBM</a></li>
                    <li><a href="#" class="hover:text-orange-500">E-POINT</a></li>
                </ul>
            </div>
        </div>

        {{-- Newsletter --}}
        <div>
            <p class="font-semibold text-lg mb-2">Tetap terhubung</p>
            <p class="text-sm mb-4">Daftarkan alamat email Anda untuk mendapatkan kabar terbaru</p>
            <div class="relative">
                <input type="email" class="w-full py-2 px-4 rounded-full text-black" placeholder="Your mail here">
                <button class="absolute right-0 top-0 h-full px-4 bg-orange-500 text-white rounded-r-full">
                    <i class="fas fa-envelope"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-10 text-center text-sm text-gray-400">
        © 2024 Copyright SMP PADMAJAYA PALEMBANG
    </div>
</footer>
