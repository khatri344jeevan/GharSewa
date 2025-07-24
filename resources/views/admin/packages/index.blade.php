@extends('admin.layout.master')
@section('title', 'Admin Users Management')
@section('content')
    <div class="container py-8">
        <!-- Success/Error Messages -->
        {{-- @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <h4 class="text-gray-900 font-bold text-2xl mb-4 md:mb-0">Package List</h4>
            <a href="{{ route('admin.packages.create') }}"
                class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg px-5 py-2 shadow transition">
                <i class="bi bi-plus-lg"></i> Add Package
            </a>
        </div>

        <div class="bg-white rounded-xl shadow overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-center px-4 py-3">SN</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Duration Days</th>
                        <th class="px-4 py-3">No of Visits</th>
                        <th class="text-center px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="text-center font-bold px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                <span class="font-medium text-gray-800">{{ $package->name }}</span>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $package->description }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $package->price }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $package->duration_days }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $package->service_limit }}</td>
                            <td class="text-center px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.packages.edit', $package->id) }}"
                                        class="bg-blue-700 hover:bg-blue-800 text-white text-xs px-3 py-1 rounded shadow flex items-center gap-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.packages.destroy', $package->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this package?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-700 hover:bg-red-800 text-white text-xs px-3 py-1 rounded shadow flex items-center gap-1">
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

        <div class="flex justify-end mt-8">
            {{ $packages->links() }}
        </div>
    </div>
@endsection
