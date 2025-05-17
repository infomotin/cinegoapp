<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Agent\AgentController;
use App\Http\Middleware\RedirectIfAuthenticated;


Route::middleware(['auth', 'verified','roleMiddleware:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    //agent.logout
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
});



Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/login', [AgentController::class, 'AgentSubmit'])->name('agent.login.submit');
//agent.register

// Route::get('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
Route::post('/agent/register', [AgentController::class, 'AgentRegisterSubmit'])->name('agent.register.submit');