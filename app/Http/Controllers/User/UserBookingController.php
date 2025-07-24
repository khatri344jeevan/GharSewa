<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Property;

class UserBookingController extends Controller
{
    /**
     * Display a list of user bookings.
     */
    public function b_index()
    {
        $user = Auth::user();
        $bookings = $user->bookings()->with('bookingDetails','property')->latest()->paginate(10);

        return view('user.Bookings.index', compact('bookings'));

    }

    /**
     * Show form to create a new booking.
     */
    public function b_create()
    {
        $user = Auth::user();

        $properties = $user->properties()->get();

        if ($properties->isEmpty()) {
            return redirect()->route('user.Properties.p_index')
                ->with('error', 'You must add a property before booking a package.');
        }

        $packages = Package::all();

        return view('user.Bookings.create', compact('properties', 'packages'));
    }

    /**
     * Store a new booking.
     */
    public function b_store(Request $request)
    {
        $request->validate([
            'property_id'   => 'required|exists:properties,id',
            'package_id'    => 'required|exists:packages,id',
            'booking_date'  => 'required|date|after_or_equal:today',
        ]);

        $user = Auth::user();

        $property = $user->properties()->where('id', $request->property_id)->first();
        if (!$property) {
            return redirect()->back()->withErrors(['property_id' => 'Invalid property selection.']);
        }

        Booking::create([
            'user_id'       => $user->id,
            'property_id'   => $request->property_id,
            'package_id'    => $request->package_id,
            'booking_date'  => $request->booking_date,
            'status'        => 'pending',
        ]);

        return redirect()->route('user.Bookings.b_index')->with('success', 'Booking successfully created!');
    }

    /**
     * Show detailed view of a specific booking with provider info.
     */
    public function b_show($id)
    {
        $user = Auth::user();



        $booking = Booking::with('bookingDetails.provider')
                    ->where('user_id', $user->id)
                    ->where('id', $id)
                    ->firstOrFail();

        return view('user.Bookings.show', compact('booking'));
    }
}
