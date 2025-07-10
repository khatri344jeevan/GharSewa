<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard based on user role
     */
    public function index()
    {
        $user = Auth::user();

        // Return different views based on user role, but same URL
        switch ($user->role) {
            case 'admin':
                return view('admin.index');

            case 'service_provider':
                return view('service_provider.index');

             case 'user':
            default:
                $propertyCount = $user->properties()->count();
                $upcomingServices = $user->bookings()->where('status', 'pending')->count();
                // $pendingtask = $user->tasks()->where('status', 'pending')->count();
                $pendingtask = \App\Models\Task::whereHas('booking', function($query) use ($user)
                 {
                     $query->where('user_id', $user->id);
                     }) ->where('status', 'pending')->count();

                $pendingPayments = $user->payments()->count();

                // return view('user.dashboard', compact('propertyCount') , compact('upcomingServices'), compact('pendingtask'),compact('pendingPayments'));
                return view('user.dashboard', compact(
                                   'propertyCount',
                                   'upcomingServices',
                                   'pendingtask',
                                   'pendingPayments'
                                ));

        }
    }

}
