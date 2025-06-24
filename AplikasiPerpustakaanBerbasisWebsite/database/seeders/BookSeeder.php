<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::insert([
            [
                'title' => 'Filo Sofie Bara Embun',
                'author' => 'AZ',
                'category' => 'Buku Bacaan',
                'publisher' => ' Grasindo',
                'description' => '“Seniman kalo gak kere ya gila,” kata Romo pada Embun. Berbicara topi seniman. Berbau omnibus. Politik mewabah ke persahabatan, zaman now dihadapi. Cinta platonic dianggap ancaman. Manifesto kesetiaan menunggu. Jakarta jadi ikrar. Semua jadi satu. Beginilah hidup. Bukan ndumel. Capture manusia di momen ini. Inilah ceritanya. Ditutur dengan menertawai zaman. Tidak ada tendensi dogma yang membawa kebenaran. Ketika BARA bertemu EMBUN. ALFA bertemu BETA. TIMUR bertemu FILO, SOFIE.',
                'cover' => 'buku1.jpg'
            ],
            [
                'title' => 'GOLDEN Jessi Kirby',
                'author' => ' Jessi Kirby',
                'category' => ' Buku Bacaan',
                'publisher' => ' Spring',
                'description' => 'Silahkan datangi perpustakaan SMP PADMAJAYA PALEMBANG untuk membaca bukunya”.',
                'cover' => 'buku2.jpeg'
            ],
            [
                'title' => 'Merajut Kekuatan dari Pengalaman Perempuan',
                'author' => '-',
                'category' => ' Buku Bacaan',
                'publisher' => ' Yayasan Humanis dan Inovasi Sosial',
                'description' => 'Silahkan datangi perpustakaan SMP PADMAJAYA PALEMBANG untuk membaca bukunya',
                'cover' => 'buku3.jpg'
            ],
            [
                'title' => 'Panduan Guru Ilmu Pengetahuan Sosial untuk SMP/MTS',
                'author' => ' Sari Oktafiana, Efvinggo Fasya Jaya, M. Rizky Satria',
                'category' => ' IPS',
                'publisher' => ' Pusat Kurikulum dan Perbukuan',
                'description'=> '-',
                'cover' => 'buku4.jpeg'
            ],
            [
                'title' => 'Panduan Guru Ilmu Pengetahuan Alam untuk SMP/MTS',
                'author' => ' Niken Resminingpuri Krisdianti, Ayuk Ratna Puspaningsih, Elizabeth Tjahjadarmawan',
                'category' => 'MIPA',
                'publisher' => 'Pusat Kurikulum dan Perbukuan',
                'description' => 'Buku ini disiapkan oleh Pemerintah dalam rangka pemenuhan kebutuhan buku pendidikan yang bermutu, murah, dan merata sesuai dengan amanat dalam UU No. 3 Tahun 2017. Buku ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi. Buku ini merupakan dokumen hidup yang senantiasa diperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan zaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis atau melalui alamat surel buku@kemdikbud.go.id diharapkan dapat meningkatkan kualitas buku ini.',
                'cover' => 'buku5.jpg'
            ],
            [
                'title' => 'Panduan Guru Bahasa Indonesia untuk SMP/MTS',
                'author' => 'Sefi Indra Gumilar, Fadillah Tri Aulia, Alvian Kurniawan',
                'category' => ' IPS',
                'publisher' => ' Pusat Kurikulum dan Perbukuan',
                'description' => 'Buku ini disiapkan oleh Pemerintah dalam rangka pemenuhan kebutuhan buku pendidikan yang bermutu, murah, dan merata sesuai dengan amanat dalam UU No. 3 Tahun 2017. Buku ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi. Buku ini merupakan dokumen hidup yang senantiasa diperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan zaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis atau melalui alamat surel buku@kemdikbud. go.id diharapkan dapat meningkatkan kualitas buku ini',
                'cover' => 'buku6.jpeg'
            ],
            [
                'title' => 'Pendidikan Pancasila untuk SMP/MTS',
                'author' => 'Sri Cahyati, Siti Nurjanah, Ali Usman',
                'category' => ' IPS',
                'publisher' => ' Pusat Perbukuan',
                'description' => 'Buku ini disiapkan oleh Pemerintah dalam rangka pemenuhan kebutuhan buku pendidikan yang bermutu, murah, dan merata sesuai dengan amanat dalam UU No. 3 Tahun 2017. Buku ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi serta Badan Pembinaan Ideologi Pancasila. Buku ini merupakan dokumen hidup yang senantiasa diperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan zaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis atau melalui alamat surel buku@kemdikbud.go.id diharapkan dapat meningkatkan kualitas buku ini',
                'cover' => 'buku7.jpeg'
            ],
            [
                'title' => 'Bahasa Inggris untuk SMP/MTS',
                'author' => ' Budi Hermawan, Dwi Haryanti, Nining Suryaningsih',
                'category' => ' MIPA',
                'publisher' => ' Pusat Perbukuan',
                'description' => 'Disclaimer: Buku ini disiapkan oleh Pemerintah dalam rangka pemenuhan kebutuhan buku pendidikan yang bermutu, murah, dan merata sesuai dengan amanat dalam UU No. 3 Tahun 2017. Buku ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi. Buku ini merupakan dokumen hidup yang senantiasa diperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan zaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis atau melalui alamat surel buku@kemdikbud.go.id diharapkan dapat meningkatkan kualitas buku ini.',
                'cover' => 'buku8.jpeg'
            ],
            
        ]);
    }
}
