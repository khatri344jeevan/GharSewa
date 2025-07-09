<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $propertyCount = $user->properties()->count();

        return view('user.dashboard', compact('propertyCount'));
            // return 'User dashboard controller is working';

    }
}
