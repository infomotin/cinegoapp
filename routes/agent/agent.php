<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\AgentPropertyController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\PackageHistoryController;
use App\Http\Controllers\Frontend\PropertyMessageController;


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
    Route::controller(AgentPropertyController::class)->group(function () {
        //buy package
        Route::get('/agent/buy/package', 'AgentBuyPackage')->name('agent.buy.package');
        //agent.package.buy
        Route::get('/agent/package/buy/{package_name}', 'AgentPackageBuy')->name('agent.package.buy');
        //store.business.plan
        Route::post('/agent/package/buy/{package_name}', 'AgentPackageBuyStore')->name('store.business.plan');
    });
    Route::controller(PackageHistoryController::class)->group(function () {
        //agent.buy.package.history
        Route::get('/package/history', 'PackageHistory')->name('package.history');
        //backend.package.invoice
        Route::get('/package/invoice/{invoice}', 'PackageInvoice')->name('backend.package.invoice');
    });
    Route::controller(PropertyMessageController::class)->group(function () {
        //agent.message.index
        Route::get('/agent/message/report', 'AgentMessageIndex')->name('agent.message.report');
        //agent.message.index
        Route::get('/agent/message/inbox', 'AgentMessageInbox')->name('agent.message.index');
        //agent.message.show
        Route::get('/agent/message/show/{id}', 'AgentMessageShow')->name('agent.message.show');
    });
});



Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/login', [AgentController::class, 'AgentSubmit'])->name('agent.login.submit');
//agent.register

// Route::get('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
Route::post('/agent/register', [AgentController::class, 'AgentRegisterSubmit'])->name('agent.register.submit');
