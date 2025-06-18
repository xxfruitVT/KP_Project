<style>
    @keyframes slideInLeft {
        0% {
            transform: translateX(-50px);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInRight {
        0% {
            transform: translateX(50px);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .slide-in-left {
        animation: slideInLeft 1s ease-out;
    }

    .slide-in-right {
        animation: slideInRight 1s ease-out;
    }

    .hero-section {
        background-color: #f8f9fc;
        padding: 60px 0;
    }

    .hero-btn-orange {
        background-color: #f37021;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 8px;
    }

    .hero-btn-green {
        background-color: #4CAF50;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 8px;
    }

    .hero-image {
        max-width: 100%;
        height: auto;
    }
</style>
<section class="hero-section">
    <div class="container d-flex align-items-center justify-content-between flex-wrap">
        <!-- Teks masuk dari kiri -->
        <div class="text-section col-md-6 mb-4 slide-in-left">
            <h6 class="text-muted">SELAMAT DATANG DI</h6>
            <h1 class="fw-bold">Perpustakaan SMP Padmajaya Palembang</h1>
            <p class="mt-3 mb-4">Temukan buku kesukaan kamu dan pinjam buku kapanpun kamu mau hanya di layanan E-Perpus SMP Padmajaya Palembang</p>
            
            <div class="d-flex gap-3 flex-wrap">
                <button class="hero-btn-orange">Login</button>
                <a href="#" class="btn btn-outline-dark align-self-center">Registrasi →</a>
            </div>
            <a href="#" class="btn hero-btn-green mt-3 d-block">SOP PELAYANAN SIRKULASI PERPUSTAKAAN</a>
        </div>

        <!-- Gambar masuk dari kanan -->
        <div class="image-section col-md-5 text-center slide-in-right">
            <img src="{{ asset('images/perpus.png') }}" alt="Buku" class="hero-image">
        </div>
    </div>
</section>
