<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Agent\AgentController;


Route::middleware(['auth', 'verified','roleMiddleware:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

