<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceProvider\ServiceProviderDashboardController;

//main dashboard route
Route::get('/service_provider/dashboard', [ServiceProviderDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:service_provider'])
    ->name('service_provider.dashboard');


//show() function call garna ko lagi route
Route::get('/service_provider/profile/{id}', [ServiceProviderDashboardController::class, 'show'])
    ->middleware(['auth', 'verified', 'rolemanager:service_provider'])
    ->name('service_provider.profile');
    
Route::get('/service_provider/profile/edit', [ServiceProviderDashboardController::class, 'edit'])
    ->middleware(['auth', 'verified', 'rolemanager:service_provider'])
    ->name('service_provider.profile.edit');
    
Route::get('/service_provider/profile/{id}', [ServiceProviderDashboardController::class, 'update'])
    ->middleware(['auth', 'verified', 'rolemanager:service_provider'])
    ->name('service_provider.profile.update');    



// Route::get('service-provider', function(){
//     return view('service_provider.layouts.sidebar');
// });

// Route::get('service-provider/dashboard', function(){
//     return view('service_provider.dashboard');
// })->name('service_provider.dashboard');

// Route::get('service-provider/myTasks', function(){
//     return view('service_provider.tasks.task');
// })->name('service_provider.myTasks');
