<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;

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





