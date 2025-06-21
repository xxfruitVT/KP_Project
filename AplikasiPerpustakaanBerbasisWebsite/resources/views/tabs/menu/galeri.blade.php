<section class="position-relative text-white text-center py-5" 
    style="background: url('/images/sejarah.jpg') center center / cover no-repeat; height: 400px;">

    <div class="position-relative w-100">
        <img src="{{ asset('images/sekolah.jpg') }}" alt="Sarana dan Prasarana" style="width: 100%; height: 400px; object-fit: cover; filter: brightness(60%);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h2 class="fw-bold">Photo Galeri</h2>
            <p class="fs-5">SMP PADMAJAYA PALEMBANG</p>
        </div>
    </div>

</section>


<style>
    .sarana-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-start;
        gap: 2rem;
        padding: 2rem;
    }

    .sarana-image {
        flex: 1 1 300px;
        max-width: 500px;
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .sarana-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .sarana-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 1rem;
        color: white;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        width: 100%;
    }

    .sarana-text {
        flex: 1 1 300px;
        max-width: 600px;
    }

    .sarana-text h5 {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .sarana-text ol {
        padding-left: 1.25rem;
    }
</style>




<!-- CSS langsung di dalam content -->


<style>
.card-img-top {
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.card-img-top:hover {
    transform: scale(1.05);
}
</style>

<div class="container py-5 mt-4">
    <h2 class="mb-2">Photo Galeri</h2>
    <p class="mb-4">Photo Galeri SMP Padmajaya Palembang</p>


    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri1.jpg') }}" class="card-img-top" alt="Prestasi 1">
            </div>
        </div>
        <!-- Tambahkan kolom-kolom lainnya seperti di bawah -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri2.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri3.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri4.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri5.webp') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri6.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri7.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri8.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri9.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri10.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri11.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri12.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri13.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri14.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri15.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri16.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri17.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri18.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri19.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri20.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri21.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri22.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri23.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri24.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri25.webp') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri26.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri27.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/galeri28.jpg') }}" class="card-img-top" alt="Kegiatan 1">
            </div>
        </div>

    </div>
</div>


