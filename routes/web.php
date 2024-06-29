<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [Frontsite::class, "index"]);