<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('layouts.app');
});



Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');


Route::get('/arsip', [PostController::class, 'index'])->name('posts.index');
Route::get('/arsip/{slug}', [PostController::class, 'show'])->name('posts.show');



Route::get('/tes-akademik', function () {
    return view('tabs.profil.akademik');
});



