<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->role;

        // Check if user has the required role
        if ($authUserRole === $role) {
            return $next($request);
        }

        // If user doesn't have permission, redirect to their appropriate dashboard
        // But since we now use unified dashboard, just redirect to dashboard


        // return redirect()->route('dashboard');


        // return redirect()->route('service_provider.dashboard');

         if ($authUserRole === 'admin') {
        return redirect()->route('admin.dashboard'); // if defined
    } elseif ($authUserRole === 'customer') {
        return redirect()->route('customer.dashboard'); // if defined
    }

    // Fallback
    abort(403, 'Unauthorized');

    }
}
