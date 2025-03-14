<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\ShareController;
use App\Http\Controllers\Backend\HirerController;
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
        Route::get('/drivers/edit/{id}', [DriverController::class, 'edit'])->name('drivers.edit');
        Route::post('/drivers/store', [DriverController::class, 'store'])->name('drivers.store');
        Route::put('/drivers/update/{id}', [DriverController::class, 'update'])->name('drivers.update');
        Route::delete('/drivers/delete/{id}', [DriverController::class, 'destroy'])->name('drivers.delete');
        Route::delete('/driver-files/{id}', [DriverController::class, 'driverFileDestroy'])->name('driver-files.destroy');

        Route::get('/driver/details/{id}', [DriverController::class, 'getDriverDetail'])->name('driver.details.id');
        Route::get('/driver/details', [DriverController::class, 'details'])->name('driver.details');


        Route::post('/send-drivers-vehicles/email/{id}', [ShareController::class, 'sendUserVehicleEmail'])->name('send.drivers.vehicles.email');
        Route::get('/send-user-vehicle-email/{user_id}/{vehicle_id}/{token}', [ShareController::class, 'driversAgreement'])->name('send.user.vehicle.email');

        Route::post('/booking/sucsess', [HirerController::class, 'storeHirerDetails'])->name('hirer.store');
    });
});


Route::get('/link-expired', function () {
    return view('backend.vehicle-management.pages.link-expired');
})->name('link.expired');
