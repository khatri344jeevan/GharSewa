@extends('admin.layout.master')
@section('title', 'Admin Users Management')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <div class="flex justify-between items-center mb-6 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-3xl font-semibold text-gray-800">Edit User</h2>
            <a href="{{ route('admin.users.index') }}"
                class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition duration-150">
                <i class="bi bi-arrow-left mr-1"></i> Back
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $user->name }}">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $user->email }}">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Leave blank to keep current password">
                    <small class="text-gray-500">Leave blank to keep the current password</small>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $user->address }}">
                    @error('address')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $user->phone }}">
                    @error('phone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="block text-xl font-medium text-gray-700 mb-1">Role</label>
                    <select name="role"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="service_provider" {{ $user->role === 'service_provider' ? 'selected' : '' }}>Provider</option>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

              
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-5 rounded-lg transition duration-200 shadow">
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
