@extends('service_provider.layouts.sidenav')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit My Profile</h1>

    <div class="max-w-2xl bg-white p-8 rounded-xl shadow-md border border-gray-200">
        {{-- For a static view, the action can be '#' --}}
        <form action="#" method="POST" class="space-y-6">
            {{-- Personal Information Section --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Personal Information</h2>
                <div class="mt-4 space-y-4">
                    <div>
                        <label for="name" class="block font-medium text-sm text-gray-700">Full Name</label>
                        <input id="name" type="text" name="name" value="Sample Provider" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">Email Address</label>
                        <input id="email" type="email" name="email" value="provider@ghar-sewa.com" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <hr class="my-6">

            {{-- Password Section --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Change Password</h2>
                <p class="text-sm text-gray-500 mt-1">Leave these fields blank to keep your current password.</p>
                <div class="mt-4 space-y-4">
                    <div>
                        <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
                        <input id="password" type="password" name="password" placeholder="••••••••" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm New Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="flex items-center justify-between mt-8">
                {{-- This links to Laravel's default "forgot password" page --}}
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                    Forgot Password?
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection