<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    public function create(): View
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $authUserRole = Auth::user()->role;


    session()->flash('success', 'You have logged in successfully.');


    if ($authUserRole === 'admin') {
        session()->flash('success', 'Welcome back, Admin!');
        return redirect()->intended(route('admin.dashboard', absolute: false));
    } elseif ($authUserRole === 'service_provider') {
        return redirect()->intended(route('service_provider.dashboard', absolute: false));
    } else {
        return redirect()->intended(route('user.dashboard', absolute: false));
    }

    // if($request->user()->role === 'admin') {
    //     return redirect('admin/dashboard');
    //     // return redirect()->intended(route('admin.dashboard', absolute: false));
    // }
    // if ($request->user()->role === 'admin') {
    //     return redirect()->intended(route('admin.dashboard', absolute: false));
    // } elseif ($request->user()->role === 'service_provider') {
    //     return redirect()->intended(route('service_provider.dashboard', absolute: false));
    // }
}



    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
