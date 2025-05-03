<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Developer\DeveloperController;


Route::middleware(['auth', 'verified','roleMiddleware:developer'])->group(function () {
    Route::get('/developer/dashboard', [DeveloperController::class, 'DeveloperDashboard'])->name('developer.dashboard');
});
