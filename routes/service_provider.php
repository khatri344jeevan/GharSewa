<?php

// routes/web.php
use Illuminate\Support\Facades\Route;

Route::get('service-provider/dashboard', function () {
    return view('service_provider.layouts.layout');
})->name('service-provider.dashboard');

Route::get('service-provider/profile', function () {
    return view('service_provider.profile.profile');
})->name('service-provider.profile');
