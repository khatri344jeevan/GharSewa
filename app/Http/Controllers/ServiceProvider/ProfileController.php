<?php
namespace App\Http\Controllers\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function show() {
        // The profile page edits the User model's data.
        $providerUser = Auth::user();
        return view('service_provider.profile.show', compact('providerUser'));
    }

    public function update(Request $request) {
        $providerUser = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20', // Matches your 'users' table
            'address' => 'nullable|string|max:255',
        ]);
        // Update the User model
        $providerUser->update($request->only('name', 'phone', 'address'));
        return redirect()->route('service-provider.profile')->with('success', 'Profile updated successfully!');
    }
}