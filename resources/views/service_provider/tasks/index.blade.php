@extends('service_provider.layouts.layout')
@section('title', 'My Tasks')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">My Assigned Tasks</h1>
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="space-y-6">
            @forelse ($tasks as $task)
                <div class="border-b pb-4 last:border-b-0">
                    <div class="flex justify-between items-start">
                        <div class="flex-grow">
                            <p class="font-bold text-lg text-gray-800">{{ $task->service->name ?? 'Service Not Specified' }}</p>
                            <p class="text-sm text-gray-600 mt-1">
                                Customer: <span class="font-semibold">{{ $task->booking->customer->name ?? 'N/A' }}</span>
                            </p>
                            <p class="text-sm text-gray-600">
                                Scheduled: <span class="font-semibold">{{ \Carbon\Carbon::parse($task->scheduled_date)->format('M d, Y, h:i A') }}</span>
                            </p>
                        </div>
                        <span class="text-sm font-medium bg-blue-100 text-blue-800 py-1 px-3 rounded-full capitalize">
                            {{ str_replace('_', ' ', $task->status) }}
                        </span>
                    </div>
                    @if($task->note)
                        <p class="mt-3 text-gray-600 border-l-4 border-gray-200 pl-4 text-sm">
                            <strong>Notes:</strong> {{ $task->note }}
                        </p>
                    @endif
                </div>
            @empty
                <p class="text-gray-500 italic">You have no tasks assigned to you yet.</p>
            @endforelse
        </div>
    </div>
@endsection