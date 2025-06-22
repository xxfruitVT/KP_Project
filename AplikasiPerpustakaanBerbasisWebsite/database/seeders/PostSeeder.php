<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'REKAP PESERTA DIDIK LULUS PTN, PTS DAN PTK',
                'excerpt' => 'Berikut kami informasikan peserta didik SMAN 78 yang lulus...',
                'slug' => 'rekap-lulus-ptn-pts-ptk',
                'content' => 'Isi lengkap pengumuman ini...'
            ],
            [
                'title' => 'INFORMASI SISTEM PENERIMAAN MURID BARU 2025',
                'excerpt' => 'Berikut kami sampaikan informasi seputar penerimaan...',
                'slug' => 'informasi-sistem-2025',
                'content' => '<img src="/images/poster-penerimaan.jpg" style="max-width:100%"><br>Informasi detail...'
            ],
        ];

        foreach ($data as $item) {
            Post::create($item);
        }
    }
}

