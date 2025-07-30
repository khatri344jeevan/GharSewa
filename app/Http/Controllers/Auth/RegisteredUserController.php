<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'phone' => ['nullable', 'string', 'max:20'],
        'address' => ['nullable', 'string', 'max:255'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);
    $authUserRole = Auth::user()->role;

    if ($authUserRole === 'admin') {
        return redirect()
            ->intended(route('admin.dashboard', false))
            ->with('success', 'Welcome Admin! Registration successful 🎉');
    } elseif ($authUserRole === 'service_provider') {
        return redirect()
            ->intended(route('service_provider.dashboard', false))
            ->with('success', 'Welcome Service Provider! Registration successful 🎉');
    } else {
        return redirect()
            ->intended(route('user.dashboard', false))
            ->with('success', 'Welcome User! Registration successful 🎉');
    }
}


}
