
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
    <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="sejarah-tab">

        <!-- Header Section -->
        <section class="position-relative text-white text-center py-5" 
            style="background: url('/images/sejarah.jpg') center center / cover no-repeat; height: 400px;">
            <div class="position-relative w-100">
                <img src="{{ asset('images/sekolah.jpg') }}" alt="Sarana dan Prasarana" 
                    style="width: 100%; height: 400px; object-fit: cover; filter: brightness(60%);">
                <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <h2 class="fw-bold">SEJARAH</h2>
                    <p class="fs-5">SMP PADMAJAYA PALEMBANG</p>
                </div>
            </div>
        </section>

        <!-- Sejarah Content -->
        <section id="sejarahContent" class="py-5 px-4 bg-white text-dark">
            <div class="container">
                <h2 class="fw-bold mb-3">Sejarah</h2>
                <p class="fs-5 mb-4">Sekilas Tentang Sejarah SMP Padmadjaya Palembang</p>
                <div class="mb-4">
                    <hr class="border-warning" style="width: 300px; height: 4px;">
                </div>
                <div class="lh-lg text-justify">
                    <p>SMP PADMAJAYA PALEMBANG, yang beralamat di Jalan Padmajaya No. 114, Kelurahan 9/10 Ulu, Kecamatan Jakabaring, Kota Palembang, Provinsi Sumatera Selatan, merupakan sekolah swasta yang telah berdiri sejak tahun 1974. Sekolah ini berada di bawah naungan Yayasan Buddhakirti dan SMP Padmajaya Palembang dipimpin oleh seorang kepala sekolah yang bernama Jenny Chintia dibantu oleh operator bernama Evita Dewi Harnis. Serta memiliki luas tanah seluas 2.730 meter persegi.</p>
                    <p>SMP PADMAJAYA PALEMBANG dikenal dengan komitmennya dalam memberikan pendidikan berkualitas dan berkarakter kepada para siswanya. Sekolah ini menyelenggarakan pendidikan jenjang SMP dengan sistem pembelajaran pagi selama 6 hari. SMP PADMAJAYA PALEMBANG telah mendapatkan akreditasi "B" berdasarkan SK No. 549/BAP-SM/TU/X/2015 yang tertanggal 16 Oktober 2015.</p>
                    <p>Sekolah ini memiliki akses internet yang memadai dan mendapat pasokan listrik dari PLN. SMP PADMAJAYA PALEMBANG juga dilengkapi dengan berbagai fasilitas pendukung, seperti ruang kelas yang nyaman, laboratorium, perpustakaan, dan lapangan olahraga.</p>
                    <p>SMP PADMAJAYA PALEMBANG senantiasa berupaya untuk meningkatkan kualitas pendidikan dan menanamkan nilai-nilai luhur kepada para siswanya. Sekolah ini juga memiliki program unggulan yang bertujuan untuk mengembangkan potensi dan bakat siswa, seperti ekstrakurikuler, bimbingan belajar, dan program pengembangan diri.</p>
                    <p>SMP PADMAJAYA PALEMBANG menjadi pilihan yang tepat bagi orang tua yang menginginkan pendidikan berkualitas dan berkarakter bagi putra-putrinya. Sekolah ini mendukung pengembangan potensi siswa dan memberikan bekal yang memadai untuk menghadapi tantangan masa depan.</p>
                </div>
            </div>
        </section>

    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabTrigger = document.querySelector('[data-bs-target="#sejarah"]');
        const content = document.getElementById("sejarahContent");

        if (tabTrigger && content) {
            tabTrigger.addEventListener("shown.bs.tab", function () {
                content.classList.remove("animate-slide-up");
                void content.offsetWidth; // Reflow to restart animation
                content.classList.add("animate-slide-up");
            });
        }
    });
</script>

