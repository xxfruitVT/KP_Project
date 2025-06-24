<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama akan menampilkan tab dengan data akademik
Route::get('/', [PostController::class, 'home'])->name('akademik.index');

// Route untuk menampilkan detail artikel akademik
Route::get('/akademik/{slug}', [PostController::class, 'showAkademik'])->name('akademik.show');

// Route tambahan
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');

// // E-Perpus (static view)
// Route::get('/eperpus', function () {
//     return view('tabs.eperpus');
// })->name('eperpus');
// Hanya satu route untuk eperpus
Route::get('/eperpus', [BookController::class, 'index'])->name('eperpus');

// Untuk detail buku
Route::get('/eperpus', [BookController::class, 'index'])->name('eperpus');
Route::get('/eperpus/{id}', [BookController::class, 'show'])->name('eperpus.detail');




Route::get('/kesiswaan', [PostController::class, 'kesiswaan'])->name('kesiswaan.index');
Route::get('/sarpras', [PostController::class, 'sarpras'])->name('sarpras.index');

Route::get('/kesiswaan/{slug}', [PostController::class, 'showKesiswaan'])->name('kesiswaan.show');
Route::get('/sarpras/{slug}', [PostController::class, 'showSarpras'])->name('sarpras.show');



// Login & Register
Route::get('/login/{role?}', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Role
Route::get('/admin/dashboard', fn() => view('dashboard.admin'))->middleware('auth')->name('admin.dashboard');
Route::get('/siswa/dashboard', fn() => view('dashboard.siswa'))->middleware('auth')->name('siswa.dashboard');

Route::get('/eperpus/{id}', [BookController::class, 'show'])->name('buku.detail');




