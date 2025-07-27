<?php
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserPropertyController;
use App\Http\Controllers\User\UserBookingController;
use App\Http\Controllers\User\UserPaymentController;






Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:user'])
    ->name('user.dashboard');

Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {

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

 Route::get('/booking/{id}', [UserBookingController::class, 'b_show'])
 ->name('user.Bookings.b_show');

 Route::get('/booking/task/{id}', [UserBookingController::class, 'b_task'])
 ->name('user.Bookings.b_task');

 Route::get('/payment/index',[UserPaymentController::class,'p_index'])
 ->name('user.Payment.index');
// Move this route inside the middleware group for authentication and role checking
// Route::post('/payment/khalti/{id}', [UserPaymentController::class, 'khaltiPay'])
//     ->name('user.Bookings.khalti_pay');

// Route::post('/khalti/initiate', [UserPaymentController::class, 'initiatePayment'])
//     ->name('user.khalti.initiate');

// Route::get('/payment/verify', [UserPaymentController::class, 'verifyPayment'])
//     ->name('user.khalti.verify');

 //Route::get('/payment', [\App\Http\Controllers\User\UserPaymentController::class, 'p_index'])->name('user.payment.index');
    Route::get('/payment/khalti/{id}', [\App\Http\Controllers\User\UserPaymentController::class, 'khaltiPay'])->name('user.khalti.pay');
    Route::get('/payment/initiate', [\App\Http\Controllers\User\UserPaymentController::class, 'initiatePayment'])->name('user.khalti.initiate');
    Route::match(['get', 'post'], '/payment/verify', [\App\Http\Controllers\User\UserPaymentController::class, 'verifyPayment'])->name('user.khalti.verify');

 //   Route::get('/dashboard', [\App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('user.dashboard');


});
