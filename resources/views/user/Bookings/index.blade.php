@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')

    <div class="flex items-center justify-between space-x-4 ">

        <a href="{{ route('user.Bookings.b_create') }}"
            class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded shadow-md mt-20">
            <i class="bi bi-plus-lg mr-3"></i>Add Booking
        </a>
    </div>

    <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gray-300 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3  text-center">Id</th>
                    <th class="px-6 py-3  text-center">Package Name</th>
                    <th class="px-6 py-3  text-center">Property Title</th>
                    <th class="px-6 py-3  text-center">Price</th>
                    <th class="px-6 py-3  text-center">Total Days</th>
                    <th class="px-6 py-3  text-center">Status</th>
                    <th class="px-6 py-3  text-center">Number of visits</th>
                    <th class="px-6 py-3  text-center">Action</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-center">{{ $booking->package->name }}</td>
                        <td class="px-6 py-4 text-center">{{ $booking->property->title ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center">{{ $booking->package->price }}</td>
                        <td class="px-6 py-4 text-center">{{ $booking->package->duration_days }}</td>
                        <td class="px-6 py-4 text-center">{{ ucfirst($booking->status) }}</td>
                        <td class="px-6 py-4 text-center">{{ $booking->package->service_limit }}</td>
                        <td>
                            <div class="border bg-gray-600 rounded px-3 py-2 mr-8 text-white hover:bg-gray-700  ">
                                <a href="{{ route('user.Bookings.b_show', $booking->id) }}">
                                    <button class="text-center  px-3">
                                        <i class="bi bi-eye mr-3"></i>VIEW</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
