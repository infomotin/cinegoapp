<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\User\UserController;


// User Frontend Routes 

Route::get('/', [UserController::class, 'Index'])->name('index');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.settings');
});