<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\HirerController;
use App\Http\Controllers\Backend\ShareController;
use App\Http\Controllers\Backend\VehicleDetailController;
use App\Http\Controllers\Backend\AssignVehicleController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\SchedulesController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\AccidentController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::prefix('admin')->group(function () {

        // for dashboard page
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/get-rent-amount', [DashboardController::class, 'getRentAmount'])->name('get.rent.amount');
        Route::get('/dashboard/service-stats', [DashboardController::class, 'getServiceStats']);
        Route::get('/dashboard/other-service-stats', [DashboardController::class, 'getOtherServiceStats']);
        // vehicle Management Started

        // for category page
        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

        // for vehicle page
        Route::match(['get', 'post'], '/vehicles', [VehicleDetailController::class, 'index'])->name('vehicle');
        Route::match(['get', 'post'], '/vehicles/create', [VehicleDetailController::class, 'create'])->name('vehicle.create');
        Route::match(['get', 'post'], '/vehicles/edit/{id}', [VehicleDetailController::class, 'edit'])->name('vehicle.edit');
        Route::post('/vehicle/store', [VehicleDetailController::class, 'store'])->name('vehicle.store');
        Route::put('/vehicle/update/{id}', [VehicleDetailController::class, 'update'])->name('vehicle.update');
        Route::delete('/vehicle/delete/{id}', [VehicleDetailController::class, 'destroy'])->name('vehicle.delete');
        Route::delete('/vehicle-files/{id}', [VehicleDetailController::class, 'vehicleFileDestroy'])->name('vehicle-files.destroy');

        Route::post('/share-vehicle', [ShareController::class, 'shareVehicle'])->name('vehicle.share');

        Route::get('/vehicle/details/{id}', [VehicleDetailController::class, 'getVehicleDetail'])->name('vehicle.details.id');
        Route::get('/vehicle/details', [VehicleDetailController::class, 'details'])->name('vehicle.details');

        // for driver page
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

        // for assign vehicle pages
        Route::get('/assign-vehicle/upcoming', [AssignVehicleController::class, 'index'])->name('assign.vehicle.list');
        Route::put('/assign-vehicle/update/{id}', [AssignVehicleController::class, 'update'])->name('assign.vehicle.update');

        Route::get('/assign/vehicle/ongoing', [AssignVehicleController::class, 'onGoing'])->name('assign.vehicle.ongoing');
        Route::get('/assign/vehicle/completed', [AssignVehicleController::class, 'completed'])->name('assign.vehicle.completed');


        Route::delete('/assign-vehicle/delete/{id}', [AssignVehicleController::class, 'destroy'])->name('assign.vehicle.delete');
        Route::get('/assign-vehicle/agreement/{id}', [AssignVehicleController::class, 'getagreement1'])->name('assign.vehicle.agreement');

        // Vehicle Management Ended

        // Service Management Started

        // time slots
        Route::match(['get', 'post'], '/time-slots', [SchedulesController::class, 'timeSlots'])->name('time.slots');
        Route::post('/time-slots/store', [SchedulesController::class, 'storeTimeSlots'])->name('time-slots.store');
        Route::put('/time-slots/update/{id}', [SchedulesController::class, 'updateTimeSlots'])->name('time-slots.update');
        Route::delete('/time-slots/delete/{id}', [SchedulesController::class, 'destroyTimeSlots'])->name('time-slots.delete');

        // for service page
        Route::get('/services/service', [ServiceController::class, 'index'])->name('services.service');
        Route::post('/services/service/store', [ServiceController::class, 'store'])->name('services.service.store');
        Route::put('/services/service/update/{id}', [ServiceController::class, 'update'])->name('services.service.update');
        Route::delete('/services/service/delete/{id}', [ServiceController::class, 'destroy'])->name('services.service.delete');

        // for job page
        Route::get('/services/job', [ServiceController::class, 'job'])->name('services.job');
        Route::post('/services/job/store', [ServiceController::class, 'jobStore'])->name('services.job.store');
        Route::put('/services/job/update/{id}', [ServiceController::class, 'jobUpdate'])->name('services.job.update');
        Route::delete('/services/job/delete/{id}', [ServiceController::class, 'jobDestroy'])->name('services.job.delete');

        // company vehicle bookings pages
        Route::get('/services/company-vehicle', [BookingController::class, 'companyVehicle'])->name('services.company-vehicle');
        Route::get('/services/company-vehicle/create', [BookingController::class, 'createCompanyVehicle'])->name('services.company-vehicle.create');
        Route::post('/services/company-vehicle/store', [BookingController::class, 'storeCompanyVehicle'])->name('services.company-vehicle.store');
        Route::get('/services/company-vehicle/edit/{id}', [BookingController::class, 'editCompanyVehicle'])->name('services.company-vehicle.edit');
        Route::post('/services/company-vehicle/share/invoice/{id}', [BookingController::class, 'shareCompanyInvoice'])->name('company-invoice.share');
        Route::put('/services/company-vehicle/{id}', [BookingController::class, 'updateCompanyVehicle'])->name('services.company-vehicle.update');
        Route::delete('/services/company-vehicle/delete/{id}', [BookingController::class, 'destroyCompanyVehicle'])->name('services.company-vehicle.delete');

        Route::get('/get-time-slots', [BookingController::class, 'getTimeSlots'])->name('get.time.slots');
        Route::get('/get-time-slots-edit', [BookingController::class, 'getTimeSlotsEdit'])->name('get.time.slots-edit');

        //other company vehicle bookings pages
        Route::get('/services/other-vehicle', [BookingController::class, 'otherVehicle'])->name('services.other-vehicle');
        Route::get('/services/other-vehicle/create', [BookingController::class, 'createOtherVehicle'])->name('services.other-vehicle.create');
        Route::post('/services/other-vehicle/store', [BookingController::class, 'storeOtherVehicle'])->name('services.other-vehicle.store');
        Route::get('/services/other-vehicle/edit/{id}', [BookingController::class, 'editOtherVehicle'])->name('services.other-vehicle.edit');
        Route::put('/services/other-vehicle/update/{id}', [BookingController::class, 'updateOtherVehicle'])->name('services.other-vehicle.update');
        Route::delete('/services/other-vehicle/delete/{id}', [BookingController::class, 'destroyOtherVehicle'])->name('services.other-vehicle.delete');
        Route::post('/services/other-vehicle/share/invoice/{id}', [BookingController::class, 'shareOtherInvoice'])->name('other-invoice.share');

        // Bookings invoices
        Route::get('/services/company-invoice/{id}', [BookingController::class, 'companyInvoice'])->name('services.invoice');
        Route::get('/services/other-invoice/{id}', [BookingController::class, 'otherInvoice'])->name('services.other-invoice');

        // Accident Module
        Route::get('/services/accident', [AccidentController::class, 'index'])->name('services.accident');
        Route::get('/services/accident/create', [AccidentController::class, 'create'])->name('services.accident.create');
        Route::post('/services/accident/store', [AccidentController::class, 'store'])->name('services.accident.store');
        Route::get('/services/accident/edit/{id}', [AccidentController::class, 'edit'])->name('services.accident.edit');
        Route::put('/services/accident/update/{id}', [AccidentController::class, 'update'])->name('services.accident.update');
        Route::delete('/services/accident/delete/{id}', [AccidentController::class, 'destroy'])->name('services.accident.delete');
        Route::delete('/services/accident/file/{id}', [AccidentController::class, 'deleteFile'])->name('services.accident.file.delete');

        // invoice management
        Route::get('/services/company-vehicle/invoice', [BookingController::class, 'companyInvoicePage'])->name('services.company-vehicle.invoice');
        Route::get('/services/other-vehicle/invoice', [BookingController::class, 'otherInvoicePage'])->name('services.other-vehicle.invoice');

        // Service Management Ended
    });
});

