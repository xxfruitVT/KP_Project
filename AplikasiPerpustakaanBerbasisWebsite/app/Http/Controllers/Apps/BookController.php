<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Models\HistoryBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request) {
        $user  = auth()->user();
        $genres = Genre::all();
        $cari = $request->search;
        if  ($cari) {
            $book =  Book::where('title', 'like', '%' . $cari . '%')->orWhere('author', 'like', '%' . $cari . '%')->orderBy('updated_at', 'desc')->paginate(10);
            return view('apps.book.index', [
                'user' => $user,
                'books' => $book,
                'genres' => $genres
            ]);
        }
        $query = Book::query();
        if ($request->filled('genre')) {
            $query->where('genre_id', $request->genre);
            $books = $query->with('genre')->paginate(10);
            return view('apps.book.index', [
                'user' => $user,
                'books' => $books,
                'genres' => $genres
            ]);
        }

        $books = Book::orderBy('updated_at', 'desc')->paginate(10);

        return view('apps.book.index', [
            'user' => $user,
            'books' => $books,
            'genres' => $genres
        ]);
    }

    public function create() {
        $user   = auth()->user();
        $genres = Genre::all();
        return view('apps.book.create',
            [
                'user' => $user,
                'genres' => $genres
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'book_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul harus diisi',
            'author.required' => 'Penulis harus diisi',
            'genre.required' => 'Genre harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'status.required' => 'Status harus diisi',
            'book_image.required' => 'Gambar harus diisi',
            'book_image.image' => 'File harus berupa gambar',
            'book_image.mimes' => 'File harus berekstensi jpeg, png, jpg, gif',
            'book_image.max' => 'File tidak boleh lebih dari 2MB',
        ]);

        try {
            $book = new Book();
            $book->title = $request->title;
            $book->author = $request->author;
            $book->genre_id = $request->genre;
            $book->description = $request->description;
            $book->status = $request->status;
            $book->book_image = $request->file('book_image')->store('books', 'public');
            $book->save();

            return redirect()->route('buku.index')->with('success', "Buku {$book->title} berhasil ditambahkan!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan buku: ' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $user   = auth()->user();
        $book   = Book::findOrFail($id);
        $genres = Genre::all();
        return view('apps.book.edit',
            [
                'user' => $user,
                'book' => $book,
                'genres' => $genres
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|exists:genres,id',
            'description' => 'required|string',
            'status' => 'required|string',
            'book_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $book = Book::findOrFail($id);
            $book->title = $request->title;
            $book->author = $request->author;
            $book->genre_id = $request->genre;
            $book->description = $request->description;
            $book->status = $request->status;

            if ($request->hasFile('book_image')) {
                $book->book_image = $request->file('book_image')->store('books', 'public');
            }

            $book->save();
            return redirect()->route('buku.index')->with('success', "Buku {$book->title} berhasil diperbarui!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui buku: ' . $th->getMessage());
        }
    }

    public function borrow(Request $request, $id)
    {
        $user = auth()->user();
        $book = Book::findOrFail($id);

        if ($book->status === 'Akan Hadir') {
            return redirect()->back()->with('error', "Buku {$book->title} akan segera hadir.");
        }

        if ($book->status !== 'Tersedia') {
            return redirect()->back()->with('error', "Buku {$book->title} ini tidak tersedia untuk dipinjam.");
        }

        if (!$request->return_date) {
            return redirect()->back()->with('error', 'Pengembalian buku wajib diisi.');
        }

        $twoWeeksFromNow = Carbon::now()->addWeeks(2);

        if (Carbon::parse($request->return_date)->gt($twoWeeksFromNow)) {
            return redirect()->back()->with('error', "Pengembalian buku tidak boleh melebihi 2 pekan dari hari ini.");
        }

        HistoryBook::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'return' => $request->return_date,
            'status' => 'Proses',
        ]);

        $book->user_id = $user->id;
        $book->status = 'Proses';
        $book->save();

        return redirect()->back()->with('success', "Buku {$book->title} berhasil dipinjam.");
    }

    public function approve($id)
    {
        $book = Book::findOrFail($id);
        if ($book->status !== 'Proses') {
            return redirect()->back()->with('error', 'Status buku tidak dalam proses peminjaman.');
        }

        $history = HistoryBook::where('book_id', $id)->latest()->first();


        if ($history) {
            $history->status = 'Dipinjam';
            $history->save();
        }

        $book->status = 'Dipinjam';
        $book->save();

        return redirect()->back()->with('success', "Peminjaman buku {$book->title} disetujui.");
    }

    public function reject($id)
    {
        $book = Book::findOrFail($id);

        if ($book->status !== 'Proses') {
            return redirect()->back()->with('error', 'Status buku tidak dalam proses peminjaman.');
        }

        $history = HistoryBook::where('book_id', $id)->latest()->first();

        if ($history) {
            $history->update([
                'status' => 'Ditolak',
                'reminder_message' => "Peminjaman buku {$book->title} ditolak. Silakan mencoba lagi lain waktu.",
            ]);
        }

        $book->status = 'Tersedia';
        $book->user_id = null;
        $book->save();

        return redirect()->back()->with('success', "Peminjaman buku {$book->title} ditolak.");
    }

    public function return($id)
    {
        $book = Book::findOrFail($id);

        $history = HistoryBook::where('book_id', $id)->latest()->first();

        if ($history) {
            $history->update([
                'status' => 'Dikembalikan',
                'reminder_message' => "Terimakasih telah mengembalikan buku {$book->title}. Kami berharap Anda menikmati membaca dan menantikan kunjungan Anda berikutnya!",
                'updated_at' => now()
            ]);
        }

        $book->status = 'Tersedia';
        $book->user_id = null;
        $book->save();

        return redirect()->back()->with('success', "Buku {$book->title} berhasil dikembalikan.");
    }

    public function sendReminder(Request $request, $id)
    {
        // dd($request->all());
        if (!$request->has('reminderMessage')) {
            return redirect()->back()->with('error', 'Mohon isi form reminder.');
        }

        if (!$request->has('history_id')) {
            return redirect()->back()->with('error', 'Pengguna tidak memiliki riwayat peminjaman.');
        }

        $history = HistoryBook::where('id', $request->history_id)->first();

        if ($history) {
            $history->reminder_message = $request->reminderMessage;
            $history->save();
        } else {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

        // Logika untuk mengirimkan pengingat bisa ditambahkan di sini
        // Misalnya, mengirim email atau notifikasi
        return redirect()->back()->with('success', 'Peringatan telah dikirim kepada pengguna.');
    }


    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
            if ($book->book_image) {
                Storage::disk('public')->delete($book->book_image);
            }
            $book->delete();
            return redirect()->back()->with('success', 'Buku berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus buku: ' . $e->getMessage()], 500);
        }
    }

}
