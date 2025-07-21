@extends('service_provider.layouts.layout')
@section('title', 'My Profile')
@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">My Profile</h1>
            <a href="{{ route('service-provider.profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Profile
            </a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-base">
                <div class="md:col-span-1 font-semibold text-gray-600">Full Name</div>
                <div class="md:col-span-2 text-gray-800">{{ $user->name }}</div>
                
                <div class="md:col-span-1 font-semibold text-gray-600">Email Address</div>
                <div class="md:col-span-2 text-gray-800">{{ $user->email }}</div>
            </div>
        </div>
    </div>
@endsection