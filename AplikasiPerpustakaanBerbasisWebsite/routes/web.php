<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login routes
Route::get('/login/admin', function () {
    return 'Halaman Login Admin';
})->name('login.admin');
Route::get('/login/student', function () {
    return 'Halaman Login Siswa';
})->name('login.student');
Route::get('/register', function () {
    return 'Halaman Registrasi';
})->name('register');
// Route login default (optional)
Route::get('/login', function () {
    return redirect()->route('login.student');
})->name('login');

Route::get('/', function () {
    return view('layouts.app');
});
