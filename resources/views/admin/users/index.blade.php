@extends('admin.layout.master')
@section('title', 'Admin Users Management')

@section('content')
<div class="container mx-auto px-4 py-6">

    <!-- Success/Error Messages -->
    {{-- Uncomment if needed
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6" role="alert">
            {{ session('error') }}
        </div>
    @endif
    --}}

    <div class="flex flex-col sm:flex-row sm:justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-2xl font-semibold text-gray-800">Users List</h2>
        <a href="{{ route('admin.users.create') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white rounded px-5 py-2 text-center w-full sm:w-auto text-base sm:text-lg transition">
           <i class="bi bi-plus-lg mr-1"></i> Add User
        </a>
    </div>

    <!-- Responsive Table Wrapper -->
    <div class="overflow-x-auto border border-gray-200 rounded-lg shadow">
        <table class="min-w-full border-collapse table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-3 py-2 text-center text-sm sm:text-base border-r border-gray-700">SN</th>
                    <th class="px-3 py-2 text-left text-sm sm:text-base border-r border-gray-700">Name</th>
                    <th class="px-3 py-2 text-left text-sm sm:text-base border-r border-gray-700">Email</th>
                    <th class="px-3 py-2 text-left text-sm sm:text-base border-r border-gray-700">Role</th>
                    <th class="px-3 py-2 text-center text-sm sm:text-base">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-3 py-2 text-center text-sm sm:text-base font-semibold">{{ $loop->iteration }}</td>
                    <td class="px-3 py-2 text-sm sm:text-base">{{ $user->name }}</td>
                    <td class="px-3 py-2 text-sm sm:text-base">{{ $user->email }}</td>
                    <td class="px-3 py-2 text-sm sm:text-base">
                        <span class="bg-gray-600 text-white px-3 py-1 rounded-full text-xs sm:text-sm">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="px-3 py-2">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-center gap-2 sm:gap-3">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="bg-blue-700 hover:bg-blue-800 text-white text-xs sm:text-sm px-4 py-2 rounded shadow w-full sm:w-auto text-center transition">
                                <i class="bi bi-pencil-square mr-1"></i> Edit
                            </a>
                            <a href="{{ route('admin.users.show', $user->id) }}"
                               class="bg-green-700 hover:bg-green-800 text-white text-xs sm:text-sm px-4 py-2 rounded shadow w-full sm:w-auto text-center transition">
                                <i class="bi bi-eye mr-1"></i> Show
                            </a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                  onsubmit="return confirm('Are you sure you want to delete this user?')"
                                  class="w-full sm:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-700 hover:bg-red-800 text-white text-xs sm:text-sm px-4 py-2 rounded shadow w-full sm:w-auto text-center transition">
                                    <i class="bi bi-trash mr-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection
