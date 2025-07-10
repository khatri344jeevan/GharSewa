<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;

Route::get('/', function () {
    return view('welcome');
});

// Single dashboard route for all roles - content changes based on user role
// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
// Route::get('/user/dashboard',function(){
//     return view('user.index');
// })->middleware(['auth', 'verified', 'rolemanager:user'])->name('user.dashboard');

// Route::get('/admin/dashboard',function(){
//     return view('admin.index');
// })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.dashboard');

// Route::get('/service_provider/dashboard',function(){
//     return view('service_provider.index');
// })->middleware(['auth', 'verified', 'rolemanager:service_provider'])->name('service_provider.dashboard');`
Route::prefix('user')->middleware(['auth', 'verified', 'rolemanager:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('user.dashboard');
});

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
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



