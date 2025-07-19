<?php
use App\Http\Controllers\UserDashboardController;

Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:user'])
    ->name('user.dashboard');

Route::get('/properties',[UserDashboardController:: class, 'p_index'])
 ->name('user.Properties.p_index');

 Route::get('/properties/create',[UserDashboardController:: class, 'p_create'])
 ->name('user.Properties.p_create');

 Route::get('/properties/edit',[UserDashboardController:: class, 'p_edit'])
 ->name('user.Properties.p_edit');

 Route::get('/properties/update',[UserDashboardController:: class, 'p_update'])
 ->name('user.Properties.p_update');

 Route::post('/properties/store', [UserDashboardController::class, 'p_store'])
->name('user.Properties.p_store');
