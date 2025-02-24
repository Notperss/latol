<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Location\MainLocationController;
use App\Http\Controllers\Location\SubLocationController;
use App\Http\Controllers\WorkUnit\CompanyController;
use App\Http\Controllers\ManagementAccess\RoleController;
use App\Http\Controllers\ManagementAccess\UserController;
use App\Http\Controllers\ManagementAccess\RouteController;
use App\Http\Controllers\ManagementAccess\MenuItemController;
use App\Http\Controllers\ManagementAccess\MenuGroupController;
use App\Http\Controllers\ManagementAccess\PermissionController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['web', 'auth', 'role:super-admin', 'verified',]], function () {
    Route::resource('user', UserController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('route', RouteController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('permission', PermissionController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('role', RoleController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('menu', MenuGroupController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('menu.item', MenuItemController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('company', CompanyController::class)->only('index', 'store', 'update', 'destroy');

    Route::resource('activity-log', ActivityLogController::class)->only('index');

});

Route::group(['middleware' => ['web', 'auth', 'verified',]], function () {
    Route::resource('dashboard', DashboardController::class)->only('index', );

    Route::resource('mainLocation', MainLocationController::class)->except('index');
    Route::get('main-location', [MainLocationController::class, 'index'])->name('mainLocation.index');

    Route::resource('subLocation', SubLocationController::class)->except('index');
    Route::get('sub-location', [SubLocationController::class, 'index'])->name('subLocation.index');
});


require __DIR__.'/auth.php';
