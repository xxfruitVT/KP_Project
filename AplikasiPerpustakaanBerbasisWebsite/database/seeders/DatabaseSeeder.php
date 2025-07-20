<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chatbot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123'),
        ]);

        Chatbot::factory()->create([
            'name' => 'Chatbot',
            'message' => 'Halo, saya chatbot. Apa yang bisa saya bantu?',
            'prohibition' => 'Tolong ditolak.',
            'api_gemini' => 'AIzaSyADkgtJIATre2sw2OEms-IJq7ukjco1PYA'
        ]);
    }
}
