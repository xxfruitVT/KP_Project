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
                'title' => 'Prestasi Siswa di Olimpiade Sains',
                'body' => '<p>Siswa SMP Padmadjaya meraih medali emas di ajang OSN tingkat provinsi.</p>',
                'image' => '',
            ],
            [
                'title' => 'Perubahan Jadwal Ekstrakurikuler',
                'body' => '<p>Pramuka kini pindah jadwal ke hari Jumat sore mulai minggu depan.</p>',
                'image' => '',
            ],
            [
                'title' => 'Jadwal Libur Sekolah Semester Ganjil',
                'body' => '<p>Libur semester ganjil dimulai tanggal 10 Juli hingga 24 Juli 2025.</p>',
                'image' => '',
            ],
            [
                'title' => 'Sosialisasi PPDB Tahun Ajaran Baru',
                'body' => '<p>Sosialisasi PPDB akan dilaksanakan secara daring melalui Zoom hari Senin.</p>',
                'image' => '',
            ],
            [
                'title' => 'Lomba Literasi Digital untuk Siswa',
                'body' => '<p>Daftarkan diri Anda untuk ikut lomba literasi digital hingga tanggal 5 Juli.</p>',
                'image' => '',
            ],
            [
                'title' => 'Pelatihan Guru: Kurikulum Merdeka',
                'body' => '<p>Guru diwajibkan mengikuti pelatihan Kurikulum Merdeka secara online.</p>',
                'image' => '',
            ],
            [
                'title' => 'Pentas Seni Akhir Tahun',
                'body' => '<p>Pentas seni akan dilaksanakan di aula sekolah pada tanggal 9 Juli.</p>',
                'image' => '',
            ],
            [
                'title' => 'Informasi Daftar Ulang Siswa Lama',
                'body' => '<p>Siswa kelas 7 dan 8 wajib melakukan daftar ulang antara 1–5 Juli 2025.</p>',
                'image' => '',
            ],
            [
                'title' => 'Kegiatan Jumat Bersih Dimulai Lagi',
                'body' => '<p>Program Jumat Bersih kembali digelar rutin mulai pekan depan.</p>',
                'image' => '',
            ],
            [
                'title' => 'Pelaksanaan Ujian Tengah Semester',
                'body' => '<p>Selamat Menjalankan Ujian Tengah Semester.</p>',
                'image' => 'akademik5.jpg',
            ],
            [
                'title' => 'Pelaksanaan Penilaian Akhir Tahun',
                'body' => '<p>Telah selesai dilaksanakannya penilaian akhir tahun (PAT) kelas VII dan kelas VIII pada hari senin - sabtu tanggal 26-31 Mei 2025.</p>',
                'image' => 'akademik4.jpg',
            ],
            [
                'title' => 'Bhinneka Tunggal Ika P5',
                'body' => '<p>Akhir dari semester II.</p>',
                'image' => 'akademik3.jpg',
            ],
            [
                'title' => 'Pembagian Raport dan Kelulusan Kelas IX',
                'body' => '<p>Selamat atas kelulusan peserta didik SMP Padmajaya kelas IX, semoga ini adalah awal baik menuju kesuksesan, perjuangan belum usai pendidikan harus terus berlanjut, tetaplah bersemangat dan raihlah mimpimu setinggi - tingginya.</p>',
                'image' =>'akademik2.jpg',
            ],
            [
                'title' => 'PPDB SMP Padmajaya Palembang',
                'body' => '<p>Hallo masyarakat kota palembang terkhusus didaerah kecamatan jakabaring kelurahan 9/10 Ulu. plaju....
Kabar gembira buat kalian yang baru lulus Sekolah Dasar masih bingung mau lanjut di sekolah ke mana ? SMP Padmajaya membuka lebar pintu buat kalian.

Disini kalian akan mendapatkan pendidikan dan bimbingan dalam bidang akademik yang berkualitas, minat dan bakat. SMP padmajaya selalu berrusaha sekuat tenaga menyokong kemampuan siswanya di bidang akademik dan non akademik.

Tunggu apa lagi, segera daftarkan diri ke SMP Padmajaya Palembang dengan datang langsung kesekolah atau bisa menghubungi narahubung yang tertera.</p>',
                'image' => 'gambar3.jpg',
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
                    'image' => $post['image'] ?? null,
                    'created_at' => $createdAt,
                    'updated_at' => now(),
                ]
            );
        }
    }
}
