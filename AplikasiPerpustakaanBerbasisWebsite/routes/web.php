<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('layouts.app');
});



Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');




