@push('styles')
<link rel="stylesheet" href="{{ asset('css/sejarah.css') }}">
@endpush

<!-- Header Section -->
<section class="position-relative text-white text-center py-5" 
    style="background: url('/images/sejarah.jpg') center center / cover no-repeat; height: 400px;">

    <div class="position-relative w-100">
        <img src="{{ asset('images/sekolah.jpg') }}" alt="Sarana dan Prasarana" style="width: 100%; height: 400px; object-fit: cover; filter: brightness(60%);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h2 class="fw-bold">SEJARAH</h2>
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
</style



<!-- Sejarah Content -->
<section class="py-5 px-4 bg-white text-dark">
    <div class="container">
        <h2 class="fw-bold mb-3">VISI dan MISI</h2>
        <p class="fs-5 mb-4">VISI dan MISI SMP Padmadjaya Palembang</p>
        <div class="mb-4">
            <hr class="border-warning" style="width: 300px; height: 4px;">
        </div>
        <div class="lh-lg text-justify">
            <h8 class="fw-bold mb-3">VISI</h8>
            <p>Terbentuknya insan yang berkarakter Pancasila, berwawasan IPTEK dan berbudaya lingkungan.</p>
            <h8 class="fw-bold mb-3">MISI</h8>
            <p>1. Melaksanakan kegiatan penanaman nilai-nilai kemanusiaan (PNK).</p>
            <p>2. Melaksanakan pendidikan karakter dalam kegiatan projek penguatan profil pelajar Pancasila (P5).</p>
            <p>3. Menciptakan warga sekolah peduli dengan lingkungan.</p>
        </div>
    </div>
</section>
