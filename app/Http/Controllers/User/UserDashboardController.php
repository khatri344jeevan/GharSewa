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

        $upcomingServices = $user->bookings()
            ->where('status', 'pending')
            ->count();

        $pendingtask = Task::whereHas('booking', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('status', 'pending')
            ->count();

        $pendingPayments = $user->payments()->count();

        return view('user.dashboard', compact(
            'propertyCount',
            'upcomingServices',
            'pendingtask',
            'pendingPayments'
        ));
    }
}
