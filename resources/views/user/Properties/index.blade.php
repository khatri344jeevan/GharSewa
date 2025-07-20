@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')

<div class="flex items-center justify-between space-x-4 ">

    <!-- Add Record Button -->
    <button class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded transition duration-300">
       <a href="{{route('user.Properties.p_create')}}">Add record</a>
    </button>

    <!-- Search Bar -->
    {{-- <div class="flex items-center bg-gray-100 rounded-lg">
        <input
            type="text"
            placeholder="Search..."
            class="px-4 py-2 w-64 text-gray-700 bg-white border border-gray-300 rounded-l-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        />
        <button
            class="flex items-center px-4 text-white bg-blue-500 rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            🔍
        </button>
    </div> --}}

</div>
<div class="card-body">
<table>
    <thead>
        <th>Id</th>
        <th>Property Title</th>
        <th>Address</th>
        <th>Coordinates of Map</th>

    </thead>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

</table>
</div>



@endsection
