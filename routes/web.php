<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminMainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'verified', 'rolemanager:user'])->name('user.dashboard');

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
            Route::get('/users', [UsersController::class, 'manage_users'])->name('admin.users');
        });
    });
});


Route::prefix('service_provider')->middleware(['auth', 'verified', 'rolemanager:service_provider'])->group(function () {
    Route::get('/dashboard', function () {
        return view('service_provider.index');
    })->name('service_provider.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/frontend.php';
require __DIR__.'/user.php';
