@extends('admin.layout.master')
@section('title', 'User Details')

@section('content')
    <div class="container py-4">
        <div class="mb-3 bg-inherit rounded-lg shadow p-4 flex justify-between items-center">
            <h4 class="text-gray-800 float-start text-bold text-2xl">User Details</h4>
            <a href="{{ route('admin.users.index') }}"
                class="btn btn-danger  text-white bg-gray-700 float-end rounded px-4 py-2">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <p class="px-3 py-2 bg-gray-50 border border-gray-300 rounded-md">{{ $user->name }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <p class="px-3 py-2 bg-gray-50 border border-gray-300 rounded-md">{{ $user->email }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <p class="px-3 py-2 bg-gray-50 border border-gray-300 rounded-md">
                        {{ $user->role }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <p class="px-3 py-2 bg-gray-50 border border-gray-300 rounded-md">{{ $user->phone ?? 'Not provided' }}
                    </p>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <p class="px-3 py-2 bg-gray-50 border border-gray-300 rounded-md">{{ $user->address }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Created At</label>
                    <p class="px-3 py-2 bg-gray-50 border border-gray-300 rounded-md">
                        {{ $user->created_at->format('M d, Y h:i A') }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Updated</label>
                    <p class="px-3 py-2 bg-gray-50 border border-gray-300 rounded-md">
                        {{ $user->updated_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('admin.users.edit', $user->id) }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                    <i class="bi bi-pencil-square"></i> Edit User
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                    <i class="bi bi-list"></i> All Users
                </a>
            </div>
        </div>
    </div>
@endsection
