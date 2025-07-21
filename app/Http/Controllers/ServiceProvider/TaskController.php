<?php
namespace App\Http\Controllers\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller {
    public function index() {
        // 1. Get the currently logged-in User
        $user = Auth::user();
        // 2. Use the relationship we added to find their professional profile
        $providerProfile = $user->serviceProviderProfile;
        $tasks = [];
        if ($providerProfile) {
            // 3. If a profile exists, get all tasks (BookingDetails) assigned to it.
            //    We use with() to load related data efficiently to prevent many database queries.
            $tasks = $providerProfile->tasks()->with(['booking.customer', 'service'])
                                       ->orderBy('scheduled_date', 'desc')
                                       ->get();
        }
        return view('service_provider.tasks.index', compact('tasks'));
    }
}