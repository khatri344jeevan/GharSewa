<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceProvider\DashboardController;

Route::get('service-provider',  function(){
    return view('service_provider.layouts.sidenav');
});

Route::middleware(['auth', 'verified', 'rolemanager:service_provider'])
    ->prefix('service-provider')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('service_provider.dashboard');
    });
