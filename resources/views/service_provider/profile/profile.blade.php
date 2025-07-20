@extends('service_provider.layouts.layout')
@section('title', 'My Profile')

@section('content')
    <!-- Success Message -->
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">My Profile</h1>
        <a href="{{ route('service-provider.profile.edit') }}" class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center">
            <i class='bi bi-pencil-square mr-2'></i> Edit Profile
        </a>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
            <!-- Profile Picture -->
            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random' }}" alt="Profile Avatar" class="w-32 h-32 rounded-full object-cover ring-4 ring-indigo-200">
            
            <!-- Profile Information -->
            <div class="flex-grow">
                <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                <p class="text-md text-gray-500">{{ $user->email }}</p>
                <p class="text-md text-gray-500 mt-1">{{ $user->phone_number ?? 'No phone number provided.' }}</p>

                <hr class="my-4">
                
                <h3 class="text-lg font-semibold text-gray-800">Bio</h3>
                <p class="mt-1 text-gray-600 whitespace-pre-wrap">{{ $user->bio ?? 'You have not added a bio yet. Click Edit Profile to add one.' }}</p>
            </div>
        </div>
    </div>
@endsection