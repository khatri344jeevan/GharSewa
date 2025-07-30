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

        $booking = Booking::with('package')->findOrFail($request->booking_id);


        if ($booking->status === 'paid') {
            return redirect()->route('user.dashboard')->with('error', 'This booking has already been paid.');
        }


        $amount = $booking->package->price * 100;
        $orderId = 'ORDER_' . $booking->id;


        $payload = [

            "return_url" => route('user.khalti.verify'),
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


        $khaltiApiUrl = "https://dev.khalti.com/api/v2/epayment/initiate/";


        $response = Http::withHeaders([
            'Authorization' => 'Key ' . config('services.khalti.secret'),
            'Content-Type' => 'application/json',
        ])->post($khaltiApiUrl, $payload);


        if ($response->successful()) {
            $data = $response->json();

            if (!isset($data['payment_url'])) {
                return back()->with('error', 'Khalti did not return a payment URL. Response: ' . json_encode($data));
            }

            $booking->update(['khalti_pidx' => $data['pidx']]);
            return redirect($data['payment_url']);
        } else {

            return back()->with('error', 'Khalti payment initiation failed: ' . $response->body());
        }
    }


    public function verifyPayment(Request $request)
    {

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




        $data = [
            'status' => $request->status,
            'pidx' => $request->pidx,
            'total_amount' => $request->amount ?? null,
        ];
        $user = Auth::user();


            if ($data['status'] === 'Completed') {

                $booking = Booking::where('user_id', Auth::id())
                    ->latest()
                    ->first();

                if ($booking) {

                    $booking->update([
                        'status' => 'paid',
                       'khalti_pidx' => $pidx,

                     ]);

                   
                    Payment::create([
                        'booking_id'     => $booking->id,
                        'user_id'        => $booking->user_id,
                        'package_id'     => $booking->package_id,
                        'amount'         => $data['total_amount']/100,
                        'payment_method' => 'Khalti',
                        'payment_status' => 'success',
                        'payment_date'   => now(),
                    ]);

                    return redirect()->route('user.Payment.index')->with('success', 'Payment successful.');
                } else {
                    return redirect()->route('user.Payment.index')->with('error', 'Booking not found.');
                }
            }
            // } else {
            //     return redirect()->route('user.Payment.index')->with('error', 'Payment failed.');
            // }
        // } else {
        //     return redirect()->route('user.Payment.index')->with('error', 'Payment verification failed.');
        // }
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

