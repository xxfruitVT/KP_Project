<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->truncate(); // Kosongkan tabel

        $posts = [
            [
                'title' => 'Pengumuman Ujian Akhir Semester',
                'body' => '<p>Ujian akhir semester akan dimulai tanggal 1 Juli 2025. Pastikan semua siswa hadir tepat waktu.</p>',
            ],
            [
                'title' => 'Prestasi Siswa di Olimpiade Sains',
                'body' => '<p>Siswa SMP Padmadjaya meraih medali emas di ajang OSN tingkat provinsi.</p>',
            ],
            [
                'title' => 'Perubahan Jadwal Ekstrakurikuler',
                'body' => '<p>Pramuka kini pindah jadwal ke hari Jumat sore mulai minggu depan.</p>',
            ],
            [
                'title' => 'Jadwal Libur Sekolah Semester Ganjil',
                'body' => '<p>Libur semester ganjil dimulai tanggal 10 Juli hingga 24 Juli 2025.</p>',
            ],
            [
                'title' => 'Sosialisasi PPDB Tahun Ajaran Baru',
                'body' => '<p>Sosialisasi PPDB akan dilaksanakan secara daring melalui Zoom hari Senin.</p>',
            ],
            [
                'title' => 'Lomba Literasi Digital untuk Siswa',
                'body' => '<p>Daftarkan diri Anda untuk ikut lomba literasi digital hingga tanggal 5 Juli.</p>',
            ],
            [
                'title' => 'Pelatihan Guru: Kurikulum Merdeka',
                'body' => '<p>Guru diwajibkan mengikuti pelatihan Kurikulum Merdeka secara online.</p>',
            ],
            [
                'title' => 'Pentas Seni Akhir Tahun',
                'body' => '<p>Pentas seni akan dilaksanakan di aula sekolah pada tanggal 9 Juli.</p>',
            ],
            [
                'title' => 'Informasi Daftar Ulang Siswa Lama',
                'body' => '<p>Siswa kelas 7 dan 8 wajib melakukan daftar ulang antara 1–5 Juli 2025.</p>',
            ],
            [
                'title' => 'Kegiatan Jumat Bersih Dimulai Lagi',
                'body' => '<p>Program Jumat Bersih kembali digelar rutin mulai pekan depan.</p>',
            ],
            [
                'title' => 'Bimbingan Konseling untuk Kelas 9',
                'body' => '<p>BK akan mengadakan sesi perencanaan karier bagi siswa kelas 9.</p>',
            ],
            [
                'title' => 'Persiapan Try Out Nasional',
                'body' => '<p>Simulasi Try Out akan dilaksanakan pada minggu kedua bulan Juli.</p>',
            ],
            [
                'title' => 'Penggunaan Seragam Baru',
                'body' => '<p>Mulai tahun ajaran baru, seragam olahraga akan diganti dengan model baru.</p>',
            ],
            [
                'title' => 'Pemilihan Ketua OSIS Baru',
                'body' => '<p>Pemungutan suara OSIS akan dilakukan secara online.</p>',
            ],
            [
                'title' => 'Workshop Jurnalistik untuk Siswa',
                'body' => '<p>Workshop menulis berita dan fotografi terbuka untuk semua siswa.</p>',
            ],
        ];

        foreach ($posts as $index => $post) {
            $slug = Str::slug($post['title']);
            $createdAt = Carbon::now()->subDays(count($posts) - $index - 1); // Mundur harinya

            Post::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $post['title'],
                    'slug' => $slug,
                    'body' => $post['body'],
                    'kategori' => 'akademik',
                    'created_at' => $createdAt,
                    'updated_at' => now(),
                ]
            );
        }
    }
}
