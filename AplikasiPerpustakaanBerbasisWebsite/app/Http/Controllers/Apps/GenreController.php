<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $user  = auth()->user();

        $genres = Genre::all();
        return view('apps.genre.index', [
            'user' => $user,
            'genres' => $genres,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
        ]);

        Genre::create($request->only('name'));

        return redirect()->back()->with('success', 'Genre berhasil dibuat.');
    }

    public function destroy($id)
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->delete();
            return redirect()->back()->with('success', 'Genre berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus genre: ' . $e->getMessage()], 500);
        }
    }
}
