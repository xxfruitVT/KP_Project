<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;

class KesiswaanPostSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'Lomba Pramuka Tingkat Kota',
                'body' => '<p>SMP Padmajaya Palembang berhasil meraih juara 1 dalam lomba pramuka tingkat kota yang diadakan pada bulan Juni.</p>',
            ],
            [
                'title' => 'Kegiatan Peringatan Hari Guru',
                'body' => '<p>Dalam rangka Hari Guru Nasional, siswa SMP Padmajaya mengadakan pentas seni dan penghargaan untuk para guru.</p>',
            ],
            [
                'title' => 'Pelatihan Kepemimpinan OSIS',
                'body' => '<p>Pengurus OSIS mengikuti pelatihan kepemimpinan di luar sekolah guna membangun semangat tanggung jawab dan kolaborasi.</p>',
            ],
        ];

        foreach ($data as $item) {
            Post::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'body' => $item['body'],
                'kategori' => 'kesiswaan',
            ]);
        }
    }
}
