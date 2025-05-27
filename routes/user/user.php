<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;



// User Frontend Routes 

Route::get('/', [UserController::class, 'Index'])->name('index');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.settings');
    Route::post('/user/profile/edit', [UserController::class, 'UserProfileEdit'])->name('user.settings.edit');
    // user.logout
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    //user.change.password
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/change/password', [UserController::class, 'UserChangePasswordStore'])->name('user.change.password.store');
    //user.wishlist
    Route::get('/user/wishlist', [WishlistController::class, 'UserWishlist'])->name('user.wishlist');
    //user.wishlist.grid
    Route::get('/user/wishlist/grid', [WishlistController::class, 'UserWishlistGrid'])->name('user.wishlist.grid');
    // user.wishlist.delete
    Route::get('/user/wishlist/delete/{id}', [WishlistController::class, 'UserWishlistDelete'])->name('user.wishlist.delete');
    //user.wishlist.json
    Route::get('/user/wishlist/json', [WishlistController::class, 'UserWishlistJson'])->name('user.wishlist.json');

    // user.wishlist.json
    Route::get('/get-wishlist-properties', [WishlistController::class, 'GetWishlistProperties']);
});

//Frontend Routes   
Route::get('/property/details/{id}/{slug}', [IndexController::class, 'PropertyDetails']);
Route::post('/add-to-wishlist/{property_id}', [WishlistController::class, 'AddToWishlist']);