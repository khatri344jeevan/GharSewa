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
        $providerId = Auth::user()->id;


        $totalTasks = Task::where('provider_id', $providerId)->count();

        $completedTasks = Task::where('provider_id', $providerId)
            ->where('status', 'completed')
            ->count();

        $pendingTasks = Task::where('provider_id', $providerId)
            ->where('status', 'pending')
            ->count();

        return view('service_provider.dashboard', compact(
            'user',
            'totalTasks',
            'completedTasks',
            'pendingTasks'
        ));
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


