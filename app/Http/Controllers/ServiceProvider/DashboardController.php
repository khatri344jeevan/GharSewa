<?php
namespace App\Http\Controllers\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('service_provider.dashboard', compact('user'));
    }
}