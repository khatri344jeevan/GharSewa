@extends('user.layout.master')

@section('title', 'Booking Details')

@section('content')
    <div class="p-6 bg-white rounded shadow mt-20">
        <h2 class="text-4xl font-semibold mb-4 text-gray-700">Booking Details</h2>

        {{-- <p><strong>Booking ID:</strong> {{ $booking->id }}</p> --}}
        <p class="px-1 py-1 text-md ">Status : {{ucfirst(($booking->status))}}</p>
        <p class="px-1 py-1 text-md">Booking Date : {{$booking->booking_date}}</p>

        <h3 class="mt-6 text-xl font-bold">Scheduled Services</h3>

        @if ($booking->bookingDetails->isEmpty())
            <p class="bg-red-200 mt-2">You services is <strong>Under approval</strong>, please Explore other Services!</p>
        @else
            <table class="w-full mt-4 table-auto border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border">Scheduled Date</th>
                        <th class="p-2 border">Details</th>
                        <th class="p-2 border">Note</th>
                        <th class="p-2 border">Assigned Provider</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking->bookingDetails as $detail)
                        <tr>
                            <td class="p-2 border">{{ $detail->scheduled_date }}</td>
                            <td class="p-2 border">{{ $booking->package->description}}</td>
                            <td class="p-2 border">{{ $detail->note ?? 'N/A' }}</td>
                            <td class="p-2 border">
                                @if ($detail->provider)
                                    {{ $detail->provider->name }}
                                @else
                                    <span class="text-gray-500">Not Assigned</span>
                                @endif
                            </td>
                            <td class="p-2 border text-center">
                                @if ($booking->status === 'approved')
                                    <form action="/" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                                            Pay Now
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-sm">N/A</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="mt-10">
            <a href="{{ route('user.Bookings.b_index') }}" class="text-white text-md hover:underline border bg-gray-600 px-4 py-4 rounded">
                <i class="bi bi-chevron-double-left">Bookings</i></a>
        </div>
    </div>
@endsection
