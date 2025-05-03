<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AdminController;


Route::middleware(['auth', 'verified','roleMiddleware:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    //admin.logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    // admin.profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'AdminSubmit'])->name('admin.login.submit');
 