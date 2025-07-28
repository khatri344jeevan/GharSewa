@extends('admin.layout.master')
@section('title', 'Admin Bookings Management')

@section('content')
    <div class="container py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h4 class="text-gray-900 font-extrabold text-3xl mb-4 md:mb-0">Bookings List</h4>
        </div>

        {{-- @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif --}}

        <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-900">
                    <tr>
                        <th class="text-center px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">SN
                        </th>
                        <th class="px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Property</th>
                        <th class="px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">User</th>
                        <th class="px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Package</th>
                        <th class="px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Booking Date</th>
                        <th class="px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Provider</th>
                        <th class="text-center px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="text-center font-bold px-4 py-4 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4 text-gray-700">{{ $booking->property->title ?? 'N/A' }}</td>
                            <td class="px-4 py-4 text-gray-700">{{ $booking->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-4 text-gray-700">{{ $booking->package->name ?? 'N/A' }}</td>
                            <td class="px-4 py-4 text-gray-700">{{ $booking->booking_date->format('M d, Y') }}</td>
                            <td class="px-4 py-4">
                                @switch($booking->status)
                                    @case('pending')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                                    @break

                                    @case('confirmed')
                                    @case('approved')
                                        <span
                                            class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Approved</span>
                                    @break

                                    @case('rejected')
                                        <span
                                            class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">Rejected</span>
                                    @break

                                    @default
                                        <span
                                            class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs font-semibold">{{ ucfirst($booking->status) }}</span>
                                @endswitch
                            </td>
                            <td class="px-4 py-4 text-gray-700">
                                @if ($booking->bookingDetails->isNotEmpty())
                                    {{ $booking->bookingDetails->first()->provider->name ?? 'Provider Assigned' }}
                                @else
                                    Not Assigned
                                @endif
                            </td>
                            <td class="text-center px-4 py-4">
                                <div class="flex flex-col items-center space-y-2">
                                    <div class="flex flex-row space-x-2">
                                        <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                            class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white text-xs px-4 py-2 rounded shadow transition min-w-[90px]">
                                            <i class="bi bi-eye mr-1"></i> View
                                        </a>
                                        @if ($booking->status === 'pending' || $booking->status === 'approved')
                                            <a href="{{ route('admin.bookings.assign', $booking->id) }}"
                                                class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white text-xs px-4 py-2 rounded shadow transition min-w-[90px]">
                                                <i class="bi bi-person-plus mr-1"></i> Assign
                                            </a>
                                        @endif
                                    </div>
                                    <div class="flex flex-row space-x-2">
                                        @if ($booking->status === 'pending')
                                            <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 text-white text-xs px-4 py-2 rounded shadow transition min-w-[90px]">
                                                    <i class="bi bi-check-circle mr-1"></i> Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white text-xs px-4 py-2 rounded shadow transition min-w-[90px]">
                                                    <i class="bi bi-x-circle mr-1"></i> Reject
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-8 text-gray-500">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $bookings->links() }}
            </div>
        </div>
    @endsection
