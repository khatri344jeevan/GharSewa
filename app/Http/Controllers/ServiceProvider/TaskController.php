<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task; // Make sure to import the Task model

class TaskController extends Controller
{
    /**
     * Display a list of tasks assigned to the service provider.
     */
    public function index()
    {
        // Get the ID of the currently logged-in service provider
        $userId = Auth::id();

        // Find all tasks assigned to this user
        // I'm assuming the foreign key is 'user_id' in your 'tasks' table.
        // If it's named something else (like 'service_provider_id'), change it here.
        $tasks = Task::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        // Return the tasks view and pass the tasks to it
        return view('service_provider.tasks.index', compact('tasks'));
    }
}