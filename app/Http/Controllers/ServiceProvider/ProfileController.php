<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
     * Show the form for editing the profile.
     */
    public function edit()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Return the profile editing view, passing the user data
        return view('service_provider.profile.edit', compact('user'));
    }

    /**
     * Update the profile information.
     */
    public function update(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Make sure the email is unique, but ignore the current user's email
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            // Password is optional. If provided, it must be confirmed.
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // Update the user's name and email
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->bio = $request->bio;

        // Save all the changes to the database.
        $user->email = $request->email;

        // If a new password was entered, update it
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the changes to the database
        $user->save();

        // Redirect back to the profile page with a success message
        return redirect()->route('service_provider.profile.edit')->with('status', 'profile-updated');
    }
}
