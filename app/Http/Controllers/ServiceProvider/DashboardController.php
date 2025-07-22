<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service; // Import the models we will use
use App\Models\BookingDetail;

class DashboardController extends Controller
{
    /**
     * Show the service provider dashboard.
     */
    public function index()
    {
        // 1. Get the currently logged-in user
        $user = Auth::user();

        // 2. Find the provider profile using the relationship we defined
        $provider = $user->serviceProvider; // This is much cleaner!

        if (!$provider) {
            return "You are not registered as a service provider.";
        }

        // 3. Get the numbers for the summary cards
        $pendingBookings = $provider->tasks()->where('status', 'pending')->count();
        $completedJobs = $provider->tasks()->where('status', 'completed')->count();

        // 4. Get the list of upcoming bookings using our models
        $upcomingBookings = BookingDetail::with(['booking.user', 'service'])
            ->where('provider_id', $provider->id)
            ->where('status', '!=', 'completed')
            ->orderBy('scheduled_time', 'asc')
            ->get();

        // 5. Put all our data into one array to send to the view
        $data = [
            'providerName'      => $user->name,
            'pendingBookings'   => $pendingBookings,
            'completedJobs'     => $completedJobs,
            'totalServices'     => Service::count(), // Simple count of all services
            'totalEarnings'     => 500, // We will calculate this properly later
            'upcomingBookings'  => $upcomingBookings,
        ];

        // 6. Return the view and give it the data
        return view('service_provider.dashboard', $data);
    }
}