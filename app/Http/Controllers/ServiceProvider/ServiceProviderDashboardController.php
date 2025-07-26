<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceProviderDashboardController extends Controller
{

    public function index()
    {

        $user = Auth::user();


        return view('service_provider.dashboard', compact('user'));
    }

    public function myTask()
    {
        $providerId = Auth::user()->id; 


        $tasks = Task::where('provider_id', $providerId)->get();

        $totalTasks = Task::where('provider_id', $providerId)->count();

        $completedTasks = Task::where('provider_id', $providerId)
            ->where('status', 'completed')
            ->count();

        $pendingTasks = Task::where('provider_id', $providerId)
            ->where('status', 'pending')
            ->count();


        return view('service_provider.dashboard', compact(
            'tasks',
            'totalTasks',
            'completedTasks',
            'pendingTasks'
        ));
    }
}


// namespace App\Http\Controllers\ServiceProvider;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\ServiceProvider;
// use App\Models\Task;
// use Carbon\Carbon;

// class ServiceProviderDashboardController extends Controller
// {
//     public function index()
//     {
//         $user = Auth::user();

//         // Find the service provider record for the logged-in user
//         $provider = ServiceProvider::where('user_id', Auth::id())->first();

//         if (!$provider) {
//             // Redirect to home URL '/' with error message
//             return redirect('/')->with('error', 'Service Provider not found.');
//         }

//         $providerId = $provider->id;

//         // Get task counts
//         $totalTasks = Task::where('provider_id', $providerId)->count();
//         $completedTasks = Task::where('provider_id', $providerId)->where('status', 'Completed')->count();
//         $pendingTasks = Task::where('provider_id', $providerId)->where('status', 'Pending')->count();

//         // Monthly performance data (last 6 months)
//         $monthlyStats = Task::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
//             ->where('provider_id', $providerId)
//             ->where('status', 'Completed')
//             ->where('created_at', '>=', now()->subMonths(6))
//             ->groupBy('month')
//             ->orderBy('month')
//             ->get();

//         $months = [];
//         $counts = [];

//         foreach (range(1, 12) as $m) {
//             $months[] = date('F', mktime(0, 0, 0, $m, 10)); // Jan, Feb, ...
//             $match = $monthlyStats->firstWhere('month', $m);
//             $counts[] = $match ? $match->count : 0;
//         }

//         return view('service_provider.dashboard', compact(
//             'user',
//             'totalTasks',
//             'completedTasks',
//             'pendingTasks',
//             'months',
//             'counts'
//         ));
//     }
// }
