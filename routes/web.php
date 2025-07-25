<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminBookingsController;
use App\Http\Controllers\Admin\ServiceProvidersController;
use App\Http\Controllers\Admin\MaintenancePackageController;

Route::get('/', function () {
    return view('welcome');
});

// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::controller(AdminMainController::class)->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');

            Route::prefix('/users')->name('users.')->group(function () {
                Route::get('/', [UsersController::class, 'index'])->name('index');
                Route::get('/create', [UsersController::class, 'create'])->name('create');
                Route::post('/store', [UsersController::class, 'store'])->name('store');
                Route::get('/{id}/show', [UsersController::class, 'show'])->name('show');
                Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
                Route::put('/{user}/update', [UsersController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [UsersController::class, 'destroy'])->name('destroy');
            });

            //!maintenance packages
            Route::prefix('/packages')->name('packages.')->group(function () {
                Route::get('/', [MaintenancePackageController::class, 'index'])->name('index');
                Route::get('/create', [MaintenancePackageController::class, 'create'])->name('create');
                Route::post('/store', [MaintenancePackageController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [MaintenancePackageController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [MaintenancePackageController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [MaintenancePackageController::class, 'destroy'])->name('destroy');
            });

            //! service providers
            Route::prefix('/service_providers')->name('service_providers.')->group(function () {
                Route::get('/', [ServiceProvidersController::class, 'index'])->name('index');
                Route::get('/create', [ServiceProvidersController::class, 'create'])->name('create');
                Route::post('/store', [ServiceProvidersController::class, 'store'])->name('store');
                Route::get('/{serviceProvider}/edit', [ServiceProvidersController::class, 'edit'])->name('edit');
                Route::put('/{serviceProvider}/update', [ServiceProvidersController::class, 'update'])->name('update');
                Route::delete('/{serviceProvider}/destroy', [ServiceProvidersController::class, 'destroy'])->name('destroy');
            });

            //! booking management - FIXED NAMING
            Route::prefix('/bookings')->name('bookings.')->group(function () {
                Route::get('/', [AdminBookingsController::class, 'index'])->name('index');
                Route::get('/{id}', [AdminBookingsController::class, 'show'])->name('show');
                Route::get('/{id}/assign', [AdminBookingsController::class, 'assign'])->name('assign');
                Route::post('/{id}/assign', [AdminBookingsController::class, 'assign']);
                Route::patch('/{id}/approve', [AdminBookingsController::class, 'approve'])->name('approve');
                Route::patch('/{id}/reject', [AdminBookingsController::class, 'reject'])->name('reject');
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/frontend.php';
require __DIR__.'/user.php';
require __DIR__.'/service_provider.php';
