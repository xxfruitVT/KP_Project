<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda - SMP Padmajaya</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
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

    .carousel-button.left { left: 10px; }
    .carousel-button.right { right: 10px; }

    .sambutan-container {
      padding: 40px 20px;
      background-color: #f1f6f9;
    }

    .sambutan-content {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      align-items: center;
    }

    .sambutan-kiri, .sambutan-kanan {
      opacity: 0;
      animation-duration: 1s;
      animation-fill-mode: forwards;
    }

    .sambutan-kiri {
      flex: 1;
      text-align: center;
      max-width: 300px;
    }

    .sambutan-kanan {
      flex: 2;
      max-width: 700px;
    }

    .kepsek-img {
      width: 100%;
      max-width: 250px;
      border-radius: 10px;
    }

    .kepsek-info { margin-top: 10px; }
    .kepsek-info h2 { margin: 0; font-size: 1.4rem; }
    .kepsek-info p { color: #666; }
    .sambutan-kanan h2 { font-size: 1.8rem; margin-bottom: 10px; }
    .sambutan-kanan p { line-height: 1.6; margin-bottom: 10px; }

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

    .stat-box h3 { font-size: 2rem; margin: 0; color: #333; }
    .stat-box span { color: #f58020; font-size: 1.5rem; }
    .stat-box p { color: #d90429; font-weight: bold; margin-top: 5px; }

    .teknologi-digital-section {
      padding: 60px 20px;
      background-color: #fff;
      text-align: center;
    }

    .teknologi-heading {
      margin-bottom: 50px;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    .teknologi-heading h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #1e1e1e;
      margin-bottom: 10px;
      letter-spacing: 0.5px;
    }

    .teknologi-heading p {
      font-size: 1.1rem;
      color: #666;
      font-weight: 400;
      line-height: 1.6;
    }

    .digital-cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
    }

    .digital-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
      padding: 30px;
      max-width: 300px;
      text-align: center;
      opacity: 0;
      animation-duration: 1s;
      animation-fill-mode: forwards;
    }

    .icon-img {
      width: 60px;
      height: 60px;
      margin-bottom: 20px;
    }
    .mitra-box {
  background-color: white;
  border: 4px solid #e0e0e0;
  border-radius: 10px;
  flex: 1 1 200px;
  max-width: 250px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 150px;
  opacity: 0;
  animation-duration: 1s;
  animation-fill-mode: forwards;
}

.mitra-box img {
  max-height: 90px;
  max-width: 90%;
}

    

    @keyframes slideInLeft {
      0% { transform: translateX(-60px); opacity: 0; }
      100% { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInRight {
      0% { transform: translateX(60px); opacity: 0; }
      100% { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInBottom {
      0% { transform: translateY(60px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    .animate-left.animate { animation-name: slideInLeft; }
    .animate-right.animate { animation-name: slideInRight; }
    .animate-bottom.animate { animation-name: slideInBottom; }

    .sambutan-kiri.animate-left { animation-name: slideInLeft; }
    .sambutan-kanan.animate-right { animation-name: slideInRight; }
  </style>
</head>
<body>

<h3>Beranda</h3>
<p>Selamat datang di website resmi SMP Padmajaya Palembang</p>

<div class="carousel-container">
  <div class="carousel-track" id="carouselTrack">
    <div class="carousel-slide"><img src="{{ asset('images/beranda1.jpg') }}" alt="Slide 1"></div>
    <div class="carousel-slide"><img src="{{ asset('images/beranda2.jpg') }}" alt="Slide 2"></div>
    <div class="carousel-slide"><img src="{{ asset('images/beranda4.jpg') }}" alt="Slide 4"></div>
  </div>
  <button class="carousel-button left" onclick="prevSlide()">‹</button>
  <button class="carousel-button right" onclick="nextSlide()">›</button>
</div>

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
        Selamat datang di website SMP Padmajaya Palembang. Website ini dibangun sebagai sarana
        komunikasi sekolah sejalan dengan teknologi industri 4.0 untuk memudahkan informasi sekolah.
      </p>
    </div>
  </div>

  <div class="statistik-container">
    <div class="stat-box">
      <h3><span class="counter" data-target="55">0</span>+</h3>
      <p>Peserta Didik</p>
    </div>
    <div class="stat-box">
      <h3><span class="counter" data-target="18">0</span>+</h3>
      <p>Guru Tendik</p>
    </div>
    <div class="stat-box">
      <h3><span class="counter" data-target="4">0</span>+</h3>
      <p>Kelas</p>
    </div>
  </div>
</section>

<section class="teknologi-digital-section">
  <div class="teknologi-heading">
    <h2>SEKOLAH BERBASIS TEKNOLOGI DIGITAL</h2>
    <p>Mandiri perangkat digital untuk mendukung pembelajaran modern dan efisien.</p>
  </div>
  <div class="digital-cards">
    <div class="digital-card animate-left">
      <img src="{{ asset('images/icon1.png') }}" alt="Ruang Server" class="icon-img">
      <h3>Ruang Server</h3>
      <p>Seluruh perangkat sekolah terhubung ke pusat data. Pengelolaan CCTV, Wi-Fi, dan server dilakukan secara terpusat.</p>
    </div>
    <div class="digital-card animate-bottom">
      <img src="{{ asset('images/icon2.png') }}" alt="Ujian Online" class="icon-img">
      <h3>Ujian Berbasis Online</h3>
      <p>Memanfaatkan server lokal mandiri, sistem ujian mendukung hingga 3000 perangkat sekaligus.</p>
    </div>
    <div class="digital-card animate-right">
      <img src="{{ asset('images/icon3.png') }}" alt="Digitalisasi" class="icon-img">
      <h3>Digitalisasi Kebutuhan Siswa</h3>
      <p>QR Absensi, E-Voting, dan sistem pelanggaran digital mendukung kedisiplinan siswa dan guru.</p>
    </div>
  </div>
</section>

<section style="background-color: #f1f6f9; padding: 60px 20px;">
  <div style="text-align: center; margin-bottom: 30px;">
    <h2 style="margin-bottom: 5px;">Dokumentasi Kegiatan Sekolah</h2>
    <div style="color: red; font-size: 2rem;">●●─</div>
    <p>SMP Padmajaya Palembang</p>
  </div>

  <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; max-width: 1200px; margin: auto;">
    <div style="flex: 1 1 300px; max-width: 400px;">
      <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DKbNvxJTKDd/" data-instgrm-version="14" style="width:100%; max-width:400px; margin:auto;">
        <a href="https://www.instagram.com/p/DKbNvxJTKDd/">Lihat di Instagram</a>
      </blockquote>
      <p style="text-align: center;"><strong>Kelulusan Kelas IX</strong></p>
    </div>
    <div style="flex: 1 1 300px; max-width: 400px;">
        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DKbDOD_zrOM/?igsh=YzN2Y3B1cjJrOXYx" data-instgrm-version="14" style="width:100%; max-width:400px; margin:auto;">
          <a href="https://www.instagram.com/p/DKbDOD_zrOM/?igsh=YzN2Y3B1cjJrOXYx">Lihat di Instagram</a>
        </blockquote>
        <p style="text-align: center;"><strong>Kegiatan P5</strong></p>
      </div>
      <div style="flex: 1 1 300px; max-width: 400px;">
        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DKa3mqVzN-C/?igsh=ZW5iaHlyMWZ1NWR4" data-instgrm-version="14" style="width:100%; max-width:400px; margin:auto;">
          <a href="https://www.instagram.com/p/DKa3mqVzN-C/?igsh=ZW5iaHlyMWZ1NWR4">Lihat di Instagram</a>
        </blockquote>
        <p style="text-align: center;"><strong>Penilaian Akhir Tahun</strong></p>
      </div>
      <div style="flex: 1 1 300px; max-width: 400px;">
        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DKGvm5Sz9CU/?igsh=MWV2cWZjanY2ZXIzcA==" data-instgrm-version="14" style="width:100%; max-width:400px; margin:auto;">
          <a href="https://www.instagram.com/p/DKGvm5Sz9CU/?igsh=MWV2cWZjanY2ZXIzcA==">Lihat di Instagram</a>
        </blockquote>
        <p style="text-align: center;"><strong>Hari Raya Waisak</strong></p>
      </div>
      <div style="flex: 1 1 300px; max-width: 400px;">
        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DJLWLjqThxn/?igsh=MXd5MDN0Y3hmMGJtZQ==" data-instgrm-version="14" style="width:100%; max-width:400px; margin:auto;">
          <a href="https://www.instagram.com/p/DJLWLjqThxn/?igsh=MXd5MDN0Y3hmMGJtZQ==">Lihat di Instagram</a>
        </blockquote>
        <p style="text-align: center;"><strong>Hari Pendidikan Nasional</strong></p>
      </div>
      <div style="flex: 1 1 300px; max-width: 400px;">
        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DIz_T3lz_D6/?igsh=eXF4ZGg1Nmt2ZmY5" data-instgrm-version="14" style="width:100%; max-width:400px; margin:auto;">
          <a href="">Lihat di Instagram</a>
        </blockquote>
        <p style="text-align: center;"><strong>Hari Kartini</strong></p>
      </div>
  </div>
  <div style="text-align: center; margin-top: 40px;">
    <a href="https://www.instagram.com/smppadmajaya_plg?igsh=MWFkbTFyeDJteXRqaA==/" target="_blank" style="background-color: #d90429; color: white; padding: 10px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">
      Selengkapnya →
    </a>
  </div>
  <section id="mitra-section" style="background-color: #f8fafc; padding: 60px 20px;">
    <div style="text-align: center; margin-bottom: 30px;">
      <h2 style="margin-bottom: 5px;">Mitra Kerjasama</h2>
      <div style="color: red; font-size: 2rem;">●●─</div>
      <p>SMP Padmajaya Palembang</p>
    </div>
  
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; max-width: 1200px; margin: auto;">
      <div class="mitra-box animate-left">
        <img src="{{ asset('images/logoMitra1.png') }}" alt="JakKonek">
      </div>
      <div class="mitra-box animate-right">
        <img src="{{ asset('images/logoMitra2.png') }}" alt="Kemendikbud">
      </div>
      <div class="mitra-box animate-left">
        <img src="{{ asset('images/logoMitra3.png') }}" alt="PPDB">
      </div>
      <div class="mitra-box animate-right">
        <img src="{{ asset('images/logoMitra4.png') }}" alt="DKI Jakarta">
      </div>
    </div>
  </section>
  
  
</section>

<!-- Script Carousel dan Animasi -->
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

  setInterval(nextSlide, 5000);

  function animateSambutan() {
    const kiri = document.querySelector('.sambutan-kiri');
    const kanan = document.querySelector('.sambutan-kanan');
    const trigger = window.innerHeight * 0.9;
    if (kiri.getBoundingClientRect().top < trigger) kiri.classList.add('animate-left');
    if (kanan.getBoundingClientRect().top < trigger) kanan.classList.add('animate-right');
  }

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
            counter.innerText = target;
          }
        };
        update();
      }
    });
  }

  function animateDigitalSection() {
    const cards = document.querySelectorAll('.digital-card');
    const trigger = window.innerHeight * 0.9;
    cards.forEach(card => {
      const rect = card.getBoundingClientRect();
      if (rect.top < trigger && !card.classList.contains('animate')) {
        card.classList.add('animate');
      }
    });
  }

  window.addEventListener('scroll', () => {
    animateSambutan();
    animateCounters();
    animateDigitalSection();
  });

  window.addEventListener('load', () => {
    animateSambutan();
    animateCounters();
    animateDigitalSection();
  });

  function animateMitraSection() {
  const boxes = document.querySelectorAll('.mitra-box');
  const trigger = window.innerHeight * 0.9;
  boxes.forEach(box => {
    const rect = box.getBoundingClientRect();
    if (rect.top < trigger && !box.classList.contains('animate')) {
      box.classList.add('animate');
    }
  });
}

window.addEventListener('scroll', () => {
  animateSambutan();
  animateCounters();
  animateDigitalSection();
  animateMitraSection();
});

window.addEventListener('load', () => {
  animateSambutan();
  animateCounters();
  animateDigitalSection();
  animateMitraSection();
});


</script>

<!-- Instagram Embed Script -->
<script async src="//www.instagram.com/embed.js"></script>

</body>
</html>
