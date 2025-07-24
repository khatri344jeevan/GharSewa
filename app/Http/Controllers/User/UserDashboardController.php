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

        // $upcomingServices = $user->booking_details()
        //     ->where('status', 'pending')
        //     ->count();

        // $upcomingServices = Task::whereHas('booking', function ($query) use ($user) {
        // $query->where('user_id', $user->id);
        //  })
        //    ->where('status', 'pending')
        //    ->count();

           $upcomingServices = Task::whereHas('booking', function ($query) use ($user) {
              $query->where('user_id', $user->id)
                ->where('status', 'pending');
            })->count();



        $pendingtask = Task::whereHas('booking', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('status', 'pending')
            ->count();

        $pendingPayments = $user->payments()->count();

        // Fetch all notifications, unread first
        $notifications = $user->notifications()->take(10)->get();

        // Optionally, mark as read when dashboard is visited
        // $user->unreadNotifications->markAsRead();

        return view('user.dashboard', compact(
            'propertyCount',
            'upcomingServices',
            'pendingtask',
            'pendingPayments',
            'notifications' ,
        ));
    }
}
