<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use \App\Http\Controllers\Admin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
        Route::put('/settings/money', [UserController::class, 'addMoney'])->name('user.add.money');
        Route::get('/reservations', [UserController::class, 'reservations'])->name('user.show.reservations');
        Route::get('/AnnouncementsList', [UserController::class, 'AnnouncementsList'])->name('user.see.anouncements');
        Route::get('/AnnouncementsCreation', [UserController::class, 'AnnouncementsCreation'])->name('user.create.annoucement');
        Route::post('/AnnouncementsCreationAdd', [UserController::class, 'AnnouncementsCreationAdd'])->name('user.create.annoucement.add');
        Route::get('/AnnouncementsSuppr/{id}', [UserController::class, 'AnnouncementsSuppr'])->name('user.suppr.annoucement');
        Route::get('/AnnouncementsEdit/{id}', [UserController::class, 'AnnouncementsEdit'])->name('user.edit.annoucement');
        Route::post('/AnnouncementsEditValidation/{id}', [UserController::class, 'AnnouncementsEditValidation'])->name('user.edit.annoucement.validation');
        Route::get('/AnnouncementsSee/{id}', [UserController::class, 'AnnouncementsSee'])->name('user.see.annoucement');
    });
    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/{id}/reserved', [VehicleController::class, 'reserved'])->name('vehicles.reserved');
        Route::post('/{vehicle}/reserved', [VehicleController::class, 'storeReserved'])->name('vehicules.reserved.store');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => [IsAdmin::class]], function () {
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles',[Admin\VehicleController::class, 'index'])->name('admin.vehicle.index');
    Route::get('/vehicles/{id}',[Admin\VehicleController::class, 'show'])->name('admin.vehicle.show');
    Route::put('/vehicles/{id}',[Admin\VehicleController::class, 'update'])->name('admin.vehicle.update');
});
