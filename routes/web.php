<?php

use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\ClassSemesterController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudyProgramController;
use App\Http\Controllers\Lecturer\AttendanceController;
use App\Http\Controllers\Lecturer\DashboardController;
use App\Http\Controllers\Lecturer\GradeController;
use App\Http\Controllers\Lecturer\ScheduleController as LecturerScheduleController;
use App\Http\Controllers\Student\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Student\ScheduleController as MahasiswaScheduleController;
use App\Http\Controllers\Student\AttendanceController as MahasiswaAttendanceController;
use App\Http\Controllers\Student\GradeController as MahasiswaGradeController;
use App\Http\Controllers\Auth\AuthController;

use Illuminate\Support\Facades\Route;




// LOGIN (semua role)
Route::get('/auth/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/auth/login', [AuthController::class, 'login'])
    ->name('login.process');

// REGISTER (ADMIN ONLY)
Route::get('/auth/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/auth/register', [AuthController::class, 'register'])
    ->name('register.process');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Semua route admin dikelompokkan, rapi, dan konsisten
*/

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
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
| Dosen Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['auth','role:lecturer'])->prefix('dosen')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dosen.dashboard');

    Route::get('/jadwal', [LecturerScheduleController::class, 'index'])
        ->name('dosen.jadwal');

    Route::get('/jadwal/{schedule}/presensi', [AttendanceController::class, 'create'])
        ->name('dosen.presensi.form');

    Route::post('/jadwal/{schedule}/presensi', [AttendanceController::class, 'store'])
        ->name('dosen.presensi.store');

    Route::get('/dosen/jadwal/{schedule}/nilai', [GradeController::class, 'create'])
        ->name('dosen.nilai.create');

    Route::post('/dosen/jadwal/{schedule}/nilai', [GradeController::class, 'store'])
        ->name('dosen.nilai.store');

});

/*
|--------------------------------------------------------------------------
| Mahasiswa Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['auth','role:student'])->prefix('mahasiswa')->group(function () {

    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])
        ->name('mahasiswa.dashboard');

    Route::get('/jadwal', [MahasiswaScheduleController::class, 'index'])
        ->name('mahasiswa.jadwal');

    Route::get('/presensi', [MahasiswaAttendanceController::class, 'index'])
        ->name('mahasiswa.presensi.index');

    Route::get('/presensi/rekap', [MahasiswaAttendanceController::class, 'rekap'])
        ->name('mahasiswa.presensi.rekap');


    Route::get('/mahasiswa/nilai',[MahasiswaGradeController::class, 'index'])
        ->name('mahasiswa.nilai');
});
