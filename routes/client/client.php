<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Client\ClientController;

Route::middleware(['auth', 'verified','roleMiddleware:client'])->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'ClientDashboard'])->name('client.dashboard');
});
