
@extends('user.layout.master')

@section('title', 'Edit Property')

@section('content')

    <body class="bg-gray-50">

        <div class="container mx-auto m-10">
            <div class="flex-1 max-w-6xl mx-auto shadow-lg rounded-lg bg-white p-10 ">
                <h2 class="font-bold text-4xl mb-8 text-gray-800 text-center">Edit Property</h2>

                <form action="{{ route('user.Properties.update', $property->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class= " grid grid-cols-1 mb-6 gap-6 md:grid-cols-2">
                        <div>
                            <label for="title" class="block text-gray-700 font-medium mb-1">Property Title</label>
                            <input type="text" id="title" name="title" required value="{{ $property->title }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 font-medium mb-1">Address</label>
                            <input type="text" id="address" name="address" required value="{{ $property->address }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 mb-6 gap-6">

                        <div>
                            <label for="type" class="block text-gray-700 font-medium mb-1">Property Type</label>
                            <select id="type" name="type" required
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Select Type --</option>
                                <option value="Residential" {{ $property->type == 'Residential' ? 'selected' : '' }}>
                                    Residential
                                </option>
                                <option value="Commercial" {{ $property->type == 'Commercial' ? 'selected' : '' }}>
                                    Commercial
                                </option>
                            </select>

                            @error('type')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="maplocation" class="block text-gray-700 font-medium mb-1">Map Location (Link or
                                coordinates)</label>
                            <input type="text" id="maplocation" name="maplocation" value="{{ $property->maplocation }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            @error('maplocation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 mb-6 gap-6">
                        <div>
                            @if ($property->image)
                                <div class="mb-4">
                                    <p class="text-gray-700 font-medium mb-1">Current Image:</p>
                                    <img src="{{ asset('uploads/properties/' . $property->image) }}" alt="Property Image"
                                        class="w-48 h-32 object-cover rounded">
                                </div>
                            @endif
                        </div>
                        <div>
                            <label for="image" class="block text-gray-700 font-medium mb-1">Image of the Property</label>
                            <input type="file" id="image" name="image" value="{{ $property->image }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flwx-wrap gap-4 justify-center">
                        <button type="submit"
                            class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-8 py-3 rounded transition">
                            Confirm
                        </button>
                        <a href="{{ route('user.Properties.p_index') }}"
                            class="border bg-red-700 hover:bg-red-800 text-white font-semibold px-8 py-3 rounded transition">Cancel</a>
                    </div>
                </form>
            </div>

        </div>



        </div>
    @endsection
