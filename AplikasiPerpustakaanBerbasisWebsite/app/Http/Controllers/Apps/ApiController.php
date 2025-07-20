<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class ApiController extends Controller
{
    public function apiCreate(Request $request)
    {
        $user = Auth::user();

        $apiUser = Api::where('user_id', $user->id)->first();
        if (!$apiUser) {
            $apiUser = Api::create([
                'user_id' => $user->id,
                'client_id' => Str::random(32)
            ]);
        } else {
            return redirect()->back()->with('error', 'Anda sudah memiliki API buku.');
        }

        return redirect()->back()->with('success', 'API Buku berhasil dibuat!');
    }

    public function api($client_id)
    {
        $apiUser = Api::where('client_id', $client_id)->first();

        if (!$apiUser) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'API tidak valid atau tidak tersedia.',
                ],
                404
            );
        }

        try {
            $books = Book::all();
            if ($books->isEmpty()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Tidak ada buku yang ditemukan.',
                    'data' => []
                ], 200);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Data buku berhasil diambil',
                'client_id' => $apiUser->client_id,
                'total_books' => $books->count(),
                'user' => [
                    'id' => $apiUser->user_id,
                    'email' => $apiUser->user->email,
                    'name' => $apiUser->user->name,
                    'role' => $apiUser->user->role,
                ],
                'data' => [
                    'books' => $books,
                ],
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data buku: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function apiDelete(Request $request)
    {
        $user = Auth::user();
        $apiUser = Api::where('user_id', $user->id)->first();

        if ($apiUser) {
            $apiUser->delete();
            return redirect()->back()->with('success', 'API Anda berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus API, tidak ditemukan.');
    }
}
