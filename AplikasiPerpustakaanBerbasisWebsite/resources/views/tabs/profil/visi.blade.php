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
       <!-- Visi Misi Content -->
<section id="visiMisiContent" class="py-5 px-4 bg-white text-dark">
    <div class="container">
        <h2 class="fw-bold mb-3 mt-4">VISI dan MISI</h2>
        <p class="fs-5 mb-4 mt-3">VISI dan MISI SMP Padmadjaya Palembang</p>
        <div class="mb-4">
            <hr class="border-warning" style="width: 300px; height: 4px;">
        </div>
        <div class="lh-lg text-justify">
            <h5 class="fw-bold mb-2">VISI</h5>
            <p>Terbentuknya insan yang berkarakter Pancasila, berwawasan IPTEK dan berbudaya lingkungan.</p>
            
            <h5 class="fw-bold mt-4 mb-2">MISI</h5>
            <ol>
                <li>Melaksanakan kegiatan penanaman nilai-nilai kemanusiaan (PNK).</li>
                <ul>
                    <li>1.1 Membudayakan budi pekerti luhur bagi warga sekolah.</li>
                    <li>1.2 Mengakui persamaan hak, derajat dan kewajiban sesama warga sekolah.</li>
                    <li>1.3 Menjamin hak belajar setiap anak tanpa terkecuali termasuk anak yang berkebutuhan khusus (inklusi) dalam proses pembelajaran.</li>
                    <li>1.4 Membiasakan perilaku 5S: Senyum, Sapa, Salam, Sopan, dan Santun.</li>
                </ul>
                <li>Melaksanakan pendidikan karakter dalam kegiatan Projek Penguatan Profil Pelajar Pancasila (P5).</li>
                <ul>
                    <li>2.1 Menanamkan nilai karakter pelajar Pancasila melalui berbagai aktivitas.</li>
                </ul>
                <li>Menerapkan strategi pembelajaran yang berorientasi pada ilmu pengetahuan dan teknologi (IPTEK).</li>
                <ul>
                    <li>3.1 Melakukan inovasi dalam kegiatan belajar mengajar.</li>
                    <li>3.2 Membiasakan membaca 15 menit sebelum jam pelajaran dimulai.</li>
                    <li>3.3 Melaksanakan pembelajaran berbasis teknologi.</li>
                </ul>
                <li>Menciptakan warga sekolah peduli dengan lingkungan.</li>
                <ul>
                    <li>4.1 Menjaga lingkungan sekolah bersih, hijau dan meminimalisir sampah yang tidak bermanfaat.</li>
                    <li>4.2 Memaksimalkan sekolah hijau dengan merawat dan memelihara tanaman sekolah.</li>
                </ul>
            </ol>
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
