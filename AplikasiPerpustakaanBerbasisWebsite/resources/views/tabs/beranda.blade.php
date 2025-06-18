<h3>Beranda</h3>
<p>Selamat datang di website resmi SMP Padmajaya Palembang</p>

<style>
    body, html {
        margin: 0;
        padding: 0;
    }

    .carousel-container {
        position: relative;
        overflow: hidden;
        width: 100vw;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-slide {
        min-width: 100vw;
        flex-shrink: 0;
    }

    .carousel-slide img {
        width: 100vw;
        height: 500px;
        object-fit: cover;
        display: block;
    }

    .carousel-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 2rem;
        border: none;
        cursor: pointer;
        padding: 0.5rem 1rem;
        z-index: 10;
    }

    .carousel-button.left {
        left: 10px;
    }

    .carousel-button.right {
        right: 10px;
    }

    .carousel-button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .sambutan-container {
        padding: 40px 20px;
        background-color: #f1f6f9;
        font-family: Arial, sans-serif;
    }

    .sambutan-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        align-items: center;
    }

    .sambutan-kiri {
        flex: 1;
        text-align: center;
        max-width: 300px;
        opacity: 0;
        animation-duration: 1s;
        animation-fill-mode: forwards;
    }

    .sambutan-kanan {
        flex: 2;
        max-width: 700px;
        opacity: 0;
        animation-duration: 1s;
        animation-fill-mode: forwards;
    }

    .kepsek-img {
        width: 100%;
        max-width: 250px;
        border-radius: 10px;
    }

    .kepsek-info {
        margin-top: 10px;
    }

    .kepsek-info h2 {
        margin: 0;
        font-size: 1.4rem;
    }

    .kepsek-info p {
        color: #666;
    }

    .sambutan-kanan h2 {
        font-size: 1.8rem;
        margin-bottom: 10px;
    }

    .sambutan-kanan p {
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .btn-selengkapnya {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #f58020;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .statistik-container {
        margin-top: 40px;
        display: flex;
        justify-content: center;
        gap: 60px;
        flex-wrap: wrap;
    }

    .stat-box {
        text-align: center;
    }

    .stat-box h3 {
        font-size: 2rem;
        margin: 0;
        color: #333;
    }

    .stat-box span {
        color: #f58020;
        font-size: 1.5rem;
    }

    .stat-box p {
        color: #d90429;
        font-weight: bold;
        margin-top: 5px;
    }

    /* Animasi masuk kiri-kanan */
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

    .sambutan-kiri.animate-left {
        animation-name: slideInLeft;
    }

    .sambutan-kanan.animate-right {
        animation-name: slideInRight;
    }
</style>

<div class="carousel-container">
    <div class="carousel-track" id="carouselTrack">
        <div class="carousel-slide"><img src="{{ asset('images/beranda1.jpg') }}" alt="Slide 1"></div>
        <div class="carousel-slide"><img src="{{ asset('images/beranda2.jpg') }}" alt="Slide 2"></div>
        <div class="carousel-slide"><img src="{{ asset('images/beranda4.jpg') }}" alt="Slide 4"></div>
        <div class="carousel-slide"><img src="{{ asset('images/beranda6.jpg') }}" alt="Slide 6"></div>
        <div class="carousel-slide"><img src="{{ asset('images/beranda7.jpg') }}" alt="Slide 7"></div>
    </div>
    <button id="prevBtn" class="carousel-button left" onclick="prevSlide()">‹</button>
    <button id="nextBtn" class="carousel-button right" onclick="nextSlide()">›</button>
</div>

<!-- Sambutan Kepala Sekolah -->
<section class="sambutan-container">
    <div class="sambutan-content">
        <div class="sambutan-kiri">
            <img src="{{ asset('images/gambar12.jpg') }}" alt="Kepala Sekolah" class="kepsek-img">
            <div class="kepsek-info">
                <h2>Jenny Chintia</h2>
                <p>Kepala Sekolah</p>
            </div>
        </div>
        <div class="sambutan-kanan">
            <h2>Sambutan Kepala Sekolah</h2>
            <p>Assalamu’alaikum Warahmatullahi Wabarakaatuh.</p>
            <p>
                Salam sejahtera untuk kita semua. Selamat datang di website SMP Padmajaya Palembang.
                Website ini dibangun sebagai sarana atau media informasi dan komunikasi sekolah,
                sejalan dengan perkembangan teknologi industri 4.0 yang berguna untuk memudahkan
                mencari informasi tentang sekolah kami.
            </p>
        </div>
    </div>
    <div class="statistik-container">
        <div class="stat-box">
            <h3><span class="counter" data-target="55">0</span><span>+</span></h3>
            <p>Peserta Didik</p>
        </div>
        <div class="stat-box">
            <h3><span class="counter" data-target="18">0</span><span>+</span></h3>
            <p>Guru Tendik</p>
        </div>
        <div class="stat-box">
            <h3><span class="counter" data-target="4">0</span><span>+</span></h3>
            <p>Kelas</p>
        </div>
    </div>
</section>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const track = document.getElementById('carouselTrack');
    const totalSlides = slides.length;

    function updateSlidePosition() {
        track.style.transform = `translateX(-${currentSlide * 100}vw)`;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlidePosition();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlidePosition();
    }

    // Swipe gesture support
    let startX = 0;
    track.addEventListener('touchstart', e => {
        startX = e.touches[0].clientX;
    });
    track.addEventListener('touchend', e => {
        const endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) nextSlide();
        else if (endX - startX > 50) prevSlide();
    });

    // Animasi sambutan
    function animateSambutan() {
        const kiri = document.querySelector('.sambutan-kiri');
        const kanan = document.querySelector('.sambutan-kanan');
        const trigger = window.innerHeight * 0.9;

        if (kiri.getBoundingClientRect().top < trigger) {
            kiri.classList.add('animate-left');
        }
        if (kanan.getBoundingClientRect().top < trigger) {
            kanan.classList.add('animate-right');
        }
    }

    // Animasi angka naik
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        const trigger = window.innerHeight * 0.9;

        counters.forEach(counter => {
            const rect = counter.getBoundingClientRect();
            if (rect.top < trigger && !counter.classList.contains('counted')) {
                counter.classList.add('counted');
                const target = +counter.getAttribute('data-target');
                let current = 0;
                const increment = target / 100;

                const update = () => {
                    if (current < target) {
                        current += increment;
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(update);
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                };

                update();
            }
        });
    }

    window.addEventListener('scroll', () => {
        animateSambutan();
        animateCounters();
    });
    window.addEventListener('load', () => {
        animateSambutan();
        animateCounters();
    });
</script>
