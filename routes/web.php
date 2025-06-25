<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:user'])->name('dashboard');

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

// Route::get('admin/dashboard', [\App\Http\Controllers\HomeController::class, 'index']);
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
// });

// Route::prefix('service_provider')->group(function () {
//     Route::get('/dashboard', [HomeController::class, 'index'])->name('service_provider.dashboard');
// });




