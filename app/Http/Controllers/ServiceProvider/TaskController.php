<?php
namespace App\Http\Controllers\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $providerProfile = $user->serviceProviderProfile;
        
        $tasks = [];
        if ($providerProfile) {
            $tasks = $providerProfile->tasks()->with(['booking.customer', 'service'])->get();
        }
        
        return view('service_provider.tasks.index', ['tasks' => $tasks]);
    }
}