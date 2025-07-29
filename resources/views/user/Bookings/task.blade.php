@extends('user.layout.master')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-10">
        <a href="{{ url()->previous() }}" class="inline-block mb-6 px-4 py-2 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
            &larr; Back
        </a>
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Booking Tasks for Booking No. #{{ $booking->id }}</h1>

        <h2 class="text-lg font-semibold mt-8 text-blue-700 border-b border-gray-200 pb-2">Property Information</h2>
        <p class="mt-2 text-gray-700"><span class="font-semibold">Name:</span> {{ $booking->property->title ?? 'N/A' }}</p>
        <p class="text-gray-700"><span class="font-semibold">Address:</span> {{ $booking->property->address ?? 'N/A' }}</p>

        <h2 class="text-lg font-semibold mt-8 text-blue-700 border-b border-gray-200 pb-2">Package Information</h2>
        <p class="mt-2 text-gray-700"><span class="font-semibold">Package Name:</span> {{ $booking->package->name ?? 'N/A' }}</p>
        <p class="text-gray-700"><span class="font-semibold">Price:</span> {{ $booking->package->price ?? 'N/A' }}</p>

        <h2 class="text-lg font-semibold mt-8 text-blue-700 border-b border-gray-200 pb-2">Tasks</h2>
        <ul class="mt-4 space-y-4">
            @foreach($booking->tasks as $task)
                <li class="bg-blue-50 border border-blue-100 rounded-lg p-5">
                    <div class="font-semibold text-green-700">{{ $task->description }}</div>
                    <div class="font-bold text-purple-700 mt-1">Status: {{ $task->status }}</div>
                    <div class="text-gray-500 text-sm mt-1">
                        Provider: {{ $task->provider->name ?? 'N/A' }}                </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endsection
