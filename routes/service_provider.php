<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceProvider\DashboardController;
use App\Http\Controllers\ServiceProvider\ProfileController;
use App\Http\Controllers\ServiceProvider\TaskController;

Route::middleware(['auth', 'verified', 'rolemanager:service_provider'])
    ->prefix('service-provider')
    ->name('service-provider.')
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
});