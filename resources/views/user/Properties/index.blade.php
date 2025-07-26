@extends('user.layout.master')

@section('title', 'User Dashboard')

@section('content')

@include('toaster.toaster')

    <div class="flex items-center justify-between space-x-4 ">
        <!-- Add Record Button -->
        <button class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded  shadow-md  mt-20">
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
                    <th class="px-6 py-3 text-left">Property Image</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($properties as $property)
                    <tr class="hover:bg-gray-50 transition duration-300">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $property->title }}</td>
                        <td class="px-6 py-4">{{ $property->address }}</td>
                        <td class="px-6 py-4">{{ $property->type }}</td>
                        <td class="px-6 py-4">{{ $property->maplocation }}</td>
                        <td class="px-6 py-4">
                            @if ($property->image)
                                <img src="{{ asset('uploads/properties/' . $property->image) }}" alt="Property Image"
                                    class="w-30 h-20 object-cover rounded">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>


                        {{-- <td class="px-6 py-4 flex space-x-3 pt-16">
                            <div class="flex mb-3">
                                <a href="{{ route('user.Properties.p_edit', $property->id) }}"
                                    class="flex items-center justify-center space-x-2 text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg shadow-md transition duration-200">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                            </div>

                            <div>
                                <form action="{{ route('user.Properties.destroy', $property->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this property?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center justify-center space-x-2 text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg shadow-md transition duration-200">
                                        <i class="fas fa-trash-alt"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>

                            <div>
                                <a href="{{ route('user.Bookings.b_create') }}"
                                    class="flex items-center justify-center space-x-2 text-white bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-lg shadow-md transition duration-200">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Book Package</span>
                                </a>
                            </div>
                        </td> --}}
                        <td class="px-6 py-4">
                            <div class="flex flex-col space-y-3">
                                <!-- Edit Button -->
                                <a href="{{ route('user.Properties.p_edit', $property->id) }}"
                                    class="flex items-center justify-center space-x-2 text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg shadow-md transition duration-200">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('user.Properties.destroy', $property->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this property?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center justify-center space-x-2 text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg shadow-md transition duration-200">
                                        <i class="fas fa-trash-alt"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>

                                <!-- Book Button -->
                                <a href="{{ route('user.Bookings.b_create') }}"
                                    class="flex items-center justify-center space-x-2 text-white bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-lg shadow-md transition duration-200">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Book Package</span>
                                </a>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
