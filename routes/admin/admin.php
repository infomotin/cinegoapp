<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Backend\PropertyTypeController;
use App\Http\Controllers\Admin\Backend\AmenitieController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PackageHistoryController;
use App\Http\Controllers\Frontend\PropertyMessageController;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Admin\Backend\AllUserController;
use App\Http\Controllers\Admin\Backend\AddressController;


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
        Route::post('/property/update/{id}', 'PropertyUpdate')->name('backend.property.update');
        Route::post('/property/thambnail/{id}', 'PropertyThambnailUpdate')->name('property.thambnail.update');
        Route::post('/property/multi_image/', 'PropertyMultiImage')->name('property.multi_image.update');
        Route::get('/property/multi_image/delete/{id}', 'PropertyMultiImageDelete')->name('property.multi_image.delete');
        Route::post('/property/multi_image/new', 'PropertyMultiImageAdd')->name('property.multi_image.store');
        Route::post('/property/facility/update/', 'PropertyFacilityUpdate')->name('property.facility.update');
        Route::get('/property/delete/{id}', 'PropertyShow')->name('backend.property.details');
        Route::post('/property/inactive/', 'PropertyInactive')->name('backend.property.inactive');
        Route::post('/property/active/', 'PropertyActive')->name('backend.property.active');
    });
    //AllUserController
    Route::controller(AllUserController::class)->group(function () {
        Route::get('/admin/all/users', 'AllUserIndex')->name('admin.backend.users.index');
        Route::get('/update-user-status','changeStatus');
        Route::get('/admin/users/create', 'AllUserCreate')->name('admin.backend.user.create');
        Route::post('/admin/users/store', 'AllUserStore')->name('admin.backend.users.store');
        Route::get('/admin/users/edit/{id}', 'AllUserEdit')->name('admin.backend.user.edit');
        Route::post('/admin/users/update/{id}', 'AllUserUpdate')->name('admin.backend.users.update');
        Route::get('/admin/users/delete/{id}', 'AllUserDelete')->name('admin.backend.users.delete');
       
        // Route::get('/admin/users/restore/{id}', 'AllUserRestore')->name('admin.backend.users.restore');
        // Route::get('/admin/users/force/delete/{id}', 'AllUserForceDelete')->name('admin.backend.users.force.delete');
    });
    Route::controller(PackageHistoryController::class)->group(function () {
        // admin.backend.package.history
        Route::get('/admin/package/history', 'AdminPackageHistory')->name('admin.backend.package.history');
        //admin.backend.package.invoice
        Route::get('/admin/package/invoice/{invoice}', 'AdminPackageInvoice')->name('admin.backend.package.invoice');
    });
    Route::controller(PropertyMessageController::class)->group(function () {
        //admin.backend.message.inbox
        Route::get('/admin/message/inbox', 'AdminMessageInbox')->name('admin.backend.message.inbox');
    });
    Route::controller(AddressController::class)->group(function () {
        // admin.backend.address.index
        Route::get('/admin/address/inbex', 'AdminAddressInbex')->name('admin.backend.address.index');
        // admin.backend.address.create
        Route::get('/admin/address/create', 'AdminAddressCreate')->name('admin.backend.address.create');
        //admin.backend.address.store
        Route::post('/admin/address/store', 'AdminAddressStore')->name('admin.backend.address.store');
        // //admin.backend.address.edit
        // Route::get('/admin/address/edit/{id}', 'AdminAddressEdit')->name('admin.backend.address.edit');
        // //admin.backend.address.update
        // Route::post('/admin/address/update/{id}', 'AdminAddressUpdate')->name('admin.backend.address.update');
        // //admin.backend.address.delete
        // Route::get('/admin/address/delete/{id}', 'AdminAddressDelete')->name('admin.backend.address.delete');

        Route::get('/admin/division/inbex', 'AdminDivisionInbex')->name('admin.backend.address.division_index');
        Route::get('/admin/division/create', 'AdminDivisionCreate')->name('admin.backend.division.division_create');
        Route::post('/admin/division/store', 'AdminDivisionStore')->name('admin.backend.division.store');
        //index route for 
        Route::get('/admin/district/inbex', 'AdminDistrictInbex')->name('admin.backend.address.district_index');
        // Route::get('/admin/district/create', 'AdminDistrictCreate')->name('admin.backend.address.district_create');
        // Route::post('/admin/district/store', 'AdminDistrictStore')->name('admin.backend.address.district_store');
        //
        Route::get('/admin/zone/inbex', 'AdminZoneInbex')->name('admin.backend.address.zone_index');
        // Route::get('/admin/zone/create', 'AdminZoneCreate')->name('admin.backend.address.zone_create');
        // Route::post('/admin/zone/store', 'AdminZoneStore')->name('admin.backend.address.zone_store');


        Route::get('/admin/city/inbex', 'AdminCityInbex')->name('admin.backend.address.city_index');
        // Route::get('/admin/city/create', 'AdminCityCreate')->name('admin.backend.address.city_create');
        // Route::post('/admin/city/store', 'AdminCityStore')->name('admin.backend.address.city_store');


        Route::get('/admin/police/inbex', 'AdminPoliceInbex')->name('admin.backend.address.police_index');
        // Route::get('/admin/police/create', 'AdminPoliceCreate')->name('admin.backend.address.police_create');
        // Route::post('/admin/police/store', 'AdminPoliceStore')->name('admin.backend.address.police_store');


        Route::get('/admin/landmark/inbex', 'AdminLandmarkInbex')->name('admin.backend.address.landmark_index');
        // Route::get('/admin/landmark/create', 'AdminLandmarkCreate')->name('admin.backend.address.landmark_create');
        // Route::post('/admin/landmark/store', 'AdminLandmarkStore')->name('admin.backend.address.landmark_store');


        Route::get('/admin/word/inbex', 'AdminWordInbex')->name('admin.backend.address.word_index');
        // Route::get('/admin/word/create', 'AdminWordCreate')->name('admin.backend.address.word_create');
        // Route::post('/admin/word/store', 'AdminWordStore')->name('admin.backend.address.word_store');


        Route::get('/admin/road/inbex', 'AdminRoadInbex')->name('admin.backend.address.road_index');
        // Route::get('/admin/road/create', 'AdminRoadCreate')->name('admin.backend.address.road_create');
        // Route::post('/admin/road/store', 'AdminRoadStore')->name('admin.backend.address.road_store');

    });

});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/admin/login', [AdminController::class, 'AdminSubmit'])->name('admin.login.submit');
 