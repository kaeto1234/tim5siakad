<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('mahasiswa.absen');
});

Route::get('/beranda', function () {
    return view('mahasiswa.index');
});
