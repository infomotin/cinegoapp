<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Backend\PropertyTypeController;
use App\Http\Controllers\Admin\Backend\AmenitieController;
use App\Http\Controllers\Backend\PropertyController;


Route::middleware(['auth', 'verified','roleMiddleware:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    //admin.logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    // admin.profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    //admin.change.password
    Route::get('/admin/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    // admin.change.password.submit
    Route::post('/admin/password', [AdminController::class, 'AdminChangePasswordSubmit'])->name('admin.change.password.submit');
    //group Controller 
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/admin/property/type', 'PropertyTypeIndex')->name('admin.backend.property_type.index');
        Route::get('/admin/property/type/create', 'PropertyTypeCreate')->name('admin.property_type.create');
        Route::post('/admin/property/type/store', 'PropertyTypeStore')->name('admin.property_type.store');
        Route::get('/admin/property/type/edit/{id}', 'PropertyTypeEdit')->name('admin.property_type.edit');
        Route::post('/admin/property/type/update/{id}', 'PropertyTypeUpdate')->name('admin.property_type.update');
        Route::get('/admin/property/type/delete/{id}', 'PropertyTypeDelete')->name('admin.property_type.delete');
        // Route::get('/admin/property/type/status/{id}', 'PropertyTypeStatus')->name('admin.property.type.status');
        // Route::get('/admin/property/type/restore/{id}', 'PropertyTypeRestore')->name('admin.property.type.restore');
        // Route::get('/admin/property/type/force/delete/{id}', 'PropertyTypeForceDelete')->name('admin.property.type.force.delete');
    });
    //AmenitiesController
    Route::controller(AmenitieController::class)->group(function () {
        Route::get('/admin/amenities', 'AmenitiesIndex')->name('admin.backend.amenities.index');
        Route::get('/admin/amenities/create', 'AmenitiesCreate')->name('admin.backend.amenities.create');
        Route::post('/admin/amenities/store', 'AmenitiesStore')->name('admin.backend.amenities.store');
        Route::get('/admin/amenities/edit/{id}', 'AmenitiesEdit')->name('admin.backend.amenities.edit');
        Route::post('/admin/amenities/update/{id}', 'AmenitiesUpdate')->name('admin.backend.amenities.update');
        Route::get('/admin/amenities/delete/{id}', 'AmenitiesDelete')->name('admin.backend.amenities.delete');
    });
    //PropertyController
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/property', 'PropertyIndex')->name('backend.property.index');
        Route::get('/property/create', 'PropertyCreate')->name('backend.property.create');
        Route::post('/property/store', 'PropertyStore')->name('backend.property.store');
        Route::get('/property/edit/{id}', 'PropertyEdit')->name('backend.property.edit');
        // Route::post('/property/update/{id}', 'PropertyUpdate')->name('backend.property.update');
        // Route::get('/property/delete/{id}', 'PropertyDelete')->name('backend.property.delete');
    });

});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'AdminSubmit'])->name('admin.login.submit');
 