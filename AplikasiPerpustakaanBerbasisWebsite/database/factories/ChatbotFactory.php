<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chatbot>
 */
class ChatbotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Chatbot',
            'message' => 'Halo, saya chatbot. Apa yang bisa saya bantu?',
            'prohibition' => 'Tolong ditolak.',
            'api_gemini' => 'AIzaSyADkgtJIATre2sw2OEms-IJq7ukjco1PYA'
        ];
    }
}
