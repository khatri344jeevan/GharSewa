<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Payment;

class UserPaymentController extends \App\Http\Controllers\Controller
{
    public function initiatePayment(Request $request)
    {
        //fetch booking
        $booking = Booking::with('package')->findOrFail($request->booking_id);

        // Prevent payment if already paid
        if ($booking->status === 'paid') {
            return redirect()->route('user.dashboard')->with('error', 'This booking has already been paid.');
        }

        //fetch order and amount
        $amount = $booking->package->price * 100; // in paisa
        $orderId = 'ORDER_' . $booking->id; // or generate a UUID

        // Payload for Khalti
        $payload = [
            // Set return_url to the verifyPayment route, which Khalti will redirect to after payment
            "return_url" => route('user.khalti.verify'), // Make sure this route exists and points to verifyPayment
            "website_url" => config('app.url'),
            "amount" => $amount,
            "purchase_order_id" => $orderId,
            "purchase_order_name" => "GharSewa Booking",
            "customer_info" => [
                "name" => auth()->user()->name,
                "email" => auth()->user()->email,
                "phone" => auth()->user()->phone,
            ],
            "product_details" => [
                [
                    "identity" => "booking_" . $booking->id,
                    "name" => $booking->package->title ?? 'Service',
                    "total_price" => $amount,
                    "quantity" => 1,
                    "unit_price" => $amount,
                ]
            ]
        ];

        // Khalti API URL
        $khaltiApiUrl = "https://dev.khalti.com/api/v2/epayment/initiate/";

        // Send request to Khalti
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . config('services.khalti.secret'), // Use config/services.php for Khalti secret
            'Content-Type' => 'application/json',
        ])->post($khaltiApiUrl, $payload);

        // Handle Response with error checking
        if ($response->successful()) {
            $data = $response->json();
            // Check if payment_url exists in response
            if (!isset($data['payment_url'])) {
                return back()->with('error', 'Khalti did not return a payment URL. Response: ' . json_encode($data));
            }
            // Store pidx in booking
            $booking->update(['khalti_pidx' => $data['pidx']]);
            return redirect($data['payment_url']); // Redirect user to Khalti checkout
        } else {
            // Show error from Khalti response for debugging
            return back()->with('error', 'Khalti payment initiation failed: ' . $response->body());
        }
    }

    //verify the payment
    public function verifyPayment(Request $request)
    {
        // Validate the request
        $request->validate([
            'pidx' => 'required|string',
            'status' => 'required|string',
        ]);

        $pidx = $request->pidx;

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . config('services.khalti.secret'),
            'Content-Type' => 'application/json',
        ])->post("https://dev.khalti.com/api/v2/epayment/verify/", [
            'pidx' => $pidx,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Check if the payment was successful
            if ($data['status'] === 'Completed') {
                // Fetch the booking using pidx or other identifiers
                $booking = Booking::where('khalti_pidx', $request->pidx)->first();

                if ($booking) {
                    // Update booking status to paid
                    $booking->update([
                        'status' => 'paid',
                        'khalti_pidx' => $pidx, // for record keeping
                        'paid_at' => now(),
                    ]);

                    // Store payment in payments table
                    Payment::create([
                        'booking_id'     => $booking->id,
                        'user_id'        => $booking->user_id,
                        'package_id'     => $booking->package_id,
                        'amount'         => $data['total_amount'],
                        'payment_method' => 'Khalti',
                        'payment_status' => 'success',
                        'payment_date'   => now(),
                    ]);

                    return redirect()->route('user.Payment.index')->with('success', 'Payment successful.');
                } else {
                    return redirect()->route('user.Payment.index')->with('error', 'Booking not found.');
                }
            } else {
                return redirect()->route('user.Payment.index')->with('error', 'Payment failed.');
            }
        } else {
            return redirect()->route('user.Payment.index')->with('error', 'Payment verification failed.');
        }
    }

    public function p_index()
    {

         $payments = Payment::where('user_id', Auth::id())->latest()->get();

        return view('user.Payment.index', compact('payments'));
    }

    public function khaltiPay($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'paid') {
            return redirect()->route('user.dashboard')->with('error', 'This booking has already been paid.');
        }

        return redirect()->route('user.khalti.initiate', ['booking_id' => $id]);
    }
}
