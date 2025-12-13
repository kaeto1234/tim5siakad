<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Semua route admin dikelompokkan, rapi, dan konsisten
*/

Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard_admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | USERS
    |--------------------------------------------------------------------------
    */
    Route::get('/users', fn () => view('admin.users.index'))->name('admin.users.index');
    Route::get('/users/create', fn () => view('admin.users.create'))->name('admin.users.create');
    Route::get('/users/edit', fn () => view('admin.users.edit'))->name('admin.users.edit');

    /*
    |--------------------------------------------------------------------------
    | JURUSAN
    |--------------------------------------------------------------------------
    */
    Route::get('/jurusan', fn () => view('admin.jurusan.index'))->name('admin.jurusan.index');
    Route::get('/jurusan/create', fn () => view('admin.jurusan.create'))->name('admin.jurusan.create');
    Route::get('/jurusan/edit', fn () => view('admin.jurusan.edit'))->name('admin.jurusan.edit');

    /*
    |--------------------------------------------------------------------------
    | PRODI
    |--------------------------------------------------------------------------
    */
    Route::get('/prodi', fn () => view('admin.prodi.index'))->name('admin.prodi.index');
    Route::get('/prodi/create', fn () => view('admin.prodi.create'))->name('admin.prodi.create');
    Route::get('/prodi/edit', fn () => view('admin.prodi.edit'))->name('admin.prodi.edit');

    /*
    |--------------------------------------------------------------------------
    | KELAS
    |--------------------------------------------------------------------------
    */
    Route::get('/kelas', fn () => view('admin.kelas.index'))->name('admin.kelas.index');
    Route::get('/kelas/create', fn () => view('admin.kelas.create'))->name('admin.kelas.create');
    Route::get('/kelas/edit', fn () => view('admin.kelas.edit'))->name('admin.kelas.edit');

    /*
    |--------------------------------------------------------------------------
    | SEMESTER
    |--------------------------------------------------------------------------
    */
    Route::get('/semester', fn () => view('admin.semester.index'))->name('admin.semester.index');
    Route::get('/semester/create', fn () => view('admin.semester.create'))->name('admin.semester.create');
    Route::get('/semester/edit', fn () => view('admin.semester.edit'))->name('admin.semester.edit');

    /*
    |--------------------------------------------------------------------------
    | MATA KULIAH
    |--------------------------------------------------------------------------
    */
    Route::get('/mata-kuliah', fn () => view('admin.mata_kuliah.index'))->name('admin.mata_kuliah.index');
    Route::get('/mata-kuliah/create', fn () => view('admin.mata_kuliah.create'))->name('admin.mata_kuliah.create');
    Route::get('/mata-kuliah/edit', fn () => view('admin.mata_kuliah.edit'))->name('admin.mata_kuliah.edit');

    /*
    |--------------------------------------------------------------------------
    | DOSEN
    |--------------------------------------------------------------------------
    */
    Route::get('/dosen', fn () => view('admin.dosen.index'))->name('admin.dosen.index');
    Route::get('/dosen/create', fn () => view('admin.dosen.create'))->name('admin.dosen.create');

    /*
    |--------------------------------------------------------------------------
    | MAHASISWA
    |--------------------------------------------------------------------------
    */
    Route::get('/mahasiswa', fn () => view('admin.mahasiswa.index'))->name('admin.mahasiswa.index');
    Route::get('/mahasiswa/create', fn () => view('admin.mahasiswa.create'))->name('admin.mahasiswa.create');

    /*
    |--------------------------------------------------------------------------
    | JADWAL
    |--------------------------------------------------------------------------
    */
    Route::get('/jadwal', fn () => view('admin.jadwal.index'))->name('admin.jadwal.index');
    Route::get('/jadwal/create', fn () => view('admin.jadwal.create'))->name('admin.jadwal.create');
    Route::get('/jadwal/edit', fn () => view('admin.jadwal.edit'))->name('admin.jadwal.edit');

});


/*
|--------------------------------------------------------------------------
| Mahasiswa Routes
|--------------------------------------------------------------------------
| Semua route mahasiswa dikelompokkan, rapi, dan konsisten
*/


// Dashboard
Route::get('/dashboard_mahasiswa', function () {
    return view('mahasiswa.dashboard');
})->name('mahasiswa.dashboard');

// jadwal
Route::get('/jadwal_mahasiswa', function () {
    return view('mahasiswa.jadwal');
})->name('mahasiswa.jadwal');

// nilai
Route::get('/nilai_mahasiswa', function () {
    return view('mahasiswa.nilai');
})->name('mahasiswa.nilai');