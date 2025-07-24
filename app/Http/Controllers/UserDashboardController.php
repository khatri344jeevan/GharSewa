<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $propertyCount = $user->properties()->count();

    //     return view('user.dashboard', compact('propertyCount'));
    //         // return 'User dashboard controller is working';

    // }
    public function index()
    {
        $user = Auth::user();

        // Property count
        $propertyCount = $user->properties()->count();

        // Upcoming services with status 'pending'
        $upcomingServices = Task::whereHas('booking', function ($query) use ($user) {
        $query->where('user_id', $user->id);
         })
           ->where('status', 'pending')
           ->count();

        // Pending tasks where related booking belongs to this user
        $pendingtask = Task::whereHas('booking', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('status', 'pending')
            ->count();

        // Count of payments
        $pendingPayments = $user->payments()->count();

        // Pass all data to the view
        return view('user.dashboard', compact(
            'propertyCount',
            'upcomingServices',
            'pendingtask',
            'pendingPayments'
        ));

    }
     //property controller starts here
         public function p_index(){

            return view('user.Properties.index');

         }
          public function p_create(){
            return view('user.Properties.create');
         }

         public function p_update(){
            return view('user.Properties.update');
         }

         public function p_edit(){
            return view('user.Properties.edit');
         }

         public function p_store(Request $request)
         {
           //Validate the input
            $request->validate([
             'title' => 'required|string|max:255',
             'address' => 'required|string',
             'type' => 'required|string',
             'maplocation' => 'nullable|string',
    ]);

    //Create a new property linked to the currently authenticated user
    $request->user()->properties()->create([
        'title' => $request->title,
        'address' => $request->address,
        'type' => $request->type,
        'maplocation' => $request->maplocation,
    ]);

    // Redirect to the property listing with a success message
    return redirect()->route('user.Properties.p_index')->with('success', 'Property registered successfully!');
}


}

