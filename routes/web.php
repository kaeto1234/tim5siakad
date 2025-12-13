<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Halaman Public / Guest
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // atau landing page tim kamu
});

