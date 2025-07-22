@extends('service_provider.layouts.layout')
@section('title', 'Dashboard')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-gray-700">Welcome!</h2>
            <p class="mt-2 text-gray-600">This is your mission control. You can manage your bookings and profile from here.</p>
        </div>
    </div>
@endsection