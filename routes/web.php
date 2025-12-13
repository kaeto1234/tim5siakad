<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Halaman Public / Guest
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('admin.kelas.index'); // atau landing page tim kamu
});

