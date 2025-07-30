<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\BookingDetail;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Property;
use App\Models\User;

class TaskController extends Controller{

    public function t_index(){
        $user = Auth::user();

        // Find or create service provider record for current user
        $serviceProvider = \App\Models\ServiceProvider::firstOrCreate(
            ['email' => $user->email],
            [   'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
                'specialization' => 'General Services',
                'bio' => 'Service provider'
            ]
        );



        // Get tasks for the current service provider with nested relationships
        $tasks = Task::with([
            'booking.user',
            'booking.package',
            'booking.property'
        ])->where('provider_id', $serviceProvider->id)->get();

        return view('service_provider.tasks.index', compact('tasks', 'serviceProvider'));
    }

    public function t_create(){
        // Get available bookings
        $bookings = Booking::with(['user', 'package', 'property'])->get();

        return view('service_provider.tasks.create', compact('bookings'));
    }

    public function t_edit($id){
        $user = Auth::user();

        // Find service provider record for current user
        $serviceProvider = \App\Models\ServiceProvider::where('email', $user->email)->first();

        if (!$serviceProvider) {
            abort(403, 'Service provider not found');
        }

        $task = Task::with([
            'booking.user',
            'booking.package',
            'booking.property'
        ])->findOrFail($id);

        // Ensure the task belongs to the current service provider
        if ($task->provider_id !== $serviceProvider->id) {
            abort(403, 'Unauthorized');
        }

        return view('service_provider.tasks.edit', compact('task'));
    }

    public function t_store(Request $request){
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'scheduled_time' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'remarks' => 'nullable|string'
        ]);

        $user = Auth::user();

        // Find or create service provider record for current user
        $serviceProvider = \App\Models\ServiceProvider::firstOrCreate(
            ['email' => $user->email],
            [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
                'specialization' => 'General Services',
                'bio' => 'Service provider'
            ]
        );

        Task::create([
            'booking_id' => $request->booking_id,
            'provider_id' => $serviceProvider->id,
            'scheduled_time' => $request->scheduled_time,
            'status' => $request->status,
            'remarks' => $request->remarks
        ]);

        return redirect()->route('service_provider.tasks.index')->with('success', 'Task created successfully!');
    }

    public function t_update(Request $request, $id){
        $request->validate([
            'scheduled_time' => 'nullable|date',
            'completed_time' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'remarks' => 'nullable|string'
        ]);

        $user = Auth::user();

        // Find service provider record for current user
        $serviceProvider = \App\Models\ServiceProvider::where('email', $user->email)->first();

        if (!$serviceProvider) {
            abort(403, 'Service provider not found');
        }

        $task = Task::findOrFail($id);

        // Ensure the task belongs to the current service provider
        if ($task->provider_id !== $serviceProvider->id) {
            abort(403, 'Unauthorized');
        }

        $task->update([
            'scheduled_time' => $request->scheduled_time,
            'completed_time' => $request->completed_time,
            'status' => $request->status,
            'remarks' => $request->remarks
        ]);

        return redirect()->route('service_provider.tasks.index')->with('success', 'Task updated successfully!');
    }


        // public function t_show(){

        // }

        // public function  t_show(){

        // }



}
