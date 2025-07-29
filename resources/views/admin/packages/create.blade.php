@extends('admin.layout.master')

@section('title', 'Admin Users Management')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6 bg-gray-100 p-4 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-gray-800">Add New Package</h2>
        <a href="{{ route('admin.packages.index') }}"
            class="inline-flex items-center bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 transition duration-150 ease-in-out">
            <i class="bi bi-arrow-left mr-2"></i> Back
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <form action="{{ route('admin.packages.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- Package Name --}}
            <div class="mb-5">
                <label for="name" class="block text-xl font-medium text-gray-700">Package Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    placeholder="Enter package name" value="{{ old('name') }}">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price --}}
            <div class="mb-5">
                <label for="price" class="block text-xl font-medium text-gray-700">Price</label>
                <input type="text" name="price" id="price"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    placeholder="Enter package price" value="{{ old('price') }}">
                @error('price')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Duration Days --}}
            <div class="mb-5">
                <label for="duration_days" class="block text-xl font-medium text-gray-700">Duration (in days)</label>
                <input type="text" name="duration_days" id="duration_days"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    placeholder="e.g. 30, 180, 365" value="{{ old('duration_days') }}">
                @error('duration_days')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Service Limit --}}
            <div class="mb-5">
                <label for="service_limit" class="block text-xl font-medium text-gray-700">No. of Visits</label>
                <input type="text" name="service_limit" id="service_limit"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    placeholder="Enter number of service visits" value="{{ old('service_limit') }}">
                @error('service_limit')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-5 md:col-span-2">
                <label for="description" class="block text-xl font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    placeholder="Brief description about the package">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="md:col-span-2">
                <button type="submit"
                    class="w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Create Package
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
