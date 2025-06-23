<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;

class SarprasPostSeeder extends Seeder
{
    public function run(): void
    {
        $post = Post::create([
            'title' => 'Fasilitas Sekolah SMP Padmajaya',
            'slug' => Str::slug('Fasilitas Sekolah SMP Padmajaya'),
            'kategori' => 'sarpras',
            'body' => '
                <p>SMP Padmajaya Palembang memiliki berbagai fasilitas unggulan untuk mendukung proses belajar mengajar:</p>
                <ul>
                    <li>Ruang Kelas representatif dan nyaman</li>
                    <li>Laboratorium Komputer dan IPA lengkap</li>
                    <li>Perpustakaan dengan koleksi buku pendidikan dan bacaan</li>
                    <li>Lapangan olahraga multifungsi: voli, basket, futsal</li>
                    <li>Gedung Aula serbaguna</li>
                    <li>Area parkir luas untuk motor dan mobil</li>
                    <li>Jaringan Wifi dan Hotspot di seluruh area sekolah</li>
                    <li>Toilet yang bersih dan terawat</li>
                    <li>Ruang kegiatan siswa: OSIS, UKS, kantin</li>
                </ul>
            ',
        ]);
    }
}
