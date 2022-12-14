<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuruController,
    KelasController,
    MapelController,
    SiswaController,
    AuthController
};

Route::get('/', function () {
    return view('layout.app');
});

// Route Guru
Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
Route::resource('/guru', GuruController::class);

// Route Kelas
Route::get('/kelas/data', [KelasController::class, 'data'])->name('kelas.data');
Route::resource('/kelas', KelasController::class);

// Route Mapel
Route::get('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');
Route::resource('/mapel', MapelController::class);

// Route Siswa
Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
Route::resource('/siswa', SiswaController::class);

// Route Login
Route::get('/', function () {
    return view('auth.login');
});