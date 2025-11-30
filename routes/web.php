<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('mahasiswa.absen');
});

Route::get('/beranda', function () {
    return view('mahasiswa.index');
});
// routes/web.php

Route::prefix('mahasiswa')->name('mhs.')->group(function () {
    Route::view('/', 'mahasiswa.index')->name('index');
    Route::view('/absen', 'mahasiswa.absen')->name('absen');
    Route::view('/jadwal', 'mahasiswa.jadwal')->name('jadwal');
    Route::view('/profil', 'mahasiswa.profil')->name('profil');
});
