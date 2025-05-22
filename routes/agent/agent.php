<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\AgentPropertyController;
use App\Http\Middleware\RedirectIfAuthenticated;


Route::middleware(['auth', 'verified', 'roleMiddleware:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile', [AgentController::class, 'AgentProfileUpdate'])->name('agent.profile.update');
    Route::get('/agent/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');
    Route::post('/agent/password/submit', [AgentController::class, 'AgentChangePasswordSubmit'])->name('agent.change.password.submit');
    //PropertyController
    Route::controller(AgentPropertyController::class)->group(function () {
        Route::get('/agent/property', 'AgentPropertyIndex')->name('agent.property.index');
        Route::get('/agent/property/create', 'AgentPropertyCreate')->name('agent.property.create');
        Route::post('/agent/property/store', 'AgentPropertyStore')->name('agent.property.store');
        Route::get('/agent/property/edit/{id}', 'AgentPropertyEdit')->name('agent.property.edit');
        Route::post('/agent/property/update/{id}', 'AgentPropertyUpdate')->name('agent.property.update');
        Route::post('/agent/property/thambnail/{id}', 'AgentPropertyThambnailUpdate')->name('agent.property.thambnail.update');
        Route::post('/agent/property/multi_image/', 'AgentPropertyMultiImage')->name('agent.property.multi_image.update');
        Route::get('/agent/property/multi_image/delete/{id}', 'AgentPropertyMultiImageDelete')->name('agent.property.multi_image.delete');
        Route::post('/agent/property/multi_image/new', 'AgentPropertyMultiImageAdd')->name('agent.property.multi_image.store');
        Route::post('/agent/property/facility/update/', 'AgentPropertyFacilityUpdate')->name('agent.property.facility.update');
        Route::get('/agent/property/delete/{id}', 'AgentPropertyShow')->name('agent.property.details');
        Route::post('/agent/property/inactive/', 'AgentPropertyInactive')->name('agent.property.inactive');
        Route::post('/agent/property/active/', 'AgentPropertyActive')->name('agent.property.active');
    });
});



Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/login', [AgentController::class, 'AgentSubmit'])->name('agent.login.submit');
//agent.register

// Route::get('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
Route::post('/agent/register', [AgentController::class, 'AgentRegisterSubmit'])->name('agent.register.submit');
