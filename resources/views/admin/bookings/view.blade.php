@extends('admin.layout.master')
@section('title', 'Booking Details')

@section('content')
    <div class="container py-8">
        <div class="mb-6">
            <a href="{{ route('admin.bookings.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-700 text-white hover:bg-gray-600 hover:text-white-900 rounded transition-colors duration-150 font-medium shadow-sm">
                <i class="bi bi-arrow-left mr-2"></i> Back to Bookings
            </a>
            <h4 class="text-gray-900 font-extrabold text-3xl mt-2">Booking Details</h4>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-xl shadow-lg p-6">
                <h5 class="text-lg font-semibold mb-4">Booking Information</h5>
                <div class="space-y-3">
                    <div><strong>Booking ID:</strong> {{ $booking->id }}</div>
                    <div><strong>Status:</strong>
                        <span
                            class="px-2 py-1 rounded text-xs font-semibold
                            @if ($booking->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($booking->status === 'approved') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                    <div><strong>Booking Date:</strong>
                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y H:i') }}</div>
                    <div><strong>Created:</strong> {{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y H:i') }}
                    </div>

                </div>
            </div>


            <div class="bg-white rounded-xl shadow-lg p-6">
                <h5 class="text-lg font-semibold mb-4">Customer Information</h5>
                <div class="space-y-3">
                    <div><strong>Name:</strong> {{ $booking->user->name }}</div>
                    <div><strong>Email:</strong> {{ $booking->user->email }}</div>
                    <div><strong>Phone:</strong> {{ $booking->user->phone ?? 'N/A' }}</div>
                    <div><strong>Address:</strong> {{ $booking->user->address ?? 'N/A' }}</div>
                </div>
            </div>


            <div class="bg-white rounded-xl shadow-lg p-6">
                <h5 class="text-lg font-semibold mb-4">Property Information</h5>
                <div class="space-y-3">
                    <div><strong>Title:</strong> {{ $booking->property->title }}</div>
                    <div><strong>Address:</strong> {{ $booking->property->address }}</div>
                    <div><strong>Type:</strong> {{ $booking->property->type }}</div>
                </div>
            </div>


            <div class="bg-white rounded-xl shadow-lg p-6">
                <h5 class="text-lg font-semibold mb-4">Package Information</h5>
                <div class="space-y-3">
                    <div><strong>Package:</strong> {{ $booking->package->name }}</div>
                    <div><strong>Price:</strong> Rs. {{ number_format($booking->package->price, 2) }}</div>
                    <div><strong>Duration:</strong> {{ $booking->package->duration_days }} days</div>
                    <div><strong>Service Limit:</strong> {{ $booking->package->service_limit }}</div>
                </div>
            </div>
        </div>

        
        @if ($booking->bookingDetails->isNotEmpty())
            <div class="bg-white rounded-xl shadow-lg p-6 mt-6">
                <h5 class="text-lg font-semibold mb-4">Assigned Service Provider</h5>
                @foreach ($booking->bookingDetails as $detail)
                    <div class="border-b pb-4 mb-4 last:border-b-0 last:pb-0 last:mb-0">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div><strong>Provider:</strong> {{ $detail->provider->name }}</div>
                                <div><strong>Email:</strong> {{ $detail->provider->email }}</div>
                                <div><strong>Phone:</strong> {{ $detail->provider->phone ?? 'N/A' }}</div>
                                <div><strong>Specialization:</strong> {{ $detail->provider->specialization }}</div>
                            </div>
                            <div>
                                <div><strong>Scheduled Date:</strong>
                                    {{ \Carbon\Carbon::parse($detail->scheduled_date)->format('M d, Y H:i') }}</div>

                            </div>
                        </div>
                        <div><strong>Note:</strong> {{ $detail->note ?? 'No notes' }}</div>
                    </div>
            </div>
        @endforeach
    </div>
    @endif
    </div>
@endsection
