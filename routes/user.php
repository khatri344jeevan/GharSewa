<?php
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserPropertyController;
use App\Http\Controllers\User\UserBookingController;





Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:user'])
    ->name('user.dashboard');

    //property routing starts from here


Route::get('/properties',[UserPropertyController:: class, 'p_index'])
 ->name('user.Properties.p_index');

 Route::get('/properties/create',[UserPropertyController:: class, 'p_create'])
 ->name('user.Properties.p_create');

//  Route::get('/properties/delete',[UserPropertyController:: class, 'p_delete'])
//  ->name('user.Properties.p_delete');

//  Route::get('/properties/edit',[UserPropertyController:: class, 'p_edit'])
//  ->name('user.Properties.p_edit');

//   Route::put('/properties/update',[UserPropertyController:: class, 'p_update'])
//  ->name('user.Properties.p_update');

// Show the form
Route::get('/properties/{property}/edit', [UserPropertyController::class, 'p_edit'])
    ->name('user.Properties.p_edit');

// Handle the update
Route::put('/properties/{property}', [UserPropertyController::class, 'update'])
    ->name('user.Properties.update');



 Route::post('/properties/store', [UserPropertyController::class, 'p_store'])
->name('user.Properties.p_store');

// web.php
Route::delete('/properties/{property}', [UserPropertyController::class, 'destroy'])
    ->name('user.Properties.destroy');

//booking ko routing starts from here


Route::get('/booking',[UserBookingController::class, 'b_index'])
 ->name('user.Bookings.b_index');

  Route::get('/booking/create',[UserBookingController:: class, 'b_create'])
 ->name('user.Bookings.b_create');


 Route::post('/booking/store', [UserBookingController::class, 'b_store'])
->name('user.Bookings.b_store');

 Route::get('/booking/{id}', [UserBookingController::class, 'b_show'])->name('user.Bookings.b_show');



