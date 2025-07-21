<?php
namespace App\Http\Controllers\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        return view('service_provider.profile.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('service_provider.profile.edit', ['user' => Auth::user()]);
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);
        $user->update($request->only('name', 'email'));
        return redirect()->route('service-provider.profile.show')->with('success', 'Profile updated successfully.');
    }
    
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->route('service-provider.profile.edit')->with('password_success', 'Password updated successfully.');
    }
}