@extends('service_provider.layouts.master')

@section('content')
<div class="ml-64 p-8 min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Task Statistics Boxes -->
        <div class="flex justify-start -ml-20 mt-20 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Tasks Box -->
                <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 break-words">Total Tasks</h3>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalTasks ?? 0 }}</div>
                </div>

                <!-- Completed Tasks Box -->
                <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 break-words">Completed Tasks</h3>
                    <div class="text-3xl font-bold text-gray-900">{{ $completedTasks ?? 0 }}</div>
                </div>

                <!-- Pending Tasks Box -->
                <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 break-words">Pending Tasks</h3>
                    <div class="text-3xl font-bold text-gray-900">{{ $pendingTasks ?? 0 }}</div>
                </div>
            </div>
        </div>

        <!-- Rest of your dashboard content goes here -->
        
    </div>
</div>
@endsection