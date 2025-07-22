<?php
// app/Http/Controllers/ServiceProvider/ProfileController.php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's main profile page.
     * This method gets the logged-in user's data and passes it to the view.
     */
    public function show()
    {
        // Get the currently authenticated user.
        $user = Auth::user();
        
        // Return the view and pass the user data to it.
        return view('service_provider.profile.profile', compact('user'));
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('service_provider.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information in the database.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the data from the form.
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Max 2MB image
        ]);

        // Handle the profile photo upload if a new one was provided.
        if ($request->hasFile('avatar')) {
            // Store the uploaded file in the 'public/avatars' folder
            // and save the path to the database.
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        // Update the user's information.
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->bio = $request->bio;
        
        // Save all the changes to the database.
        $user->save();

        // Redirect the user back to their profile page with a success message.
        return redirect()->route('service-provider.profile.show')->with('status', 'Profile updated successfully!');
    }
}