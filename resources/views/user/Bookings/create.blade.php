@extends('user.layout.master')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Book a Package</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user.Bookings.b_store') }}" method="POST">
        @csrf

        {{-- Property Selection --}}
        <div class="mb-4">
            <label for="property_id" class="block font-semibold mb-1">Select Property</label>
            <select name="property_id" id="property_id" class="w-full border-gray-300 rounded p-2" required>
                <option value="" disabled selected>-- Choose Property --</option>
                @foreach($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->title }} - {{ $property->address }}</option>
                @endforeach
            </select>
        </div>

        {{-- Package Selection --}}
        <div class="mb-4">
            <label for="package_id" class="block font-semibold mb-1">Select Package</label>
            <select name="package_id" id="package_id" class="w-full border-gray-300 rounded p-2" required>
                <option value="" disabled selected>-- Choose Package --</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}">
                        {{ $package->name }} (Rs. {{ $package->price }} | {{ $package->duration_days }} Days | Limit: {{ $package->service_limit }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Booking Date --}}
        <div class="mb-4">
            <label for="booking_date" class="block font-semibold mb-1">Booking Date</label>
            <input type="date" name="booking_date" id="booking_date" class="w-full border-gray-300 rounded p-2" required>
        </div>

        {{-- Submit --}}
        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Confirm Booking
            </button>
        </div>
    </form>
</div>
@endsection
