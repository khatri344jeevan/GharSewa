@extends('admin.layout.master')
@section('title', 'Service Providers Management')

@section('content')
    <div class="container py-4">


        {{-- @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif --}}

        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4 bg-white rounded-xl shadow-md  p-6">
            <h4 class="text-gray-800 font-bold text-2xl">Service Providers List</h4>
            <a href="{{ route('admin.service_providers.create') }}"
                class="btn btn-primary text-white bg-gray-700 rounded px-4 py-3 flex items-center gap-2 shadow">
                <i class="bi bi-plus-lg"></i>
                <span>Add Service Provider</span>
            </a>
        </div>

        <div class="bg-white rounded shadow-sm p-2">
            <div class="overflow-x-auto">
                <div class="w-full mx-auto">
                    <table class="min-w-full table-auto border border-gray-200 rounded overflow-hidden text-sm">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="text-center px-2 py-2">SN</th>
                                <th class="px-2 py-2">Name</th>
                                <th class="px-2 py-2">Email</th>
                                <th class="px-2 py-2">Phone</th>
                                <th class="px-2 py-2">Specialization</th>
                                <th class="px-2 py-2">Address</th>
                                <th class="px-2 py-2">Bio</th>
                                <th class="text-center px-2 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviceProviders as $serviceProvider)
                                <tr>
                                    <td class="text-center font-bold px-2 py-2 ">{{ $loop->iteration }}</td>
                                    <td class="px-2 py-2 ">
                                        <div class="flex items-center gap-1">
                                            <span>{{ $serviceProvider->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-2 py-2 ">{{ $serviceProvider->email }}</td>
                                    <td class="px-2 py-2 ">{{ $serviceProvider->phone }}</td>
                                    <td class="px-2 py-2 ">{{ $serviceProvider->specialization }}</td>
                                    <td class="px-2 py-2 ">{{ $serviceProvider->user->address }}</td>
                                    <td class="px-2 py-2 ">{{ $serviceProvider->bio }}</td>
                                    <td class="text-center px-2 py-2">
                                        <div class="flex flex-row gap-2 justify-center">
                                            <a href="{{ route('admin.service_providers.edit', $serviceProvider) }}"
                                                class="bg-blue-700 hover:bg-blue-800 text-white text-xs px-4 py-3 rounded shadow-sm flex items-center gap-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form method="POST"
                                                action="{{ route('admin.service_providers.destroy', $serviceProvider) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this service provider?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-700 hover:bg-red-800 text-white text-xs px-4 py-3 rounded shadow-sm flex items-center gap-1">
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
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $serviceProviders->links() }}
        </div>
    </div>
@endsection
