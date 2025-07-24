<?php
namespace App\Http\Controllers\ServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function assignTask(Request $request)
    {
        $providerId = $request->input('provider_id'); // Get the provider being hired
        $title = $request->input('title');            // Task title from admin form
        $description = $request->input('description');// Task details from admin form

        $task = new Task();
        $task->title = $title;
        $task->description = $description;
        $task->service_provider_id = $providerId;
        $task->status = "pending"; // default
        $task->save();

        return back()->with('success', 'Task assigned successfully!');
    }
}
