@extends('service_provider.layouts.master')
@section('title', 'Service Provider Dashboard')

@section('content')
<div class=" p-8 min-h-screen from-blue-50 -via-white to-purple-100">
    <div class="container mx-auto px-4">
        <!-- Task Statistics Boxes -->
        <div class="flex justify-start mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full">
                <!-- Total Tasks Box -->
                <div class="bg-white border border-blue-200 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M8 17l4 4 4-4m-4-5v9" />
                                <path d="M20.24 12.24A9 9 0 1 0 12 21" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 break-words">Total Tasks</h3>
                            <div class="text-4xl font-extrabold text-blue-700">{{ $totalTasks }}</div>
                        </div>
                    </div>
                </div>

                <!-- Completed Tasks Box -->
                <div class="bg-white border border-green-200 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 break-words">Completed Tasks</h3>
                            <div class="text-4xl font-extrabold text-green-700">{{ $completedTasks }}</div>
                        </div>
                    </div>
                </div>

                <!-- Pending Tasks Box -->
                <div class="bg-white border border-yellow-200 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 8v4l3 3" />
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 break-words">Pending Tasks</h3>
                            <div class="text-4xl font-extrabold text-yellow-700">{{ $pendingTasks  }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rest of your dashboard content goes here -->

    </div>
</div>
@endsection
