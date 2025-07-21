@extends('service_provider.layouts.layout')
@section('title', 'Edit Profile')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Profile</h1>
    <!-- Profile Info Form -->
    <div class="bg-white p-8 rounded-lg shadow-md mb-8">
        <h2 class="text-xl font-bold mb-4">Profile Information</h2>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4 text-sm">{{ session('success') }}</div>
        @endif
        <form action="{{ route('service-provider.profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-bold mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full px-3 py-2 border rounded-md @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block font-bold mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full px-3 py-2 border rounded-md @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex justify-end gap-4">
                <a href="{{ route('service-provider.profile.show') }}" class="px-4 py-2 rounded-md font-semibold text-gray-700 bg-gray-200 hover:bg-gray-300">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md font-semibold">Update Profile</button>
            </div>
        </form>
    </div>

    <!-- Password Form -->
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Update Password</h2>
        @if (session('password_success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4 text-sm">{{ session('password_success') }}</div>
        @endif
        <form action="{{ route('service-provider.password.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="current_password" class="block font-bold mb-1">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="w-full px-3 py-2 border rounded-md @error('current_password', 'updatePassword') border-red-500 @enderror">
                @error('current_password', 'updatePassword') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block font-bold mb-1">New Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md @error('password', 'updatePassword') border-red-500 @enderror">
                @error('password', 'updatePassword') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block font-bold mb-1">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md font-semibold">Update Password</button>
            </div>
        </form>
    </div>
@endsection