<?php 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\ServiceProvider\ServiceProviderDashboardController; 
use App\Http\Controllers\ServiceProvider\ServiceProviderProfileController;   
use App\Http\Controllers\ServiceProvider\TaskController;

//main dashboard route 
Route::get('/service_provider/dashboard', [ServiceProviderDashboardController::class, 'index'])     
    ->middleware(['auth', 'verified', 'rolemanager:service_provider'])     
    ->name('service_provider.dashboard');   

// Profile routes
Route::middleware(['auth', 'verified', 'rolemanager:service_provider'])->group(function () {
    // Show profile
    Route::get('/service_provider/profile', [ServiceProviderProfileController::class, 'show'])
        ->name('service_provider.profile');
    
    // Edit profile form
    Route::get('/service_provider/profile/edit', [ServiceProviderProfileController::class, 'edit'])
        ->name('service_provider.profile.edit');
    
    // Update profile
    Route::put('/service_provider/profile', [ServiceProviderProfileController::class, 'update'])
        ->name('service_provider.profile.update');
});


Route::get('/service_provider/tasks', [TaskController::class, 'index'])     
    ->middleware(['auth', 'verified', 'rolemanager:service_provider'])     
    ->name('service_provider.index'); 

Route::get('/service_provider/create', [TaskController::class, 'index'])     
    ->middleware(['auth', 'verified', 'rolemanager:service_provider'])     
    ->name('service_provider.tasks.create'); 


//     Route::get('/dashboard', function () {
//     return redirect()->route('service_provider.dashboard');
// })->name('dashboard');

    // Route::get('/dashboard', fn () => redirect()->route('service_provider.dashboard'))->name('dashboard');

// Commented routes (keeping as requested)
// Route::get('service-provider', function(){ 
//     return view('service_provider.layouts.sidebar'); 
// }); 

// Route::get('service-provider/dashboard', function(){ 
//     return view('service_provider.dashboard'); 
// })->name('service_provider.dashboard'); 

// Route::get('service-provider/myTasks', function(){ 
//     return view('service_provider.tasks.task'); 
// })->name('service_provider.myTasks');

