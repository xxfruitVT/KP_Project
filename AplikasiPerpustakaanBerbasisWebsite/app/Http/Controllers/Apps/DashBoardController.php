<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function logout() {
        auth()->logout();

        return redirect()->route('login')->with('success', 'Anda berhasil keluar');
    }

    public function index() {
        $user = auth()->user();
        $books = Book::with('genre', 'user', 'history')->get();
        $genres = Genre::all();

        return view('apps.dashboard.index',
            [
                'user' => $user,
                'books' => $books,
                'genres' => $genres
            ]);
    }

    public function profile() {
        $user = auth()->user();
        $genres = Genre::all();

        $userApi = Api::where('user_id', $user->id)->first();

        return view('apps.dashboard.profile', compact('user',  'genres', 'userApi'));
    }

    public function updateAvatar(Request $request) {

        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'avatar.required' => 'Avatar wajib diisi',
                'avatar.image' => 'Avatar harus berupa gambar',
                'avatar.mimes' => 'Avatar harus berekstensi jpeg, png, jpg, gif',
                'avatar.max' => 'Avatar tidak boleh lebih dari 2MB',
            ]);

            $user = Auth::user();

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = $request->file('avatar')->store('avatars', 'public');
            $user->save();

            return redirect()->back()->with('success', 'Avatar berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui avatar: ' . $th->getMessage());;
        }
    }

    public function updateProfile(Request $request) {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            ], [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah digunakan oleh pengguna lain',
            ]);

            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . $th->getMessage());;
        }
    }

    public function deleteAccount(Request $request)
    {
        $user = auth()->user();

        try {
            $user->delete();

            return redirect()->route('login')->with('success', 'Akun Anda berhasil dihapus.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus akun: ' . $e->getMessage());
        }
    }

}
