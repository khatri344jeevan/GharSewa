<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\BookingDetail;

class TaskController extends Controller
{
    // task assign garne to login service provider 
    public function index()
    {
        $user = Auth::user(); //user lai login gar 

        // booking details get from model
        $bookings = BookingDetail::with(['task.package', 'task.property']) // Nested relationships
            ->where('provider_id', $user->id)
            ->get();

        return view('service_provider.tasks.index', compact('bookings'));
    }

    // Optional: Assign a new task (usually used by Admin)
    public function assignTask(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->service_provider_id = $request->input('provider_id');
        $task->status = "pending";
        $task->save();

        return back()->with('success', 'Task assigned successfully!');
    }
}
