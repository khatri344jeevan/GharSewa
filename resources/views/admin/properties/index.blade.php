@extends('admin.layout.master')
@section('title', 'Admin Properties Management')

@section('content')
    <div class="container py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h4 class="text-gray-900 font-extrabold text-3xl mb-4 md:mb-0">Properties List</h4>
            {{-- <a href="{{ route('admin.properties.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                <i class="bi bi-plus-circle mr-2"></i> Add Property
            </a> --}}
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-900">
                    <tr>
                        <th class="text-center px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">SN</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Title</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Owner</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Address</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Type</th>
                        <th class="text-center px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Image</th>
                        <th class="text-center px-4 py-3 text-xs font-semibold text-gray-200 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($properties as $property)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="text-center font-bold px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                <span class="font-medium text-gray-800">{{ $property->title }}</span>
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $property->user->name ?? 'N/A' }}
                                <br>
                                <small class="text-gray-500">{{ $property->user->email ?? '' }}</small>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ Str::limit($property->address, 50) }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $property->type === 'Residential' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $property->type }}
                                </span>
                            </td>
                            <td class="text-center px-4 py-3">
                                @if ($property->image)
                                    <img src="{{ asset('uploads/properties/' . $property->image) }}"
                                         alt="Property Image" class="w-16 h-16 object-cover rounded mx-auto">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="text-center px-4 py-3">
                                <div class="flex justify-center space-x-2">
                                    {{-- <a href="{{ route('admin.properties.show', $property->id) }}"
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded shadow">
                                        <i class="bi bi-eye"></i> View
                                    </a> --}}
                                    <a href="{{ route('admin.properties.edit', $property->id) }}"
                                        class="bg-yellow-600 hover:bg-yellow-700 text-white text-xs px-3 py-1 rounded shadow">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.properties.destroy', $property->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this property?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded shadow">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-gray-500">No properties found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
