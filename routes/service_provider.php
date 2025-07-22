<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceProvider\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// A simple welcome page
Route::get('/', function () {
    return view('welcome');
});

// All authentication routes (login, register, etc.) are included here.
require __DIR__.'/auth.php';

// --- SERVICE PROVIDER ROUTES ---
// We group all service provider routes together for better organization.
// They all require the user to be logged in ('auth').
// Their URLs will all start with '/service-provider'.
// Their route names will all start with 'service-provider.'.
Route::middleware(['auth'])->prefix('service-provider')->name('service-provider.')->group(function () {

    // The main dashboard page.
    Route::get('/dashboard', function () {
        return view('service_provider.dashboard'); // We will create this view next.
    })->name('dashboard');

    // The route to SHOW the profile.
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // The route to show the EDIT form.
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // The route to handle the UPDATE form submission.
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

});