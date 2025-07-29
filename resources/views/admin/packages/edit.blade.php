@extends('admin.layout.master')
@section('title', 'Admin Users Management')
@section('content')
    <div class="container py-4">
        <div class="mb-3 bg-inherit rounded-lg shadow p-4 flex justify-between items-center">
            <h4 class="text-gray-800 float-start text-bold text-2xl">Add Package</h4>
            <a href="{{ route('admin.packages.index') }}"
                class="btn btn-danger text-white bg-gray-700 float-end rounded px-4 py-2">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST"
                class="bg-white p-6 rounded-lg shadow-md grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Package Name</label>
                    <input type="text" name="name"
                        class="form-control mt-1 block w-full border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2"
                        placeholder="Enter package name" value="{{ $package->name }}">
                    @error('name')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Price</label>
                    <input type="text" name="price"
                        class="form-control mt-1 block w-full border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2"
                        placeholder="Enter package price" value="{{ $package->price }}">
                    @error('price')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Duration Days</label>
                    <input type="text" name="duration_days"
                        class="form-control mt-1 block w-full border  rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2"
                        placeholder="Enter package duration in days " value="{{ $package->duration_days }}">
                    @error('duration_days')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">No of Visits</label>
                    <input type="text" name="service_limit"
                        class="form-control mt-1 block w-full border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2"
                        placeholder="Enter package duration in days" value="{{ $package->service_limit }}">
                    @error('service_limit')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xl font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description"
                        class="form-control mt-1 block w-full border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2"
                        placeholder="Enter package description ">{{ $package->description }}</textarea>
                    @error('description')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-4 px-4 rounded-lg transition duration-200">Update
                        Package</button>
                </div>
            </form>
        </div>
    </div>
@endsection
