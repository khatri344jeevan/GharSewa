@extends('service_provider.layouts.master')

@section('title', 'Create Task')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Task</h2>
        
        <form action="{{ route('service_provider.tasks.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="booking_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Select Booking
                </label>
                <select name="booking_id" id="booking_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select a booking</option>
                    @foreach($bookings as $booking)
                        <option value="{{ $booking->id }}">
                            {{ $booking->property->title ?? 'No Property' }} - {{ $booking->package->name ?? 'No Package' }} ({{ $booking->user->name ?? 'No User' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="scheduled_time" class="block text-sm font-medium text-gray-700 mb-2">
                    Scheduled Time
                </label>
                <input type="datetime-local" name="scheduled_time" id="scheduled_time" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Status
                </label>
                <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="remarks" class="block text-sm font-medium text-gray-700 mb-2">
                    Remarks
                </label>
                <textarea name="remarks" id="remarks" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter any remarks or notes"></textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('service_provider.tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded shadow-md">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow-md">
                    Create Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
