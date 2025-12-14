<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\StudyProgramController;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ClassSemesterController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\LecturerController;




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
    | JURUSAN
    |--------------------------------------------------------------------------
    */
    Route::get('/jurusan', [DepartmentController::class, 'index'])
        ->name('admin.jurusan.index');

    Route::get('/jurusan/create', [DepartmentController::class, 'create'])
        ->name('admin.jurusan.create');

    Route::post('/jurusan', [DepartmentController::class, 'store'])
        ->name('admin.jurusan.store');

    Route::get('/jurusan/{department}/edit', [DepartmentController::class, 'edit'])
        ->name('admin.jurusan.edit');

    Route::put('/jurusan/{department}', [DepartmentController::class, 'update'])
        ->name('admin.jurusan.update');

    Route::delete('/jurusan/{department}', [DepartmentController::class, 'destroy'])
        ->name('admin.jurusan.destroy');

    /*
    |--------------------------------------------------------------------------
    | PRODI
    |--------------------------------------------------------------------------
    */
    Route::get('/prodi', [StudyProgramController::class, 'index'])
        ->name('admin.prodi.index');

    Route::get('/prodi/create', [StudyProgramController::class, 'create'])
        ->name('admin.prodi.create');

    Route::post('/prodi', [StudyProgramController::class, 'store'])
        ->name('admin.prodi.store');

    Route::get('/prodi/{studyProgram}/edit', [StudyProgramController::class, 'edit'])
        ->name('admin.prodi.edit');

    Route::put('/prodi/{studyProgram}', [StudyProgramController::class, 'update'])
        ->name('admin.prodi.update');

    Route::delete('/prodi/{studyProgram}', [StudyProgramController::class, 'destroy'])
        ->name('admin.prodi.destroy');

    /*
    |--------------------------------------------------------------------------
    | KELAS
    |--------------------------------------------------------------------------
    */
    Route::get('/kelas', [ClassRoomController::class, 'index'])
        ->name('admin.kelas.index');

    Route::get('/kelas/create', [ClassRoomController::class, 'create'])
        ->name('admin.kelas.create');

    Route::post('/kelas', [ClassRoomController::class, 'store'])
        ->name('admin.kelas.store');

    Route::get('/kelas/{classRoom}/edit', [ClassRoomController::class, 'edit'])
        ->name('admin.kelas.edit');

    Route::put('/kelas/{classRoom}', [ClassRoomController::class, 'update'])
        ->name('admin.kelas.update');

    Route::delete('/kelas/{classRoom}', [ClassRoomController::class, 'destroy'])
        ->name('admin.kelas.destroy');

    /*
    |--------------------------------------------------------------------------
    | SEMESTER
    |--------------------------------------------------------------------------
    */
    Route::get('/semester', [SemesterController::class, 'index'])
        ->name('admin.semester.index');

    Route::get('/semester/create', [SemesterController::class, 'create'])
        ->name('admin.semester.create');

    Route::post('/semester', [SemesterController::class, 'store'])
        ->name('admin.semester.store');

    Route::get('/semester/{semester}/edit', [SemesterController::class, 'edit'])
        ->name('admin.semester.edit');

    Route::put('/semester/{semester}', [SemesterController::class, 'update'])
        ->name('admin.semester.update');

    Route::delete('/semester/{semester}', [SemesterController::class, 'destroy'])
        ->name('admin.semester.destroy');

    Route::patch('/semester/{semester}/activate', [SemesterController::class, 'activate'])
        ->name('admin.semester.activate');

    /*
    |--------------------------------------------------------------------------
    | MATA KULIAH
    |--------------------------------------------------------------------------
    */
    Route::get('/mata_kuliah', [CourseController::class, 'index'])
        ->name('admin.mata_kuliah.index');

    Route::get('/mata_kuliah/create', [CourseController::class, 'create'])
        ->name('admin.mata_kuliah.create');

    Route::post('/mata_kuliah', [CourseController::class, 'store'])
        ->name('admin.mata_kuliah.store');

    Route::get('/mata_kuliah/{course}/edit', [CourseController::class, 'edit'])
        ->name('admin.mata_kuliah.edit');

    Route::put('/mata_kuliah/{course}', [CourseController::class, 'update'])
        ->name('admin.mata_kuliah.update');

    Route::delete('/mata_kuliah/{course}', [CourseController::class, 'destroy'])
        ->name('admin.mata_kuliah.destroy');

    /*
    |--------------------------------------------------------------------------
    | DOSEN
    |--------------------------------------------------------------------------
    */
    Route::get('/dosen', [LecturerController::class, 'index'])
        ->name('admin.dosen.index');

    Route::get('/dosen/create', [LecturerController::class, 'create'])
        ->name('admin.dosen.create');

    Route::post('/dosen', [LecturerController::class, 'store'])
        ->name('admin.dosen.store');

    Route::get('/dosen/{lecturer}/edit', [LecturerController::class, 'edit'])
        ->name('admin.dosen.edit');

    Route::put('/dosen/{lecturer}', [LecturerController::class, 'update'])
        ->name('admin.dosen.update');

    /*
    |--------------------------------------------------------------------------
    | MAHASISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/mahasiswa', [StudentController::class, 'index'])
        ->name('admin.mahasiswa.index');

    Route::get('/mahasiswa/create', [StudentController::class, 'create'])
        ->name('admin.mahasiswa.create');

    Route::post('/mahasiswa', [StudentController::class, 'store'])
    ->name('admin.mahasiswa.store');

    Route::delete('/mahasiswa/{student}', [StudentController::class, 'destroy'])
    ->name('admin.mahasiswa.destroy');

    /*
    |--------------------------------------------------------------------------
    | JADWAL
    |--------------------------------------------------------------------------
    */
    Route::get('/jadwal', [ScheduleController::class, 'index'])
        ->name('admin.jadwal.index');

    Route::get('/jadwal/create', [ScheduleController::class, 'create'])
        ->name('admin.jadwal.create');

    Route::post('/jadwal', [ScheduleController::class, 'store'])
        ->name('admin.jadwal.store');

    Route::get('/jadwal/{schedule}/edit', [ScheduleController::class, 'edit'])
        ->name('admin.jadwal.edit');

    Route::put('/jadwal/{schedule}', [ScheduleController::class, 'update'])
        ->name('admin.jadwal.update');

    Route::delete('/jadwal/{schedule}', [ScheduleController::class, 'destroy'])
        ->name('admin.jadwal.destroy');

    /*
    |--------------------------------------------------------------------------
    | KELAS SEMESTER
    |--------------------------------------------------------------------------
    */

    Route::get('/kelas_semester', [ClassSemesterController::class, 'index'])
        ->name('admin.kelas_semester.index');

    Route::get('/kelas_semester/create', [ClassSemesterController::class, 'create'])
        ->name('admin.kelas_semester.create');

    Route::post('/kelas_semester', [ClassSemesterController::class, 'store'])
        ->name('admin.kelas_semester.store');

    Route::get('/kelas_semester/{classSemester}/edit', [ClassSemesterController::class, 'edit'])
        ->name('admin.kelas_semester.edit');

    Route::put('/kelas_semester/{classSemester}', [ClassSemesterController::class, 'update'])
        ->name('admin.kelas_semester.update');

    Route::delete('/kelas_semester/{classSemester}', [ClassSemesterController::class, 'destroy'])
        ->name('admin.kelas_semester.destroy');

    /*
    |--------------------------------------------------------------------------
    | RUANGAN
    |--------------------------------------------------------------------------
    */
        
    Route::get('/ruangan', [RoomController::class, 'index'])
        ->name('admin.ruangan.index');

    Route::get('/ruangan/create', [RoomController::class, 'create'])
        ->name('admin.ruangan.create');

    Route::post('/ruangan', [RoomController::class, 'store'])
        ->name('admin.ruangan.store');

    Route::get('/ruangan/{room}/edit', [RoomController::class, 'edit'])
        ->name('admin.ruangan.edit');

    Route::put('/ruangan/{room}', [RoomController::class, 'update'])
        ->name('admin.ruangan.update');

    Route::delete('/ruangan/{room}', [RoomController::class, 'destroy'])
        ->name('admin.ruangan.destroy');
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