@extends('admin.layout.master')
@section('title', 'Admin Users Management')

@section('content')
    <div class="container py-4">
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

        <div class="mb-3 bg-white rounded-xl shadow-md p-6 flex justify-between items-center">
            <h4 class="text-gray-800 float-start text-bold text-2xl">Users List</h4>
            <a href="{{ route('admin.users.create') }}"
                class="btn btn-primary  text-white bg-gray-700 float-end rounded px-4 py-2">
                <i class="bi bi-plus-lg"></i> Add User
            </a>
        </div>

        <div class="table-responsive">
            <div class="w-full max-w-7xl mx-auto">
                <table class="min-w-full table-auto border border-gray-200 rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-center px-6 py-3">SN</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Role</th>
                            <th class="text-center px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center font-bold px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <div class="ml-20">
                                        <span
                                        class="bg-gray-600 text-white px-6 py-3 rounded-lg text-xs">{{ $user->role }}</span>
                                    </div>
                                </td>
                                <td class="text-center px-6 py-4">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="bg-blue-700 hover:bg-blue-800 text-white text-xs px-4 py-2 rounded mr-2 shadow">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                        class="bg-green-700 hover:bg-green-800 text-white text-xs px-4 py-2 rounded mr-2 shadow">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                        style="display: inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-700 hover:bg-red-800 text-white text-xs px-4 py-2 rounded shadow">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
@endsection
