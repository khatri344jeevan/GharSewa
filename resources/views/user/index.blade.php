@extends('user.layout.sidebar')
@section('title', 'My Dashboard')

@section('header', 'User Dashboard')

@section('content')
    <section class="mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-gray-100 rounded-lg p-4 border border-gray-200 shadow-md flex items-center justify-center">
                <div class="flex items-center justify-center w-12 h-12 bg-pink-200 rounded-full mr-2">
                    <i class="bi bi-calendar-check text-3xl text-pink-600"></i>
                </div>
                <div>
                    <p class="text-gray-800 text-lg font-semibold">Total Bookings</p>
                    <p class="text-gray-600 text-sm">45</p>
                </div>
            </div>

            <div class="container mx-auto mt-10">
                <div calass="bg-white shadow rounded p-6">
                    <h1 class="text-2xl font-bold mb-4">User Dashboard</h1>
                    <p class="text-gray-700">
                        You have <strong>{{ $propertyCount }}</strong> registered
                        property{{ $propertyCount == 1 ? '' : 'ies' }}.
                    </p>
                </div>
            </div>

            <div class="bg-gray-100 rounded-lg p-4 border border-gray-200 shadow-md flex items-center justify-center">
                <div class="flex items-center justify-center w-12 h-12 bg-green-200 rounded-full mr-2">
                    <i class="bi bi-clock text-3xl text-green-600"></i>
                </div>
                <div>
                    <p class="text-gray-800 text-lg font-semibold">Pending Services</p>
                    <p class="text-gray-600 text-sm">12</p>
                </div>
            </div>

            <div class="bg-gray-100 rounded-lg p-4 border border-gray-200 shadow-md flex items-center justify-center">
                <div class="flex items-center justify-center w-12 h-12 bg-blue-200 rounded-full mr-2">
                    <i class="bi bi-alarm text-3xl text-blue-600"></i>
                </div>
                <div>
                    <p class="text-gray-800 text-lg font-semibold">Upcoming Services</p>
                    <p class="text-gray-600 text-sm">5</p>
                </div>
            </div>
        </div>
    </section>

@endsection
