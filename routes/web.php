<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite;
use App\Http\Controllers\PtoCController;
use App\Http\Controllers\MessageController;


/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [Frontsite::class, "index"]);

//Route::resource('messages', MessageController::class);

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('messages', MessageController::class);
    Route::post('/messages/delete', [MessageController::class, 'deleteSelected'])->name('messages.delete');
    Route::post('/messages/read', [MessageController::class, 'setSelectedRead'])->name('messages.read');
    Route::post('/messages/unread', [MessageController::class, 'setSelectedUnRead'])->name('messages.unread');

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