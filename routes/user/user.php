<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\IndexController;



// User Frontend Routes 

Route::get('/', [UserController::class, 'Index'])->name('index');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.settings');
    Route::post('/user/profile/edit', [UserController::class, 'UserProfileEdit'])->name('user.settings.edit');
    // user.logout
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    //user.change.password
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/change/password', [UserController::class, 'UserChangePasswordStore'])->name('user.change.password.store');
});

//Frontend Routes   
Route::get('/property/details/{id}/{slug}', [IndexController::class, 'PropertyDetails']);