<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            $title = "Judul Akademik ke-$i";
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'body' => "<p>Ini adalah isi konten akademik ke-$i. Kontennya bisa panjang dan mendetail sesuai kebutuhan akademik sekolah.</p>",
                'kategori' => 'akademik',
            ]);
        }
    }
}
