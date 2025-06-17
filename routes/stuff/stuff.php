<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Stuff\StuffController;

Route::middleware(['auth', 'verified','roleMiddleware:stuff'])->group(function () {
    Route::get('/stuff/dashboard', [StuffController::class, 'StuffDashboard'])->name('stuff.dashboard');
});
