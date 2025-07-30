@extends('admin.layout.master')
@section('title', 'Admin Users Management')

@section('content')
    <div class="container mx-auto py-8 px-4">

        <div class="flex items-center justify-between mb-6 bg-gray-100 rounded-lg shadow-sm px-6 py-4">
            <h4 class="text-2xl font-bold text-gray-800"> Add New User</h4>
            <a href="{{ route('admin.users.index') }}"
               class="inline-flex items-center bg-gray-700 hover:bg-gray-800 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow">
                <i class="bi bi-arrow-left mr-2"></i> Back
            </a>
        </div>


        <div class="bg-white rounded-xl shadow-lg p-8">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div >
                        <label class="block text-xl font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name"
                            class="w-full px-3 h-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:border-gray-600"
                            placeholder="Enter user name">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div >
                        <label class="block text-xl font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email"
                            class="w-full px-3 h-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:border-gray-600"
                            placeholder="Enter user email">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div >
                        <label class="block text-xl font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password"
                            class="w-full px-3 h-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:border-gray-600"
                            placeholder="Enter user password">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div >
                        <label class="block text-xl font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-3 h-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:border-gray-600"
                            placeholder="Confirm user password">
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div >
                        <label class="block text-xl font-medium text-gray-700 mb-1">Address</label>
                        <input type="text" name="address"
                            class="w-full px-3 h-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:border-gray-600"
                            placeholder="Enter user address">
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div >
                        <label class="block text-xl font-medium text-gray-700 mb-1">Phone</label>
                        <input type="text" name="phone"
                            class="w-full px-3 h-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:border-gray-600"
                            placeholder="Enter user phone">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div >
                        <label class="block text-xl font-medium text-gray-700 mb-1">Role</label>
                        <select name="role"
                            class="w-full px-3 h-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:border-gray-600">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="service_provider">Provider</option>
                        </select>
                        @error('role')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

             
                <div class="mt-8">
                    <button type="submit"
                        class="w-full h-12 bg-gray-700 hover:bg-gray-800 text-white font-bold py-3 px-4 rounded-lg shadow transition duration-200">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
