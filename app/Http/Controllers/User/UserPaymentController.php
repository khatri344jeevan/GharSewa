<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class UserPaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        //fetch booking
        $booking = Booking::with('package')->findOrFail($request->booking_id);

        //fetch order and amount
        $amount = $booking->package->price * 100; // in paisa
        $orderId = 'ORDER_' . $booking->id; // or generate a UUID

        // Payload for Khalti
        $payload = [
            "return_url" => route('user.dashboard'),
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
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post($khaltiApiUrl, $payload);

        // Handle Response
        if ($response->successful()) {
            $data = $response->json();

            // Optionally store pidx or log payment attempt here
            // $booking->update(['khalti_pidx' => $data['pidx']]);

            return redirect($data['payment_url']); // Redirect user to Khalti checkout
        } else {
            return back()->with('error', 'Khalti payment initiation failed.');
        }
    }
}
