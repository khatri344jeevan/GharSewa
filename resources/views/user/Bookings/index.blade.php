@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')

    <div class="flex items-center justify-between space-x-4 ">

        <!-- Add Record Button -->
        <a href="{{ route('user.Bookings.b_create') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded shadow-md mt-20">
           Add Booking
        </a>
    </div>

    <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left">Id</th>
                    <th class="px-6 py-3 text-left">Package Name</th>
                    <th class="px-6 py-3 text-left">Price</th>
                    <th class="px-6 py-3 text-left">Total Days</th>
                    <th class="px-6 py-3 text-left">Number of visits</th>
                    <th class="px-6 py-3 text-left">Details</th>
                    {{-- <th class="px-6 py-3 text-left">Actions</th> --}}
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $booking->package->name }}</td>
                        <td class="px-6 py-4">{{ $booking->package->price }}</td>
                        <td class="px-6 py-4">{{ $booking->package->duration_days }}</td>
                        <td class="px-6 py-4">{{ $booking->package->service_limit }}</td>
                        <td class="px-6 py-4">{{ $booking->package->description }}</td>
                        {{-- <td class="px-6 py-4 flex space-x-3">
                            <!-- Edit -->
                            <div>
                                {{-- <a href="//{{ route('user.Bookings.b_edit', $booking->id) }}" --}}
                                    {{-- <a href="/"
                                    class="hover:underline hover:bg-blue-600 font-medium border bg-blue-500 text-white py-2 px-6 rounded transition duration-200">
                                    Edit
                                </a>
                            </div>  --}}
                            <!-- Delete -->
                            {{-- <div>
                                <form action="{{ route('user.Bookings.destroy', $booking->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="hover:underline hover:bg-red-700 font-medium border bg-red-600 text-white py-2 px-4 rounded transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
