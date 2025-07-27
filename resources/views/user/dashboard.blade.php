@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')
    <div class="container mx-auto m-6">
        <div class="flex flex-col md:flex-row gap-6">

            {{-- Personal Dashboard (Left Section) --}}
            <div class="w-full  personal-dashboard space-y-6">

                {{-- Box 1: Properties Summary --}}
                <div
                    class="bg-gray-300 shadow p-6 rounded-xl border border-green-100 flex flex-col justify-between text-center">
                    <div>
                        <div class="flex items-center justify-center mb-4">
                            <i class="bi bi-house-fill text-gray-700 text-3xl"></i>
                        </div>
                        <p class="text-gray-700 text-lg font-bold mb-2">
                            <span class="block text-red-600 text-2xl mb-1">{{ $propertyCount }}</span>
                            <span class="text-base font-semibold tracking-wide">
                                <a href="{{ route('user.Properties.p_index') }}">Registered</a>
                            </span>
                            <span class="italic block text-sm mt-1">
                                propert{{ $propertyCount == 1 ? '' : 'ies' }}
                            </span>
                        </p>

                        {{-- Confirmed Bookings Summary --}}
                        <div class="bg-white rounded-lg shadow px-3 py-6 border-t-4 border-green-400 mt-4">
                            <span class="block text-green-600 text-xl font-bold">{{ $confirmedBookings }}</span>
                            <span class="text-base font-semibold text-gray-700">Confirmed</span>
                            <span class="italic block text-gray-500 text-xs">Bookings</span>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-wrap gap-4 justify-center mt-6">
                            {{-- View Properties --}}
                            <div
                                class="flex-1 max-w-xs bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow-md p-3 rounded-lg text-center border border-gray-300 mx-auto">
                                <div class="flex items-center justify-center mb-1">
                                    <i class="bi bi-house-door-fill text-gray-700 text-2xl"></i>
                                </div>
                                <a href="{{ route('user.Properties.p_index') }}"
                                    class="block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-3 py-2 rounded shadow transition duration-300 text-sm">
                                    View Properties
                                </a>
                            </div>

                            {{-- Book Maintenance Package --}}
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

                            {{-- Register Property --}}
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
                </div>

                {{-- Box 2: Task Summary --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
                    <div
                        class="bg-white rounded-lg shadow px-3 py-5 border-t-4 border-green-400 text-center flex flex-col items-center justify-center">
                        <span class="text-green-600 text-xl font-bold">{{ $totaltask }}</span>
                        <span class="text-base font-semibold text-gray-700">Total</span>
                        <span class="italic text-gray-500 text-xs">Tasks</span>
                    </div>
                    <div
                        class="bg-white rounded-lg shadow px-3 py-5 border-t-4 border-yellow-400 text-center flex flex-col items-center justify-center">
                        <span class="text-yellow-600 text-xl font-bold">{{ $upcomingServices }}</span>
                        <span class="text-base font-semibold text-gray-700">Pending</span>
                        <span class="italic text-gray-500 text-xs">Tasks</span>
                    </div>
                    <div
                        class="bg-white rounded-lg shadow px-3 py-5 border-t-4 border-blue-400 text-center flex flex-col items-center justify-center">
                        <span class="text-blue-600 text-xl font-bold">{{ $completedTasks }}</span>
                        <span class="text-base font-semibold text-gray-700">Completed</span>
                        <span class="italic text-gray-500 text-xs">Tasks</span>
                    </div>
                </div>

                {{-- Box 3: Booking Summary --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div
                        class="bg-white rounded-lg shadow px-3 py-5 border-t-4 border-green-400 text-center flex flex-col items-center justify-center">
                        <span class="text-green-600 text-xl font-bold">{{ $totalBookings }}</span>
                        <span class="text-base font-semibold text-gray-700">Total</span>
                        <span class="italic text-gray-500 text-xs">Bookings</span>
                    </div>
                    <div
                        class="bg-white rounded-lg shadow px-3 py-5 border-t-4 border-yellow-400 text-center flex flex-col items-center justify-center">
                        <span class="text-yellow-600 text-xl font-bold">{{ $pendingBookings }}</span>
                        <span class="text-base font-semibold text-gray-700">Pending</span>
                        <span class="italic text-gray-500 text-xs">Bookings</span>
                    </div>
                    <div
                        class="bg-white rounded-lg shadow px-3 py-5 border-t-4 border-blue-400 text-center flex flex-col items-center justify-center">
                        <span class="text-blue-600 text-xl font-bold">{{ $approvedBookings }}</span>
                        <span class="text-base font-semibold text-gray-700">Approved</span>
                        <span class="italic text-gray-500 text-xs">Bookings</span>
                    </div>
                </div>

                {{-- Box 4: Payments --}}
                <div class="bg-gray-300 shadow p-5 rounded-xl text-center border border-blue-200">
                    <div class="flex items-center justify-center mb-2">
                        <i class="bi bi-currency-dollar text-gray-700 text-3xl"></i>
                    </div>
                    <p class="text-gray-700 text-lg font-bold">
                        <span class="block text-red-600 text-2xl">{{ $pendingPayments }}</span>
                        <span class="text-base font-semibold tracking-wide">Pending</span>
                        <span class="italic block text-sm">payments</span>
                    </p>
                </div>
            </div>

            {{-- Notifications Box (Right Section) --}}
            {{-- <div x-data="{ showMessage: false }" class="w-full md:w-1/3 bg-white shadow rounded-xl border border-blue-200 p-4">
                <button class="text-lg font-semibold text-gray-800 mb-2 flex items-center"
                    @click="showMessage = !showMessage">
                    <i class="bi bi-bell-fill text-gray-800 mr-2 text-3xl"></i>
                    <span>Notifications</span>
                </button>

                @if ($notifications->count())
                    <div x-show="showMessage" x-transition
                        class="p-2 mt-2 bg-green-100 text-green-800 rounded shadow text-sm">
                        You have a new notification!
                    </div>

                    <form method="POST" action="{{ route('user.notifications.markAllRead') }}">
                        @csrf
                        <button type="submit" class="text-xs text-blue-500 underline mt-2">Mark all as read</button>
                    </form>
                @else
                    <p x-show="showMessage" x-transition class="text-gray-500 text-sm">
                        You have no new notifications.
                    </p>
                @endif

                <div class="max-h-64 overflow-y-auto mt-2 space-y-2">
                    @foreach ($notifications as $notification)
                        <div
                            class="p-2 bg-gray-50 shadow-sm rounded border-l-4 {{ $notification->read_at ? 'border-gray-300' : 'border-blue-500' }}">
                            <p class="text-gray-700 text-sm">{{ $notification->data['message'] ?? 'No message' }}</p>
                            @if (isset($notification->data['url']))
                                <a href="{{ $notification->data['url'] }}"
                                    class="text-blue-600 hover:underline mt-1 inline-block text-xs">
                                    View Booking
                                </a>
                            @endif
                            @if (!$notification->read_at)
                                <form method="POST" action="{{ route('user.notifications.markRead', $notification->id) }}"
                                    class="inline">
                                    @csrf
                                    <button type="submit" class="text-xs text-green-600 underline ml-2">Mark as
                                        read</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div> --}}

        </div>
    </div>
@endsection
