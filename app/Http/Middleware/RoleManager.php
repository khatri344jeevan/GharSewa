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
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        $authUserRole= Auth::user()->role;
        switch ($role) {
            case 'admin':
                if ($authUserRole === 'admin') {
                    return $next($request);
                }
                break;

            case 'service_provider':
                if ($authUserRole === 'service_provider') {
                    return $next($request);
                }
                break;
            case 'user':
                if ($authUserRole === 'user') {
                    return $next($request);
                }
                break;
        }
        switch ($authUserRole) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;
            case 'service_provider':
                return redirect()->route('service_provider.dashboard');
                break;
            case 'user':
                return redirect()->route('user.dashboard');
                break;
        }
        return redirect()->route('login');
    }
}
