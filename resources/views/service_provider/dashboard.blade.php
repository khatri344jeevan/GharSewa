@extends('service_provider.layouts.layout')
@section('title', 'Dashboard')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-700">Welcome, {{ $user->name }}!</h2>
        <p class="mt-2 text-gray-600">You can manage your profile and view your assigned tasks using the sidebar navigation.</p>
    </div>
@endsection