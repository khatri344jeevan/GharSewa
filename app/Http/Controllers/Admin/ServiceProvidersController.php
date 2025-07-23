<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ServiceProvidersController extends Controller
{
    public function index()
    {
        $serviceProviders = ServiceProvider::with('user')->paginate(10);
        return view('admin.service_provider.index', compact('serviceProviders'));
    }

    public function create()
    {
        return view('admin.service_provider.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => ['required', 'confirmed', Password::min(8)], // Add 'confirmed' rule
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
        'specialization' => 'required|string|max:255',
        'bio' => 'nullable|string|max:1000',
    ]);

    try {
        DB::transaction(function () use ($validated) {
            // 1. Create User first
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'role' => 'service_provider',
            ]);

            // 2. Create Service Provider with user_id
            ServiceProvider::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'specialization' => $validated['specialization'],
                'bio' => $validated['bio'],
                'user_id' => $user->id,
            ]);
        });

        return redirect()->route('admin.service_providers.index')
            ->with('success', 'Service provider created successfully');

    } catch (\Exception $e) {
        \Log::error('Service Provider Creation Error: ' . $e->getMessage()); // Add logging
        return back()->withErrors(['error' => 'Failed to create service provider: ' . $e->getMessage()])
            ->withInput();
    }
}

    public function edit(ServiceProvider $serviceProvider)
    {
        $serviceProvider->load('user');
        return view('admin.service_provider.edit', compact('serviceProvider'));
    }

    // public function update(Request $request, ServiceProvider $serviceProvider)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $serviceProvider->user_id,
    //         'password' => ['nullable', Password::min(8)],
    //         'phone' => 'required|string|max:20',
    //         'address' => 'required|string|max:500',
    //         'specialization' => 'required|string|max:255',
    //         'bio' => 'nullable|string|max:1000',
    //     ]);

    //     try {
    //         DB::transaction(function () use ($validated, $serviceProvider) {
    //             // 1. Update Service Provider
    //             $serviceProvider->update([
    //                 'name' => $validated['name'],
    //                 'email' => $validated['email'],
    //                 'phone' => $validated['phone'],
    //                 'specialization' => $validated['specialization'],
    //                 'bio' => $validated['bio'],
    //             ]);

    //             // 2. Update associated User
    //             $userUpdateData = [
    //                 'name' => $validated['name'],
    //                 'email' => $validated['email'],
    //                 'address' => $validated['address'],
    //                 'phone' => $validated['phone'],
    //             ];

    //             // Only update password if provided
    //             if (!empty($validated['password'])) {
    //                 $userUpdateData['password'] = Hash::make($validated['password']);
    //             }

    //             $serviceProvider->user->update($userUpdateData);
    //         });

    //         return redirect()->route('admin.service_providers.index')
    //             ->with('success', 'Service provider updated successfully');

    //     } catch (\Exception $e) {
    //         return back()->withErrors(['error' => 'Failed to update service provider: ' . $e->getMessage()])
    //             ->withInput();
    //     }
    // }

    public function update(Request $request, ServiceProvider $serviceProvider)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $serviceProvider->user_id,
        'password' => ['nullable', Password::min(8)],
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
        'specialization' => 'required|string|max:255',
        'bio' => 'nullable|string|max:1000',
    ]);

    try {
        DB::transaction(function () use ($validated, $serviceProvider) {
            // 1. Update Service Provider (without address)
            $serviceProvider->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'specialization' => $validated['specialization'],
                'bio' => $validated['bio'],
            ]);

            // 2. Update associated User (address goes here)
            $userUpdateData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'address' => $validated['address'], // Address only in user table
                'phone' => $validated['phone'],
            ];

            // Only update password if provided
            if (!empty($validated['password'])) {
                $userUpdateData['password'] = Hash::make($validated['password']);
            }

            $serviceProvider->user->update($userUpdateData);
        });

        return redirect()->route('admin.service_providers.index')
            ->with('success', 'Service provider updated successfully');

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Failed to update service provider: ' . $e->getMessage()])
            ->withInput();
    }
}

    public function destroy(ServiceProvider $serviceProvider)
    {
        try {
            DB::transaction(function () use ($serviceProvider) {
                // Delete Service Provider first
                $serviceProvider->delete();

                // Then delete associated User
                $serviceProvider->user->delete();
            });

            return redirect()->route('admin.service_providers.index')
                ->with('success', 'Service provider deleted successfully');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete service provider: ' . $e->getMessage()]);
        }
    }

}
