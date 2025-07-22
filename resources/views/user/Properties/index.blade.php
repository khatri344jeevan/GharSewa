@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')

    <div class="flex items-center justify-between space-x-4 ">

        <!-- Add Record Button -->
        <button
            class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded  shadow-md  mt-20">
            <a href="{{ route('user.Properties.p_create') }}">Add Property</a>
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

        </button>
    </div> --}}

    </div>

    <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left">Id</th>
                    <th class="px-6 py-3 text-left">Property Title</th>
                    <th class="px-6 py-3 text-left">Address</th>
                    <th class="px-6 py-3 text-left">Type</th>
                    <th class="px-6 py-3 text-left">Coordinates of Map</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($properties as $property)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4">{{$loop->iteration}}</td>
                        <td class="px-6 py-4">{{ $property->title }}</td>
                        <td class="px-6 py-4">{{ $property->address }}</td>
                        <td class="px-6 py-4">{{ $property->type }}</td>
                        <td class="px-6 py-4">{{ $property->maplocation }}</td>
                        <td class="px-6 py-4 flex space-x-3 ">
                            <div class="flex mb-3">
                                <a href="{{ route('user.Properties.p_edit', $property->id) }}"
                                class=" hover:underline hover:bg-blue-600 font-medium border bg-blue-500 text-white py-2 px-6  rounded">Edit</a>
                            </div>
                            {{-- //delete --}}
                            <div>
                                <form action="{{ route('user.Properties.destroy', $property->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this property?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" hover:underline hover:bg-red-700 font-medium border bg-red-600 text-white py-2 px-4 rounded ">Delete</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
