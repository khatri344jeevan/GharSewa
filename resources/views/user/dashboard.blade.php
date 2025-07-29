@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <p class="text-3xl text-center text-gray-900 mb-12 font-extrabold italic tracking-wide">
            <span class="text-black  decoration-gray-400">{{ Auth::user()->name }}</span>'s properties, bookings, tasks, and payments
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-lg">

            {{-- Properties Card --}}
            <div
                class="bg-white rounded-3xl shadow-md p-10 border border-gray-300 flex flex-col items-center hover:scale-105 hover:shadow-lg transition-transform duration-300">
                <div class="flex items-center justify-center mb-6">
                    <i class="bi bi-house-door-fill text-gray-900 text-5xl"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-gray-900 mb-2 tracking-wide">Properties</h2>
                <span class="text-5xl font-black text-gray-700 mb-2">{{ $propertyCount }}</span>
                <span class="text-gray-500 mb-4">Registered propert{{ $propertyCount == 1 ? 'y' : 'ies' }}</span>
                <div class="flex flex-col gap-3 w-full mt-6">
                    <a href="{{ route('user.Properties.p_index') }}"
                        class="w-full bg-gray-900 hover:bg-gray-700 text-white font-bold py-3 rounded-xl transition text-center">
                        View Properties
                    </a>
                    <a href="{{ route('user.Properties.p_create') }}"
                        class="w-full bg-gray-700 hover:bg-gray-900 text-white font-bold py-3 rounded-xl transition text-center">
                        Register Property
                    </a>
                </div>
            </div>

            {{-- Bookings Card --}}
            <div
                class="bg-white rounded-3xl shadow-md p-10 border border-gray-300 flex flex-col items-center hover:scale-105 hover:shadow-lg transition-transform duration-300">
                <div class="flex items-center justify-center mb-6">
                    <i class="bi bi-calendar-check text-gray-700 text-5xl"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-gray-700 mb-2 tracking-wide">Bookings</h2>
                <div class="grid grid-cols-3 gap-4 w-full text-center mb-4">
                    <div>
                        <span class="text-2xl font-black text-gray-900">{{ $totalBookings }}</span>
                        <div class="text-sm text-gray-500">Total</div>
                    </div>
                    <div>
                        <span class="text-2xl font-black text-gray-700">{{ $pendingBookings }}</span>
                        <div class="text-sm text-gray-500">Pending</div>
                    </div>
                    <div>
                        <span class="text-2xl font-black text-gray-400">{{ $approvedBookings }}</span>
                        <div class="text-sm text-gray-500">Approved</div>
                    </div>
                </div>
                <div class="bg-gray-200 rounded-xl px-4 py-4 border-t-4 border-gray-700 w-full mt-2 text-center shadow">
                    <span class="block text-gray-900 text-3xl font-extrabold">{{ $confirmedBookings }}</span>
                    <span class="text-base text-gray-500">Confirmed Bookings</span>
                </div>
                <a href="{{ route('user.Bookings.b_create') }}"
                    class="mt-6 w-full bg-gray-700 hover:bg-gray-900 text-white font-bold py-3 rounded-xl transition text-center">
                    Book Maintenance Package
                </a>
            </div>

            {{-- Tasks & Payments Card --}}
            <div class="flex flex-col gap-8">
                {{-- Tasks --}}
                <div
                    class="bg-gray-900 rounded-3xl shadow-md p-10 border border-gray-700 hover:scale-105 hover:shadow-lg transition-transform duration-300">
                    <div class="flex items-center justify-center mb-6">
                        <i class="bi bi-list-task text-white text-5xl"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-white mb-2 tracking-wide">Tasks</h2>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <span class="text-2xl font-black text-white">{{ $totaltask }}</span>
                            <div class="text-sm text-gray-300">Total</div>
                        </div>
                        <div>
                            <span class="text-2xl font-black text-gray-400">{{ $upcomingServices }}</span>
                            <div class="text-sm text-gray-300">Pending</div>
                        </div>
                        <div>
                            <span class="text-2xl font-black text-gray-500">{{ $completedTasks }}</span>
                            <div class="text-sm text-gray-300">Completed</div>
                        </div>
                    </div>
                </div>

                {{-- Payments --}}
                <div
                    class="bg-white rounded-3xl shadow-md p-10 border border-gray-300 text-center hover:scale-105 hover:shadow-lg transition-transform duration-300">
                    <div class="flex items-center justify-center mb-4">
                        <i class="bi bi-cash-stack text-gray-700 text-4xl"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-700 mb-2 tracking-wide">Payments</h2>
                    <span class="block text-4xl font-black text-gray-700">{{ $totalPayments }}</span>
                    <span class="text-base text-gray-500">Total Payments</span>
                </div>
            </div>
        </div>
    </div>


@endsection
