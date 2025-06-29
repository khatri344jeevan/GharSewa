<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\service_provider\Service_ProviderMainController;


Route::get('/', function () {
    return view('welcome');
});

// Single dashboard route for all roles - content changes based on user role
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//<--------------------SERVICE PROVIDER STARTS--------------------------------->


//SERVICE PROVIDER DASHBOARD
// Route::get('/service-provider/dashboard', function () {
//     return view('service_provider.service_provider');
// })->name('service_provider.dashboard');

//SERVICE PROVIDER MIDDLEWARE 

Route::middleware(['auth', 'verified', 'rolemanager:service_provider'])->group(function () {
    Route::controller(Service_ProviderMainController::class)->group(function () {
        Route::prefix('service_provider')->group(function () {
            Route::get('/dashboard', 'serviceProvider')->name('service_provider.dashboard');
        });
    });
});


//<--------------------SERVICE PROVIDER ENDS--------------------------------->
require __DIR__.'/auth.php';

