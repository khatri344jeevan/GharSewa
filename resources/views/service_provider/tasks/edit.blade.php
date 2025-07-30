@extends('service_provider.layouts.master')

@section('title', 'Edit Task')

@section('content')
<div class=" mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full ml-96">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Task</h2>

        <form action="{{ route('service_provider.tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Package Name
                </label>
                <input type="text" value="{{ $task->booking->package->name ?? 'N/A' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Property Title
                </label>
                <input type="text" value="{{ $task->booking->property->title ?? 'N/A' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Owner Name
                </label>
                <input type="text" value="{{ $task->booking->user->name ?? 'N/A' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
            </div>

            <div class="mb-4">
                <label for="scheduled_time" class="block text-sm font-medium text-gray-700 mb-2">
                    Scheduled Time
                </label>
                <input type="datetime-local" name="scheduled_time" id="scheduled_time"
                       value="{{ $task->scheduled_time ? $task->scheduled_time->format('Y-m-d\TH:i') : '' }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500">
            </div>

            <div class="mb-4">
                <label for="completed_time" class="block text-sm font-medium text-gray-700 mb-2">
                    Completed Time
                </label>
                <input type="datetime-local" name="completed_time" id="completed_time"
                       value="{{ $task->completed_time ? $task->completed_time->format('Y-m-d\TH:i') : '' }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Status
                </label>
                <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500" required>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $task->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="remarks" class="block text-sm font-medium text-gray-700 mb-2">
                    Remarks
                </label>
                <textarea name="remarks" id="remarks" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500" placeholder="Enter any remarks or notes">{{ $task->remarks }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('service_provider.tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded shadow-md">
                    Cancel
                </a>
                <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-2 rounded shadow-md">
                    Update Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
