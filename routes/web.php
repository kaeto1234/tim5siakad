<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Halaman Public / Guest
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('admin.kelas.create'); // atau landing page tim kamu
});

