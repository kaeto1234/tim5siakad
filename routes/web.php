<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataKuliahController;

/*
|--------------------------------------------------------------------------
| Halaman Public / Guest
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // atau landing page tim kamu
});

/*
|--------------------------------------------------------------------------
| AUTH (Login & Register)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ROUTES MAHASISWA 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mhs.')->group(function () {

    Route::view('/', 'mahasiswa.index')->name('index');
    Route::view('/absen', 'mahasiswa.absen')->name('absen');
    Route::view('/jadwal', 'mahasiswa.jadwal')->name('jadwal');
    Route::view('/profil', 'mahasiswa.profil')->name('profil');

    // Backend: mahasiswa melihat jadwal & presensi
    Route::get('/jadwal-backend', [JadwalController::class, 'indexMahasiswa'])->name('jadwal.backend');
    Route::get('/presensi/{id}', [PresensiController::class, 'show'])->name('presensi.show');
    Route::post('/presensi/{id}/hadir', [PresensiController::class, 'hadir'])->name('presensi.hadir');
});


/*
|--------------------------------------------------------------------------
| ROUTES DOSEN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {

    Route::get('/jadwal', [JadwalController::class, 'indexDosen'])->name('jadwal.index');

    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');

    // Presensi
    Route::post('/presensi/{jadwalId}/buka', [PresensiController::class, 'buka'])->name('presensi.buka');
    Route::post('/presensi/{id}/tutup', [PresensiController::class, 'tutup'])->name('presensi.tutup');
    Route::get('/presensi/{id}/hadir', [PresensiController::class, 'hadirList'])->name('presensi.hadir');
});


/*
|--------------------------------------------------------------------------
| ROUTES ADMIN
| Admin hanya boleh: Lihat + Delete
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/jadwal', [JadwalController::class, 'indexAdmin'])->name('jadwal');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.delete');

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.delete');

    Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah');
    Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.delete');
});
