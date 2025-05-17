<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Agent\AgentController;
use App\Http\Middleware\RedirectIfAuthenticated;


Route::middleware(['auth', 'verified','roleMiddleware:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile', [AgentController::class, 'AgentProfileUpdate'])->name('agent.profile.update');
    Route::get('/agent/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');
    Route::post('/agent/password/submit', [AgentController::class, 'AgentChangePasswordSubmit'])->name('agent.change.password.submit');
});



Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/login', [AgentController::class, 'AgentSubmit'])->name('agent.login.submit');
//agent.register

// Route::get('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
Route::post('/agent/register', [AgentController::class, 'AgentRegisterSubmit'])->name('agent.register.submit');