<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PostController;

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

// E-Perpus (static view)
Route::get('/eperpus', function () {
    return view('tabs.eperpus');
})->name('eperpus');

