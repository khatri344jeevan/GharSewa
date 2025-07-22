@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')

    <div class="flex items-center justify-between space-x-4 ">

        <!-- Add Record Button -->
        <button
            class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded transition duration-300 shadow-md">
            <a href="{{ route('user.Bookings.b_create') }}">Add record</a>
        </button>




@endsection
