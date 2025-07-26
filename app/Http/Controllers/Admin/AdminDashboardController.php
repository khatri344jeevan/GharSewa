<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Property;
use App\Models\Booking;
use App\Models\Package;
use App\Models\ServiceProvider;
use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminDashboardController extends Controller{
    public function dashboard(){
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        // $totalServiceProviders = User::where('role', 'service_provider')->count();
        $totalProperties = Property::count();
        $totalBookings = Booking::count();
        $totalPackages = Package::count();
        $totalServiceProviders = ServiceProvider::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $approvedBookings = Booking::where('status', 'confirmed')->count();

        return view('admin.index', compact('totalUsers', 'totalAdmins', 'totalServiceProviders', 'totalProperties', 'totalBookings', 'totalPackages', 'pendingBookings', 'approvedBookings'));

    }
}
