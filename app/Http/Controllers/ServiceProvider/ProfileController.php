<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{

    public function show()
    {

        $user = Auth::user();


        return view('service_provider.profile.profile', compact('user'));
    }


    public function edit()
    {

        $user = Auth::user();


        return view('service_provider.profile.edit', compact('user'));
    }


    public function update(Request $request)
    {

        $user = Auth::user();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],

            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);


        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->bio = $request->bio;


        $user->email = $request->email;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }


        $user->save();

        
        return redirect()->route('service_provider.profile.edit')->with('status', 'profile-updated');
    }
}
