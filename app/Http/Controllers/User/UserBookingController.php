<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserBookingController extends Controller
{

  public function b_index()
{
    $user = Auth::user();


    $bookings = Booking::with(['package', 'property'])
        ->where('user_id', $user->id)
        ->latest()
        ->get();

    return view('user.Bookings.index', compact('bookings'));
}

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



    public function b_show($id)
{
    $user = Auth::user();

    $booking = Booking::with(['package', 'property'])
        ->where('user_id', $user->id)
        ->where('id', $id)
        ->firstOrFail();

    return view('user.Bookings.show', compact('booking'));
}
public function b_task($id)
{
    $user = Auth::user();

    $booking = Booking::with(['package', 'property', 'tasks.provider'])
        ->where('user_id', $user->id)
        ->where('id', $id)
        ->firstOrFail();

    return view('user.Bookings.task', compact('booking'));
}


}
