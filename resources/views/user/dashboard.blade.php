@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')
    <div class="container mx-auto m-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Box 1 --}}
            <div
                class="bg-gradient-to-br from-gray-200 via-gray-300 to-gray-400 shadow-xl  p-8 text-center transform transition hover:scale-105 duration-300 border border-gray-300">
                <div class="flex items-center justify-center mb-4">
                    <i class="bi bi-house-fill text-gray-700 text-5xl drop-shadow"></i>
                </div>
                <p class="text-gray-700 text-2xl font-extrabold">
                    <span class="block text-red-600 text-4xl">
                        {{ $propertyCount }}
                    </span>
                    <span class="text-lg font-semibold tracking-wide">
                        <a href="{{ route('user.Properties.p_index') }}">Registered</a>
                    </span>
                    <span class="italic block text-md">
                        propert{{ $propertyCount == 1 ? '' : 'ies' }}
                    </span>
                </p>
            </div>

            {{-- Box 2 --}}
            <div
                class="bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow-xl  p-8 text-center transform transition hover:scale-105 duration-300 border border-gray-300">
                <div class="flex items-center justify-center mb-4">
                    <i class="bi bi-calendar-event-fill text-gray-700 text-5xl drop-shadow"></i>
                </div>
                <p class="text-gray-700 text-2xl font-extrabold">
                    <span class="block text-green-600 text-4xl">
                        {{ $upcomingServices }}

                    </span>
                    <span class="text-lg font-semibold tracking-wide">
                        Upcoming
                    </span>
                    <span class="italic block text-md">
                        services
                    </span>
                </p>
            </div>

            {{-- Box 3 --}}
            <div
                class="bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 shadow-xl  p-8 text-center transform transition hover:scale-105 duration-300 border border-gray-300">

                <div class="flex items-center justify-center mb-4">
                    <i class="bi bi-gear-fill text-gray-700 text-5xl drop-shadow"></i>
                </div>
                <p class="text-gray-700 text-2xl font-extrabold">
                    <span class="block text-green-600 text-4xl">
                        {{ $pendingtask }}
                    </span>
                    <span class="text-lg font-semibold tracking-wide">
                        Pending
                    </span>
                    <span class="italic block text-md">
                        tasks
                    </span>
                </p>
            </div>


            {{-- Box 4 --}}
            <div
                class="bg-gradient-to-br from-gray-200 via-gray-300 to-gray-400 shadow-xl  p-8 text-center transform transition hover:scale-105 duration-300 border border-gray-300">
                <div class="flex items-center justify-center mb-4">
                    <i class="bi bi-currency-dollar text-gray-700 text-5xl drop-shadow"></i>
                </div>
                <p class="text-gray-700 text-2xl font-extrabold">
                    <span class="block text-red-600 text-4xl">
                        {{ $pendingPayments }}
                    </span>
                    <span class="text-lg font-semibold tracking-wide">
                        Pending
                    </span>
                    <span class="italic block text-md">
                        payments
                    </span>
                </p>
            </div>

        </div>
    </div>

    <div class="flex gap-10">
        <a href="{{route('user.Bookings.b_create')}}"
            class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded shadow-lg transition duration-300">
            Book Maintainence Package
        </a>
        <a href="{{ route('user.Properties.p_create') }}"
            class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded shadow-lg transition duration-300">
            Register Property
        </a>
    </div>
@endsection
