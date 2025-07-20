<?php
use App\Http\Controllers\UserDashboardController;


// Route::get('/dashboard', [UserDashboardController::class, 'index'])
//     ->middleware(['auth', 'verified', 'rolemanager:user'])
//     ->name('user.dashboard');

Route::middleware(['auth', 'verified', 'rolemanager:user'])->group(function () {
    Route::controller(UserDashboardController::class)->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/dashboard', 'index')->name('user.dashboard');
            // Route::get('/profile', 'profile')->name('user.profile');


        });
    });
});
