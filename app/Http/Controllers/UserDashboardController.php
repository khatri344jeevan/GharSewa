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


        $propertyCount = $user->properties()->count();


        $upcomingServices = Task::whereHas('booking', function ($query) use ($user) {
        $query->where('user_id', $user->id);
         })
           ->where('status', 'pending')
           ->count();


        $pendingtask = Task::whereHas('booking', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('status', 'pending')
            ->count();


        $pendingPayments = $user->payments()->count();


        return view('user.dashboard', compact(
            'propertyCount',
            'upcomingServices',
            'pendingtask',
            'pendingPayments'
        ));

    }

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

            $request->validate([
             'title' => 'required|string|max:255',
             'address' => 'required|string',
             'type' => 'required|string',
             'maplocation' => 'nullable|string',
    ]);


    $request->user()->properties()->create([
        'title' => $request->title,
        'address' => $request->address,
        'type' => $request->type,
        'maplocation' => $request->maplocation,
    ]);

    
    return redirect()->route('user.Properties.p_index')->with('success', 'Property registered successfully!');
}


}

