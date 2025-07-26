<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\BookingVerified;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function verifyBooking($id)
    {
        $booking = Booking::with('user')->findOrFail($id); // Eager load the user
        $booking->status = 'approved';
        $booking->save();

        $booking->refresh(); // Refresh model and relationships

        // Notify user
        if ($booking->user) {
            $booking->user->notify(new BookingVerified($booking));
        }

        return back()->with('success', 'Booking verified and user notified.');
    }

}
