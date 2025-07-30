<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\Task;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceProviderDashboardController extends Controller
{

   public function index()
    {
        $user = Auth::user();

        // Get or create service provider using the same logic as TaskController
        $serviceProvider = ServiceProvider::firstOrCreate(
            ['email' => $user->email],
            [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
                'specialization' => 'General Services',
                'bio' => 'Service provider'
            ]
        );

        $providerId = $serviceProvider->id;

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
        $user = Auth::user();

        // Get or create service provider using the same logic as TaskController
        $serviceProvider = ServiceProvider::firstOrCreate(
            ['email' => $user->email],
            [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
                'specialization' => 'General Services',
                'bio' => 'Service provider'
            ]
        );

        $providerId = $serviceProvider->id;

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


