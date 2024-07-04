<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite;
use App\Http\Controllers\PtoCController;

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


    Route::get('/projecttocategory', [PtoCController::class, 'index']);
    Route::post('/storeprojecttocategory', [PtoCController::class, 'store'])->name('storeprojecttocategory');

});