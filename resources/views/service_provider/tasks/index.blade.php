@extends('service_provider.layouts.layout')
@section('title', 'My Tasks')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">My Tasks</h1>
    <div class="space-y-8">
        @php
            $statuses = ['pending', 'confirmed', 'in_progress', 'completed', 'upcoming', 'canceled'];
        @endphp
        @foreach ($statuses as $status)
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">
                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                </h2>
                <div class="space-y-4">
                    {{-- We filter the collection of tasks for the current status in the loop --}}
                    @forelse ($tasks->where('status', $status) as $task)
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            {{-- Task Title from the related 'services' table --}}
                            <p class="font-bold text-lg text-gray-800">{{ $task->service->name ?? 'N/A' }}</p>
                            {{-- Customer and Date from the related 'bookings' table --}}
                            <p class="text-sm text-gray-600 mt-1">
                                Customer: <span class="font-semibold">{{ $task->booking->customer->name ?? 'N/A' }}</span>
                                | Scheduled: <span class="font-semibold">{{ \Carbon\Carbon::parse($task->scheduled_date)->format('M d, Y, h:i A') }}</span>
                            </p>
                            {{-- Notes from the 'booking_details' table itself --}}
                            @if($task->note)
                                <p class="mt-2 text-gray-500 border-l-4 border-gray-200 pl-3">
                                    <strong>Note:</strong> {{ $task->note }}
                                </p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 italic">No tasks with status '{{ $status }}'.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
@endsection