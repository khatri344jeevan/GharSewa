<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        
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
