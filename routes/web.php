<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [Frontsite::class, "index"]);


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/banner', function() {
        return view('dashboard.banner.index');
    });
    


    
    Route::get('/projects', function() {
        return view('dashboard.projects.index');
    });
    
    Route::get('/categories', function() {
        return view('dashboard.categories.index');
    });
});