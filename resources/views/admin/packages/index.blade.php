@extends('admin.layout.master')

@section('title', 'Admin Package Management')

@section('content')
    <div class="container py-8">
        {{-- Header & Add Button --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 bg-white rounded-xl shadow-md p-6">
            <h4 class="text-gray-900 font-bold text-2xl mb-4 md:mb-0">Package List</h4>
            <a href="{{ route('admin.packages.create') }}"
                class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-800 text-white font-semibold rounded-lg px-5 py-2 shadow transition">
                <i class="bi bi-plus-lg"></i> Add Package
            </a>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3 text-center">SN</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Description</th>
                        <th class="px-4 py-3 text-left">Price</th>
                        <th class="px-4 py-3 text-left">Duration Days</th>
                        <th class="px-4 py-3 text-left">No of Visits</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 text-center font-bold">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $package->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $package->description }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $package->price }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $package->duration_days }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $package->service_limit }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.packages.edit', $package->id) }}"
                                        class="bg-blue-700 hover:bg-blue-800 text-white text-xs px-3 py-2 rounded shadow flex items-center gap-1 no-underline">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.packages.destroy', $package->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this package?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-700 hover:bg-red-800 text-white text-xs px-3 py-2 rounded shadow flex items-center gap-1 no-underline">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex justify-end mt-8">
            {{ $packages->links() }}
        </div>
    </div>
@endsection
