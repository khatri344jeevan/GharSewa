@extends('admin.layout.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
<h2 class="mb-8 text-3xl font-bold text-center text-gray-800">All About GharSewa</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-cyan-600">
            <div class="mb-3">
                <i class="bi bi-people-fill text-5xl text-cyan-600"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Total Users</h6>
            <p class="text-3xl font-bold text-cyan-600 mt-2">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-gray-500">
            <div class="mb-3">
                <i class="bi bi-person-badge-fill text-5xl text-gray-500"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Total Admins</h6>
            <p class="text-3xl font-bold text-gray-700 mt-2">{{ $totalAdmins }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-green-500">
            <div class="mb-3">
                <i class="bi bi-person-lines-fill text-5xl text-green-500"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Service Providers</h6>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalServiceProviders }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-cyan-500">
            <div class="mb-3">
                <i class="bi bi-building text-5xl text-cyan-500"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Total Properties</h6>
            <p class="text-3xl font-bold text-cyan-600 mt-2">{{ $totalProperties }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-gray-500">
            <div class="mb-3">
                <i class="bi bi-calendar-check-fill text-5xl text-gray-500"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Total Bookings</h6>
            <p class="text-3xl font-bold text-gray-700 mt-2">{{ $totalBookings }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-green-600">
            <div class="mb-3">
                <i class="bi bi-tools text-5xl text-green-600"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Total Packages</h6>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalPackages }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-red-500">
            <div class="mb-3">
                <i class="bi bi-hourglass-split text-5xl text-red-500"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Pending Bookings</h6>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $pendingBookings }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform border-t-4 border-green-600">
            <div class="mb-3">
                <i class="bi bi-check-circle-fill text-5xl text-green-600"></i>
            </div>
            <h6 class="text-gray-500 text-lg font-semibold">Approved Bookings</h6>
            <p class="text-3xl font-bold text-green-700 mt-2">{{ $approvedBookings }}</p>
        </div>
    </div>
</div>
<!-- Add Bootstrap Icons CDN if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
