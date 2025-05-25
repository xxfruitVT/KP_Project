@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Tab Utama --}}
    <ul class="nav nav-tabs" id="mainTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#beranda" role="tab">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#profil" role="tab">Profil</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#menuutama" role="tab">Menu Utama</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#eperpus" role="tab">E-Perpus</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#ppid" role="tab">PPID</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#berita" role="tab">Berita & Artikel</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#jakonek" role="tab">Jak Konek</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#alumni" role="tab">Ikatan Alumni</a></li>
    </ul>

    <div class="tab-content pt-4">
        <div class="tab-pane fade show active" id="beranda">
            <h3>Beranda</h3>
        </div>

        {{-- Profil Tab --}}
        <div class="tab-pane fade" id="profil">
            <ul class="nav nav-pills mb-3" id="profilTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#sejarah">Sejarah</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#visi">Visi & Misi</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#struktur">Struktur</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#pendidik">Tenaga Pendidik</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#akademik">Akademik</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="sejarah">Isi Sejarah</div>
                <div class="tab-pane fade" id="visi">Isi Visi & Misi</div>
                <div class="tab-pane fade" id="struktur">Isi Struktur</div>
                <div class="tab-pane fade" id="pendidik">Isi Tenaga Pendidik</div>
                <div class="tab-pane fade" id="akademik">Isi Akademik</div>
            </div>
        </div>

        {{-- Menu Utama Tab --}}
        <div class="tab-pane fade" id="menuutama">
            <ul class="nav nav-pills mb-3" id="menuutamaTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#galeri">Photo Galeri</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#partnership">Partnership</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#elearning">E-Learning</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#ptn">PTN/PTS</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#evoting">E-Voting</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="galeri">Isi Photo Galeri</div>
                <div class="tab-pane fade" id="partnership">Isi Partnership</div>
                <div class="tab-pane fade" id="elearning">Isi E-Learning</div>
                <div class="tab-pane fade" id="ptn">Isi PTN/PTS</div>
                <div class="tab-pane fade" id="evoting">Isi E-Voting</div>
            </div>
        </div>

        {{-- Tab Lainnya --}}
        <div class="tab-pane fade" id="eperpus">Konten E-Perpus</div>
        <div class="tab-pane fade" id="ppid">Konten PPID</div>
        <div class="tab-pane fade" id="berita">Konten Berita & Artikel</div>
        <div class="tab-pane fade" id="jakonek">Konten Jak Konek</div>
        <div class="tab-pane fade" id="alumni">Konten Ikatan Alumni</div>
    </div>
</div>
@endsection
