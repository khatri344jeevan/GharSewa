@extends('admin.layout.master')
@section('title', 'Assign Service Provider')

@section('content')
    <div class="container py-8">
        <div class="mb-6">
            <a href="{{ route('admin.bookings.index') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 hover:bg-blue-200 hover:text-blue-900 rounded transition-colors duration-150 font-medium shadow-sm">
                <i class="bi bi-arrow-left mr-2"></i> Back to Bookings
            </a>
            <h4 class="text-gray-900 font-extrabold text-3xl mt-2">Assign Service Provider</h4>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <form method="POST" action="{{ route('admin.bookings.assign', $booking->id) }}">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Provider</label>
                        <select name="provider_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Service Provider</option>
                            @foreach ($serviceProviders as $provider)
                                <option value="{{ $provider->id }}">
                                    {{ $provider->name }} - {{ $provider->specialization }}
                                </option>
                            @endforeach
                        </select>
                        @error('provider_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Scheduled Date</label>
                        <input type="datetime-local" name="scheduled_date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('scheduled_date') }}" required>
                        @error('scheduled_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Note (Optional)</label>
                    <textarea name="note" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Any special instructions...">{{ old('note') }}</textarea>
                    @error('note')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md transition">
                        Assign Provider
                    </button>
                    <a href="{{ route('admin.bookings.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
