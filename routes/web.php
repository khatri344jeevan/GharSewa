<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\MaintenancePackageController;
use App\Http\Controllers\Admin\ServiceProvidersController;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('user/dashboard', function () {
//     return view('user.index');
// })->middleware(['auth', 'verified', 'rolemanager:user'])->name('user.dashboard');

// Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.index');
//     })->name('admin.dashboard');
// });
// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::controller(AdminMainController::class)->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            // Route::get('/manage/users', 'manage_users')->name('admin.manage.users');
            // Route::get('/manage/services', 'manage_services')->name('admin.manage.services');
            // Route::get('/manage/properties', 'manage_properties')->name('admin.manage.properties');
            Route::prefix('/users')->group(function () {
                Route::get('/', [UsersController::class, 'index'])->name('admin.users.index');
                Route::get('/create', [UsersController::class, 'create'])->name('admin.users.create');
                Route::post('/store', [UsersController::class, 'store'])->name('admin.users.store');
                Route::get('/{id}/show', [UsersController::class, 'show'])->name('admin.users.show');
                Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
                Route::put('/{user}/update', [UsersController::class, 'update'])->name('admin.users.update');
                Route::delete('/{id}/destroy', [UsersController::class, 'destroy'])->name('admin.users.destroy');
            });

            //!maintenance packages
            Route::prefix('/packages')->group(function () {
                Route::get('/', [MaintenancePackageController::class, 'index'])->name('admin.packages.index');
                Route::get('/create', [MaintenancePackageController::class, 'create'])->name('admin.packages.create');
                Route::post('/store', [MaintenancePackageController::class, 'store'])->name('admin.packages.store');
                Route::get('/{id}/edit', [MaintenancePackageController::class, 'edit'])->name('admin.packages.edit');
                Route::put('/{id}/update', [MaintenancePackageController::class, 'update'])->name('admin.packages.update');
                Route::delete('/{id}/destroy', [MaintenancePackageController::class, 'destroy'])->name('admin.packages.destroy');
            });
        //! service providers
            Route::prefix('/service_providers')->group(function () {
            Route::get('/', [ServiceProvidersController::class, 'index'])->name('admin.service_providers.index');
            Route::get('/create', [ServiceProvidersController::class, 'create'])->name('admin.service_providers.create');
            Route::post('/store', [ServiceProvidersController::class, 'store'])->name('admin.service_providers.store');
            Route::get('/{serviceProvider}/edit', [ServiceProvidersController::class, 'edit'])->name('admin.service_providers.edit');
            Route::put('/{serviceProvider}/update', [ServiceProvidersController::class, 'update'])->name('admin.service_providers.update');
            Route::delete('/{serviceProvider}/destroy', [ServiceProvidersController::class, 'destroy'])->name('admin.service_providers.destroy');
            });
        });
    });
});


// Route::prefix('service_provider')->middleware(['auth', 'verified', 'rolemanager:service_provider'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('service_provider.index');
//     })->name('service_provider.dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/frontend.php';
require __DIR__.'/user.php';
