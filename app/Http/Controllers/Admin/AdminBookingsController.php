<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;

class AdminBookingsController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'property', 'package', 'bookingDetails.provider'])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    
    public function show($id)
    {
        $booking = Booking::with(['user', 'property', 'package', 'bookingDetails.provider'])
            ->findOrFail($id);

        return view('admin.bookings.view', compact('booking'));
    }



    public function assign(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $serviceProviders = ServiceProvider::all();

        if ($request->isMethod('post')) {
            $request->validate([
                'provider_id' => 'required|exists:service_providers,id',
                'scheduled_date' => 'required|date|after:now',
                'note' => 'nullable|string|max:500'
            ]);

            BookingDetail::create([
                'booking_id' => $booking->id,
                'provider_id' => $request->provider_id,
                'scheduled_date' => $request->scheduled_date,
                'note' => $request->note
            ]);

            $booking->update(['status' => 'confirmed']);

            Task::create([
                'booking_id' => $booking->id,
                'provider_id' => $request->provider_id,
                'scheduled_time' => $request->scheduled_date,
                'status' => 'Pending',
            ]);

            return redirect()->route('admin.bookings.index')
                ->with('success', 'Service provider assigned successfully!');
        }

        return view('admin.bookings.assigntask', compact('booking', 'serviceProviders'));
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'approved']);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking approved successfully!');
    }
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'rejected']);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking rejected successfully!');
    }

}