Route::get('/vehicle-details/{id}', [ShareController::class, 'showVehicleDetails'])->name('share.vehicle.details');
Route::get('/send-user-vehicle-email/{user_id}/{vehicle_id}/{token}', [ShareController::class, 'driversAgreement'])->name('send.user.vehicle.email');
Route::post('/booking/sucsess', [HirerController::class, 'storeHirerDetails'])->name('hirer.store');



Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/permissions', [UserManagementController::class, 'permission'])->name('permissions');
        Route::post('/permissions/store', [UserManagementController::class, 'permissionStore'])->name('permissions.store');
        Route::put('/permissions/update/{id}', [UserManagementController::class, 'permissionUpdate'])->name('permissions.update');
        Route::delete('/permissions/delete/{id}', [UserManagementController::class, 'permissionDestroy'])->name('permissions.delete');

        Route::get('/roles', [UserManagementController::class, 'role'])->name('roles');
        Route::post('/roles/store', [UserManagementController::class, 'roleStore'])->name('roles.store');
        Route::put('/roles/update/{id}', [UserManagementController::class, 'roleUpdate'])->name('roles.update');
        Route::delete('/roles/delete/{id}', [UserManagementController::class, 'roleDestroy'])->name('roles.delete');

        Route::get('/users', [UserManagementController::class, 'user'])->name('users');
        Route::post('/users/store', [UserManagementController::class, 'userStore'])->name('users.store');
        Route::put('/users/update/{id}', [UserManagementController::class, 'userUpdate'])->name('users.update');
        Route::delete('/users/{id}', [UserManagementController::class, 'userDestroy'])->name('users.delete');
    });
});
Route::get('/link-expired', function () {
    return view('backend.vehicle-management.pages.link-expired');
})->name('link.expired');

Route::get('/ddr-form', function () {
    return view('backend.payment.direct-debit-form');
})->name('ddr.form');


Route::get('/redirect', [RedirectController::class, 'index'])->middleware('auth');

Route::get('/', [IndexController::class, 'home'])->name('home');
