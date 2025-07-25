@extends('admin.layout.master')
@section('title', 'Edit Property')

@section('content')
<div class="container py-10 max-w-2xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <h4 class="text-gray-800 font-bold text-3xl">Edit Property</h4>
        <a href="{{ route('admin.properties.index') }}" class="bg-gray-700 hover:bg-gray-800 text-white text-sm font-medium flex items-center px-2 py-2 rounded-lg transition">
            <i class="bi bi-arrow-left px-3"></i>
            Back to Properties
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $property->title) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 text-gray-700" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Owner</label>
            <select name="user_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 text-gray-700" required>
                <option value="">Select Owner</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $property->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Address</label>
            <input type="text" name="address" value="{{ old('address', $property->address) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 text-gray-700" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Type</label>
            <select name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 text-gray-700" required>
                <option value="Residential" {{ old('type', $property->type) == 'Residential' ? 'selected' : '' }}>Residential</option>
                <option value="Commercial" {{ old('type', $property->type) == 'Commercial' ? 'selected' : '' }}>Commercial</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Image</label>
            @if ($property->image)
                <div class="mb-2">
                    <img src="{{ asset('uploads/properties/' . $property->image) }}" alt="Property Image" class="w-28 h-28 object-cover rounded-lg border border-gray-200 shadow-sm">
                </div>
            @endif
            <input type="file" name="image" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 text-gray-700">
            <small class="text-gray-500">Leave blank to keep existing image.</small>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-8 py-2 rounded-lg shadow transition">
                <i class="bi bi-save"></i> Update Property
            </button>
        </div>
    </form>
</div>
@endsection
