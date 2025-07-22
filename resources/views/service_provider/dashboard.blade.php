{{-- resources/views/service_provider/dashboard.blade.php --}}

@extends('service_provider.layouts.sidenav')

@section('title', 'Dashboard')

@section('content')

    <!-- 1. Welcome Message (Dynamic) -->
    <h1 class="text-3xl font-bold text-gray-800 mb-8">
        Welcome, {{ $providerName }}!
    </h1>

    <!-- 2. Overview / Summary Cards (Dynamic) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-5 rounded-xl shadow">
            <h3 class="text-sm font-semibold text-gray-500">Total Services</h3>
            <p class="text-4xl font-bold text-gray-800 mt-1">{{ $totalServices }}</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-5 rounded-xl shadow">
            <h3 class="text-sm font-semibold text-gray-500">Pending Bookings</h3>
            <p class="text-4xl font-bold text-gray-800 mt-1">{{ $pendingBookings }}</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-xl shadow">
            <h3 class="text-sm font-semibold text-gray-500">Completed Jobs</h3>
            <p class="text-4xl font-bold text-gray-800 mt-1">{{ $completedJobs }}</p>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-5 rounded-xl shadow">
            <h3 class="text-sm font-semibold text-gray-500">Total Earnings</h3>
            <p class="text-4xl font-bold text-gray-800 mt-1">${{ number_format($totalEarnings) }}</p>
        </div>
    </div>

    <!-- 3. Upcoming Bookings Table (Dynamic) -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Upcoming Bookings</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="border-b-2 border-gray-100">
                    <tr>
                        <th class="p-3 text-sm font-semibold text-gray-500">Client Name</th>
                        <th class="p-3 text-sm font-semibold text-gray-500">Date & Time</th>
                        <th class="p-3 text-sm font-semibold text-gray-500">Service</th>
                        <th class="p-3 text-sm font-semibold text-gray-500">Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through the bookings data --}}
                    @forelse ($upcomingBookings as $booking)
                        <tr class="border-b border-gray-100">
                            <td class="p-4 align-middle whitespace-nowrap">{{ $booking->clientName }}</td>
                            <td class="p-4 align-middle whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($booking->scheduled_time)->format('F j, g:i A') }}
                            </td>
                            <td class="p-4 align-middle whitespace-nowrap">{{ $booking->serviceName }}</td>
                            <td class="p-4 align-middle whitespace-nowrap">
                                {{-- Show a different color badge based on the status --}}
                                @if ($booking->status == 'confirmed')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Confirmed</span>
                                @elseif ($booking->status == 'pending')
                                     <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold">Pending</span>
                                @else
                                     <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs font-semibold">{{ ucfirst($booking->status) }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        {{-- This will show if there are no upcoming bookings --}}
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                You have no upcoming bookings.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection