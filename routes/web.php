<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuruController
};

Route::get('/', function () {
    return view('layout.app');
});

Route::resource('/guru', GuruController::class);
