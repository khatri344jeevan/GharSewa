
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard based on user role
     */
    public function index()
    {
        $user = Auth::user();

        // Return different views based on user role, but same URL
        switch ($user->role) {
            case 'admin':
                return view('admin.index');

            case 'service_provider':
                return view('service_provider.index');

            case 'user':
            default:
                return view('user.index');
        }
    }
}
