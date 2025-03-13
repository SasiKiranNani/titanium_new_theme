<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DriverController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/get-rent-amount', [DashboardController::class, 'getRentAmount'])->name('get.rent.amount');

        Route::get('/drivers/list', [DriverController::class, 'index'])->name('drivers.list');
        Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
        Route::post('/drivers/store', [DriverController::class, 'store'])->name('drivers.store');
        Route::put('/drivers/update/{id}', [DriverController::class, 'update'])->name('drivers.update');
        Route::delete('/drivers/delete/{id}', [DriverController::class, 'destroy'])->name('drivers.delete');
        Route::delete('/driver-files/{id}', [DriverController::class, 'driverFileDestroy'])->name('driver-files.destroy');
    });
});
