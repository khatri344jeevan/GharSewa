@extends('admin.layout.master')

@section('title', 'Payments')

@section('content')
    <div class="flex bg-gray-100 py-8">
        <div class="w-full max-w-4xl rounded-lg shadow-lg p-6">
            @auth
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Payments</h2>
            @endauth
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">User Name</th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Property Title</th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Package Title</th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Payment Date</th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($payments as $payment)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-4 py-2">{{ $payment->id }}</td>
                                <td class="px-4 py-2">{{ $payment->user->name }}</td>
                                <td class="px-4 py-2">{{ $payment->booking->property->title }}</td>
                                <td class="px-4 py-2">{{ $payment->package->name }}</td>
                                <td class="px-4 py-2">{{ $payment->payment_date }}</td>
                                <td class="px-4 py-2 font-semibold text-green-600">Rs {{ number_format($payment->amount, 2) }}</td>
                                <td class="px-4 py-2">
                                    @if ($payment->payment_status === 'Completed')
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded">Completed</span>
                                    @elseif($payment->payment_status === 'Pending')
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded">Pending</span>
                                    @else
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded">{{ $payment->payment_status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
