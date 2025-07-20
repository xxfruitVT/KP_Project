<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Models\HistoryBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mostBorrowedBooks = HistoryBook::with('book')
            ->select('book_id', \DB::raw('count(*) as total'))
            ->groupBy('book_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        $mostFrequentUsers = HistoryBook::with('user')
            ->select('user_id', \DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        $totalBooks = Book::count();
        $totalGenres = Genre::count();
        $totalUsers = User::count();

        $users = User::where('id', '!=', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('apps.visitor.index', compact(
            'mostBorrowedBooks',
            'mostFrequentUsers',
            'totalBooks',
            'totalGenres',
            'totalUsers',
            'users',
            'user'
        ));
    }

    public function usersEdit($id)
    {
        $user = auth()->user();
        $visitorAccount = User::findOrFail($id);
        return view('apps.visitor.edit', compact('visitorAccount', 'user'));
    }

    public function updateAvatarVisitor(Request $request, $id)
    {

        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'avatar.required' => 'Avatar wajib diisi',
                'avatar.image' => 'Avatar harus berupa gambar',
                'avatar.mimes' => 'Avatar harus berekstensi jpeg, png, jpg, gif',
                'avatar.max' => 'Avatar tidak boleh lebih dari 2MB',
            ]);

            $user = User::findOrFail($id);

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

    public function usersUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required|string',
            ], [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak valid',
                'role.required' => 'Role wajib diisi',
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();

            return redirect()->route('visitor.index')->with('success', "Profil {$user->name} berhasil diperbarui");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . $th->getMessage());;
        }
    }

    public function usersDelete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('visitor.index')->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pengguna: ' . $e->getMessage());
        }
    }
}
