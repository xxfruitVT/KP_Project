
<section class="position-relative text-white text-center py-5" 
    style="background: url('/images/sejarah.jpg') center center / cover no-repeat; height: 400px;">

    <div class="position-relative w-100">
        <img src="{{ asset('images/sekolah.jpg') }}" alt="Sarana dan Prasarana" style="width: 100%; height: 400px; object-fit: cover; filter: brightness(60%);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h2 class="fw-bold">SARANA DAN PRASARANA</h2>
            <p class="fs-5">SMP PADMAJAYA PALEMBANG</p>
        </div>
    </div>

</section>




<section class="py-5 px-4 bg-white text-dark">
    <div class="container">
        <h2 class="fw-bold mb-3">Sarana dan Prasarana</h2>
        <p class="fs-5 mb-4">Sarana dan Prasarana SMP Padmadjaya Palembang</p>
        <div class="mb-4">
            <hr class="border-warning" style="width: 300px; height: 4px;">
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

<div class="sarana-container">
    <div class="sarana-image">
        <img src="{{ asset('images/saranaPra.png') }}" alt="Sarana dan Prasarana">
        <div class="sarana-caption">
            <h4>Sarana & Prasarana</h4>
            <small>Sekolah SMAN 78 JAKARTA</small>
        </div>
    </div>
    <div class="sarana-text">
        <h5>Dengan luas tanah seluas 2.730 m2, tersedia:</h5>
        <ol>
            <li>Ruang Kelas refresentatif</li>
            <li>Laboratorium: Komputer dan IPA</li>
            <li>Perpustakaan</li>
            <li>Lapangan olahraga: voly, basket, dan futsal</li>
            <li>Gedung Aula;</li>
            <li>Area parkir (motor dan mobil);</li>
            <li>Wifi dan Hotspot seluruh area;</li>
            <li>Toilet</li>
            <li>Ruang kegiatan siswa (OSIS, UKS) dan kantin.</li>
        </ol>
    </div>
</div>

