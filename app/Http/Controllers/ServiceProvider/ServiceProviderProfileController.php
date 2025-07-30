<?php
namespace App\Http\Controllers\ServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class ServiceProviderProfileController extends Controller
{
    public function show()
    {
        $serviceProvider = $this->getOrCreateProfile();
        return view('service_provider.profile.show', compact('serviceProvider'));
    }


    public function edit()
    {
        $serviceProvider = $this->getOrCreateProfile();
        return view('service_provider.profile.edit', compact('serviceProvider'));
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'specialization' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);

        $serviceProvider = $this->getOrCreateProfile();
        $serviceProvider->update($validated);

        return redirect()->route('service_provider.profile')
                        ->with('success', 'Profile updated successfully!');
    }


    private function getOrCreateProfile()
    {
        $user = Auth::user();

        if (!$user) {
            abort(401, 'Please login first.');
        }

        // return ServiceProvider::firstOrCreate(
        //     ['user_id' => $user->id],
        //     [
        //         'name' => $user->name ?? 'Unknown',
        //         'email' => $user->email ?? 'unknown@email.com',
        //         'phone' => '',
        //         'specialization' => '',
        //         'bio' => '',
        //     ]
        // );
        $user_id = Auth::id();
        return ServiceProvider::firstOrCreate(
        ['email' => $user->email],
        [
            'user_id'=>$user_id,
            'name' => $user->name ?? 'Unknown',
            'phone' => '',
            'specialization' => '',
            'bio' => '',
        ]
    );
    }
}
