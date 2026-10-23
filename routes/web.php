<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/cek-booking', [BookingController::class, 'checkForm'])
    ->name('booking.check');

Route::post('/cek-booking', [BookingController::class, 'checkStatus'])
    ->name('booking.check.status');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kamar/{room}', [HomeController::class, 'show'])
    ->name('rooms.show');

Route::get('/kamar/{room}/booking', [BookingController::class, 'create'])
    ->name('bookings.create');

Route::post('/kamar/{room}/booking', [BookingController::class, 'store'])
    ->name('bookings.store');    

use App\Http\Controllers\DashboardController;

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::resource('rooms', RoomController::class);
    });

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::resource('rooms', RoomController::class);

        Route::get('/bookings', [BookingController::class, 'adminIndex'])
            ->name('bookings.index');

        Route::post('/bookings/{id}/approve', [BookingController::class, 'approve'])
            ->name('bookings.approve');

        Route::post('/bookings/{id}/reject', [BookingController::class, 'reject'])
            ->name('bookings.reject');

        Route::get('/tenants', [TenantController::class, 'index'])
            ->name('tenants.index');

        Route::get('/tenants/create/{booking}', [TenantController::class, 'create'])
            ->name('tenants.create');

        Route::post('/tenants', [TenantController::class, 'store'])
            ->name('tenants.store');
    });

require __DIR__.'/auth.php';
