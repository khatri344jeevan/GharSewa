<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserDashboardController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $propertyCount = $user->properties()->count();

    //     return view('user.dashboard', compact('propertyCount'));
    //         // return 'User dashboard controller is working';

    // }
    public function index()
    {
        $user = Auth::user();

        // Property count
        $propertyCount = $user->properties()->count();

        // Upcoming services with status 'pending'
        $upcomingServices = $user->bookings()
            ->where('status', 'pending')
            ->count();

        // Pending tasks where related booking belongs to this user
        $pendingtask = Task::whereHas('booking', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('status', 'pending')
            ->count();

        // Count of payments
        $pendingPayments = $user->payments()->count();

        // Pass all data to the view
        return view('user.dashboard', compact(
            'propertyCount',
            'upcomingServices',
            'pendingtask',
            'pendingPayments'
        ));
    }

}

