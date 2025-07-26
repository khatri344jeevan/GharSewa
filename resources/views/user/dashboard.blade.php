@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')
    <div class="container mx-auto m-6">
        <div class="grid grid-cols-1  gap-4">
            {{-- Notifications Box --}}
            {{-- <div class="bg-white shadow rounded-xl border border-blue-200 p-4 md:col-span-1">
                <h2 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                    <i class="bi bi-bell-fill text-gray-800 mr-2"></i> Notifications
                </h2>
                <form method="POST" action="{{ route('user.notifications.markAllRead') }}">
                    @csrf
                    <button type="submit" class="text-xs text-blue-500 underline mb-2">Mark all as read</button>
                </form>
                <div class="max-h-64 overflow-y-auto">
                    @forelse($notifications as $notification)
                        <div
                            class="p-2 mb-2 bg-gray-50 shadow-sm rounded border-l-4 {{ $notification->read_at ? 'border-gray-300' : 'border-blue-500' }}">
                            <p class="text-gray-700 text-sm">{{ $notification->data['message'] ?? '' }}</p>
                            <a href="{{ $notification->data['url'] ?? '#' }}"
                                class="text-blue-600 hover:underline mt-1 inline-block text-xs">
                                View Booking
                            </a>
                            @if (!$notification->read_at)
                                <form method="POST" action="{{ route('user.notifications.markRead', $notification->id) }}"
                                    class="inline">
                                    @csrf
                                    <button type="submit" class="text-xs text-green-600 underline ml-2">Mark as
                                        read</button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">You have no new notifications.</p>
                    @endforelse
                </div>
            </div> --}}

            {{-- Main Boxes --}}
            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Box 1 --}}
                <div
                    class="bg-gradient-to-br from-gray-200 via-gray-300 to-balck-500 shadow p-6 rounded-xl text-center border border-green-200 flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center justify-center mb-4">
                            <i class="bi bi-house-fill text-gray-700 text-3xl"></i>
                        </div>
                        <p class="text-gray-700 text-lg font-bold mb-2">
                            <span class="block text-red-600 text-2xl mb-1">
                                {{ $propertyCount }}
                            </span>
                            <span class="text-base font-semibold tracking-wide">
                                <a href="{{ route('user.Properties.p_index') }}">Registered</a>
                            </span>
                            <span class="italic block text-sm mt-1">
                                propert{{ $propertyCount == 1 ? '' : 'ies' }}
                            </span>
                        </p>
                        {{-- Confirmed Bookings Box --}}
                        <div class="bg-white rounded-lg shadow px-3 py-2 border-t-4 border-green-400 mt-4">
                            <span class="block text-green-600 text-xl font-bold">{{ $confirmedBookings }}</span>
                            <span class="text-base font-semibold text-gray-700">Confirmed</span>
                            <span class="italic block text-gray-500 text-xs">Bookings</span>
                        </div>
                        {{-- View Properties Button --}}
                        <div class="mt-4">
                            <a href="{{ route('user.Properties.p_index') }}"
                                class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-4 py-2 rounded shadow transition duration-300 text-sm">
                                View Properties
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Box 2 --}}
                <div
                    class="bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow p-4 rounded-xl text-center border border-green-200">
                    <div class="flex items-center justify-center mb-2">
                        <i class="bi bi-gear-fill text-gray-700 text-3xl"></i>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="bg-white rounded-lg shadow px-3 py-2 border-t-4 border-gray-700">
                            <span class="block text-green-600 text-xl font-bold">{{ $totaltask }}</span>
                            <span class="text-base font-semibold text-gray-700">Total</span>
                            <span class="italic block text-gray-500 text-xs">tasks</span>
                        </div>
                        <div class="bg-white rounded-lg shadow px-3 py-2 border-t-4 border-yellow-400">
                            <span class="block text-yellow-600 text-xl font-bold">{{ $upcomingServices }}</span>
                            <span class="text-base font-semibold text-gray-700">Pending</span>
                            <span class="italic block text-gray-500 text-xs">tasks</span>
                        </div>
                        <div class="bg-white rounded-lg shadow px-3 py-2 border-t-4 border-blue-400">
                            <span class="block text-blue-600 text-xl font-bold">{{ $completedTasks }}</span>
                            <span class="text-base font-semibold text-gray-700">Completed</span>
                            <span class="italic block text-gray-500 text-xs">Tasks</span>
                        </div>
                    </div>
                </div>

                {{-- Box 3 --}}
                <div
                    class="bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow p-4 rounded-xl text-center border border-green-200">
                    <div class="flex items-center justify-center mb-2">
                        <i class="bi bi-calendar-event-fill text-gray-700 text-3xl"></i>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="bg-white rounded-lg shadow px-3 py-2 border-t-4 border-green-400">
                            <span class="block text-green-600 text-xl font-bold">{{ $totalBookings }}</span>
                            <span class="text-base font-semibold text-gray-700">Total</span>
                            <span class="italic block text-gray-500 text-xs">Bookings</span>
                        </div>
                        <div class="bg-white rounded-lg shadow px-3 py-2 border-t-4 border-yellow-400">
                            <span class="block text-yellow-600 text-xl font-bold">{{ $pendingBookings }}</span>
                            <span class="text-base font-semibold text-gray-700">Pending</span>
                            <span class="italic block text-gray-500 text-xs">Bookings</span>
                        </div>
                        <div class="bg-white rounded-lg shadow px-3 py-2 border-t-4 border-blue-400">
                            <span class="block text-blue-600 text-xl font-bold">{{ $approvedBookings }}</span>
                            <span class="text-base font-semibold text-gray-700">Approved</span>
                            <span class="italic block text-gray-500 text-xs">Bookings</span>
                        </div>
                    </div>
                </div>

                {{-- Box 4 --}}
                <div
                    class="bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow p-4 rounded-xl text-center border border-green-200">
                    <div class="flex items-center justify-center mb-2">
                        <i class="bi bi-currency-dollar text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-gray-700 text-lg font-bold">
                        <span class="block text-red-600 text-2xl">
                            {{ $pendingPayments }}
                        </span>
                        <span class="text-base font-semibold tracking-wide">
                            Pending
                        </span>
                        <span class="italic block text-sm">
                            payments
                        </span>
                    </p>
                </div>
            </div>
        </div>

        {{-- Action Buttons as Small Boxes --}}
        <div class="flex flex-col md:flex-row gap-4 justify-center mt-4">
            <div
                class="flex-1 max-w-xs bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow-md p-3 rounded-lg text-center border border-gray-300 mx-auto">
                <div class="flex items-center justify-center mb-1">
                    <i class="bi bi-wrench-adjustable text-gray-700 text-2xl"></i>
                </div>
                <a href="{{ route('user.Bookings.b_create') }}"
                    class="block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-3 py-2 rounded shadow transition duration-300 text-sm">
                    Book Maintenance Package
                </a>
            </div>
            <div
                class="flex-1 max-w-xs bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow-md p-3 rounded-lg text-center border border-gray-300 mx-auto">
                <div class="flex items-center justify-center mb-1">
                    <i class="bi bi-plus-square text-gray-700 text-2xl"></i>
                </div>
                <a href="{{ route('user.Properties.p_create') }}"
                    class="block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-3 py-2 rounded shadow transition duration-300 text-sm">
                    Register Property
                </a>
            </div>
        </div>
    </div>
@endsection
