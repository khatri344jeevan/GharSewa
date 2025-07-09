@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')
<div class="container mx-auto mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Box 1 --}}
        <div class="bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 shadow-2xl rounded-2xl p-8 text-center transform transition hover:scale-105 duration-300">
            <div class="flex items-center justify-center mb-4">
                <i class="bi bi-house-fill text-white text-5xl"></i>
            </div>
            <p class="text-white text-2xl font-semibold">
                <span class="block">
                    {{ $propertyCount }}
                </span>
                Registered
                <span class="italic">
                    propert{{ $propertyCount == 1 ? '' : 'ies' }}
                </span>
            </p>
        </div>

        {{-- Box 2 --}}
        <div class="bg-gradient-to-br from-green-400 via-emerald-500 to-teal-500 shadow-2xl rounded-2xl p-8 text-center transform transition hover:scale-105 duration-300">
            <div class="flex items-center justify-center mb-4">
                <i class="bi bi-calendar-event-fill text-white text-5xl"></i>
            </div>
            <p class="text-white text-2xl font-semibold">
                <span class="block">
                    5
                </span>
                Upcoming
                <span class="italic">
                    services
                </span>
            </p>
        </div>

        {{-- Box 3 --}}
        <div class="bg-gradient-to-br from-blue-400 via-indigo-500 to-purple-500 shadow-2xl rounded-2xl p-8 text-center transform transition hover:scale-105 duration-300">
            <div class="flex items-center justify-center mb-4">
                <i class="bi bi-gear-fill text-white text-5xl"></i>
            </div>
            <p class="text-white text-2xl font-semibold">
                <span class="block">
                    2
                </span>
                Pending
                <span class="italic">
                    tasks
                </span>
            </p>
        </div>

        {{-- Box 4 --}}
        <div class="bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 shadow-2xl rounded-2xl p-8 text-center transform transition hover:scale-105 duration-300">
            <div class="flex items-center justify-center mb-4">
                <i class="bi bi-currency-dollar text-white text-5xl"></i>
            </div>
            <p class="text-white text-2xl font-semibold">
                <span class="block">
                    3
                </span>
                Pending
                <span class="italic">
                    payments
                </span>
            </p>
        </div>
    </div>
</div>
@endsection
