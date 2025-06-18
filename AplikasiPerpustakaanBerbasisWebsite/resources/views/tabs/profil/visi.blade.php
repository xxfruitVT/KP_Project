
<link rel="stylesheet" href="{{ asset('css/sejarah.css') }}">
<style>
    @keyframes slideUpFade {
        0% {
            transform: translateY(30px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-slide-up {
        animation: slideUpFade 0.8s ease-out;
    }

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


<!-- TAB CONTENT -->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="visi" role="tabpanel" aria-labelledby="visi-tab">

        <!-- Header Section -->
        <section class="position-relative text-white text-center py-5" 
            style="background: url('/images/sejarah.jpg') center center / cover no-repeat; height: 400px;">
            <div class="position-relative w-100">
                <img src="{{ asset('images/sekolah.jpg') }}" alt="Sarana dan Prasarana" style="width: 100%; height: 400px; object-fit: cover; filter: brightness(60%);">
                <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <h2 class="fw-bold">VISI DAN MISI</h2>
                    <p class="fs-5">SMP PADMAJAYA PALEMBANG</p>
                </div>
            </div>
        </section>

        <!-- Visi Misi Content -->
        <section id="visiMisiContent" class="py-5 px-4 bg-white text-dark">
            <div class="container">
                <h2 class="fw-bold mb-3">VISI dan MISI</h2>
                <p class="fs-5 mb-4">VISI dan MISI SMP Padmadjaya Palembang</p>
                <div class="mb-4">
                    <hr class="border-warning" style="width: 300px; height: 4px;">
                </div>
                <div class="lh-lg text-justify">
                    <h5 class="fw-bold mb-2">VISI</h5>
                    <p>Terbentuknya insan yang berkarakter Pancasila, berwawasan IPTEK dan berbudaya lingkungan.</p>
                    <h5 class="fw-bold mt-4 mb-2">MISI</h5>
                    <p>1. Melaksanakan kegiatan penanaman nilai-nilai kemanusiaan (PNK).</p>
                    <p>2. Melaksanakan pendidikan karakter dalam kegiatan projek penguatan profil pelajar Pancasila (P5).</p>
                    <p>3. Menciptakan warga sekolah peduli dengan lingkungan.</p>
                </div>
            </div>
        </section>

    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabTrigger = document.querySelector('[data-bs-target="#visi"]');
        const content = document.getElementById("visiMisiContent");

        if (tabTrigger && content) {
            tabTrigger.addEventListener("shown.bs.tab", function () {
                content.classList.remove("animate-slide-up");
                void content.offsetWidth; // Restart animation
                content.classList.add("animate-slide-up");
            });
        }
    });
</script>

