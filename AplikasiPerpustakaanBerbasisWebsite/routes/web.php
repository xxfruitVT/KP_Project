<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Apps\ApiController;
use App\Http\Controllers\Apps\BookController;
use App\Http\Controllers\Apps\DashboardController;
use App\Http\Controllers\Apps\GenreController;
use App\Http\Controllers\Apps\HistoryBookController;
use App\Http\Controllers\Apps\ChatbotController;
use App\Http\Controllers\Apps\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Halaman utama (beranda sekolah)
Route::get('/', [PostController::class, 'home'])->name('home.index');

// ✅ Halaman E-Perpus
Route::get('/eperpus', [HomeController::class, 'index'])->name('eperpus.index');

// ✅ Login, Register, dan Google OAuth
Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::post('/auth/register/submit', [AuthController::class, 'registerSubmit'])->name('register.submit');
Route::get('/auth/logout', [DashboardController::class, 'logout'])->name('logout');

// ✅ Login dengan Google
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// ✅ API
Route::get('/books/api/{client_id}', [ApiController::class, 'api'])->name('buku.api');

// ✅ Halaman Akademik
Route::get('/akademik/{slug}', [PostController::class, 'showAkademik'])->name('akademik.show');

// ✅ Halaman Profil
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');

// ✅ Halaman Kesiswaan & Sarpras
Route::get('/kesiswaan', [PostController::class, 'kesiswaan'])->name('kesiswaan.index');
Route::get('/kesiswaan/{slug}', [PostController::class, 'showKesiswaan'])->name('kesiswaan.show');

Route::get('/sarpras', [PostController::class, 'sarpras'])->name('sarpras.index');
Route::get('/sarpras/{slug}', [PostController::class, 'showSarpras'])->name('sarpras.show');

// ✅ Halaman Aplikasi Admin (dengan auth middleware)
Route::group(['prefix' => 'apps', 'middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/apps/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Profile pengguna
    Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::put('/profile/avatar/update', [DashboardController::class, 'updateAvatar'])->name('dashboard.profile.avatar.update');
    Route::put('/profile/update', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
    Route::post('/account/delete', [DashboardController::class, 'deleteAccount'])->name('account.delete');

    // Buku
    Route::get('/books', [BookController::class, 'index'])->name('buku.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('buku.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('buku.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('buku.edit');
    Route::put('/books/{id}/update', [BookController::class, 'update'])->name('buku.update');
    Route::delete('/books/{id}/destroy', [BookController::class, 'destroy'])->name('buku.destroy');
    Route::post('/books/{id}/approve', [BookController::class, 'approve'])->name('buku.approve');
    Route::post('/books/{id}/reject', [BookController::class, 'reject'])->name('buku.reject');
    Route::post('/books/{id}/return', [BookController::class, 'return'])->name('buku.return');
    Route::post('/books/{id}/borrow', [BookController::class, 'borrow'])->name('buku.pinjam');
    Route::get('/books/history', [HistoryBookController::class, 'index'])->name('buku.history');

    // API Buku untuk admin
    Route::post('/books/api/create', [ApiController::class, 'apiCreate'])->name('buku.api.create');
    Route::post('/books/api/delete', [ApiController::class, 'apiDelete'])->name('buku.api.delete');

    // Reminder pinjam
    Route::post('/buku/{id}/send-reminder', [BookController::class, 'sendReminder'])->name('buku.send.reminder');

    // Genre
    Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
    Route::post('/genre/store', [GenreController::class, 'store'])->name('genre.store');
    Route::delete('/genre/destroy/{id}', [GenreController::class, 'destroy'])->name('genre.destroy');

    // Data Pengunjung
    Route::get('/data-pengunjung', [VisitorController::class, 'index'])->name('visitor.index');
    Route::delete('/data-pengunjung/{id}/users/delete', [VisitorController::class, 'usersDelete'])->name('users.destroy');
    Route::get('/data-pengunjung/{id}/users/edit', [VisitorController::class, 'usersEdit'])->name('users.edit');
    Route::put('/data-pengunjung/{id}/users/update', [VisitorController::class, 'usersUpdate'])->name('users.update');
    Route::put('/data-pengunjung/{id}/users/avatar/update', [VisitorController::class, 'updateAvatarVisitor'])->name('users.avatar.update');

    // Chatbot
    Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
    Route::put('/chatbot/update', [ChatbotController::class, 'update'])->name('chatbot.update');

    // Storage Link (untuk simpanan publik)
    Route::get('/storage-link', function () {
        $targetFolder = base_path() . '/storage/app/public';
        $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';

        if (!file_exists($linkFolder)) {
            symlink($targetFolder, $linkFolder);
            return redirect()->back()->with('success', 'Penyimpanan di server sudah diaktifkan!');
        } else {
            return redirect()->back()->with('error', 'Penyimpanan di server telah tersedia!');
        }
    })->name('storage-link');
});
