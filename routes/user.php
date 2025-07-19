<?php
use App\Http\Controllers\UserDashboardController;

Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:user'])
    ->name('user.dashboard');
