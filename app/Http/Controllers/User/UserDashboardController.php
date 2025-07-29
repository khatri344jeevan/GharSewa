<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $propertyCount = $user->properties()->count();

        $confirmedBookings = $user->bookings()
            ->where('status', 'confirmed')
            ->count();

        // $upcomingServices = $user->booking_details()
        //     ->where('status', 'pending')
        //     ->count();

        // $upcomingServices = Task::whereHas('booking', function ($query) use ($user) {
        // $query->where('user_id', $user->id);
        //  })
        //    ->where('status', 'pending')
        //    ->count();


        //tasks count logic
           $upcomingServices = Task::whereHas('booking', function ($query) use ($user) {
              $query->where('user_id', $user->id)
                ->where('status', 'pending');
            })->count();

            $totaltask = Task::whereHas('booking', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count();

           $completedTasks = Task::whereHas('booking', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->where('status', 'completed');
            })->count();



            //bookings count logic

        $totalBookings = $user->bookings()->count();

        $approvedBookings = $user->bookings()
            ->where('status', 'confirmed','approved')
            ->count();


        $pendingBookings = $user->bookings()
            ->where('status', 'pending')
            ->count();

         // Payments count logic

        $totalPayments = $user->payments()->count();

        // Fetch all notifications, unread first
        $notifications = $user->notifications()->take(10)->get();

        // Optionally, mark as read when dashboard is visited
        // $user->unreadNotifications->markAsRead();

        return view('user.dashboard', compact(
            'propertyCount',
            'confirmedBookings',
            'upcomingServices',
            'totaltask',
            'completedTasks',
            'totalBookings',
            'approvedBookings',
            'pendingBookings',
            'totalPayments',
            'notifications'
        ));
    }
}
