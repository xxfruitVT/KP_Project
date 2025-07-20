<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chatbot;

class ChatbotController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $chatbot = Chatbot::first();
        return view('apps.chatbot.index', compact('user', 'chatbot'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'prohibition' => 'required',
            'api_gemini' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi',
            'message.required' => 'Pesan wajib diisi',
            'prohibition.required' => 'Prohibisi wajib diisi',
            'api_gemini.required' => 'API Key wajib diisi'
        ]);

        try {
            $chatbot = Chatbot::updateOrCreate([], [
                'name' => $request->name,
                'message' => $request->message,
                'prohibition' => $request->prohibition,
                'api_gemini' => $request->api_gemini
            ]);

            return redirect()->back()->with('success', 'Chatbot berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengupdate chatbot! ' . $e->getMessage());
        }
    }

}
