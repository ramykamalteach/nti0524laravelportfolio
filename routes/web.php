<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite;
use App\Http\Controllers\PtoCController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\MemberController;

use App\Http\Middleware\Logged;



Route::get('/', [Frontsite::class, "index"]);


Route::post('/verifyLogin', [MemberController::class, 'verifyLogin'])->name('verifyLogin.member');

Route::get('/logout', [MemberController::class, 'logout'])->name('logout.member');

Route::get('/login', function() {
    return view('login.index');
})->name('login');

Route::group(['prefix' => 'dashboard', 'middleware' => Logged::class], function () {

    Route::get('/register', function() {
        return view('dashboard.registerMember.index');
    });
    Route::post('/registerMember', [MemberController::class, 'registerMember'])->name('register.member');


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