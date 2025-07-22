{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Your Property</title>
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>
    <div class="flex justify content-center bg-gray-50 m-20">
        <div class="w-10 h-20">
            <a href="/">
                <img src="{{ asset('images/transparentlogo.png') }}" alt="" class="w-50 h-50  ml-auto mr-auto">
        </div>

        <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Register New Property</h2>

            <form action="{{ route('user.Properties.p_store') }}" method="POST">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium mb-1">Property Title</label>
                    <input type="text" id="title" name="title" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-1">Address</label>
                    <input type="text" id="address" name="address" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 font-medium mb-1">Property Type</label>
                    <select id="type" name="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Select Type --</option>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Land">Land</option>
                    </select>
                </div>

                <!-- Map Location -->
                <div class="mb-4">
                    <label for="maplocation" class="block text-gray-700 font-medium mb-1">Map Location (Link or
                        coordinates)</label>
                    <input type="text" id="maplocation" name="maplocation"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-gray-600 hover:bg-red-100 text-white font-semibold px-6 py-2 rounded transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>


</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register Your Property</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <div class="max-w-7xl mx-auto mt-20 p-8 bg-white rounded-lg shadow-2xl flex items-center gap-12 pt-16">

        <!-- Left side: Big logo image -->
        <div class="flex-shrink-0 w-96 h-96 mb-14">
            <a href="/">
                <img src="{{ asset('images/Gharsewaicon.jpg') }}" alt="Logo" class="w-full h-full object-contain" />
            </a>
        </div>

        <!-- Right side: Form -->
        <div class="flex-1 max-w-xl">
            <h2 class="font-bold text-4xl mb-8 text-gray-800 text-center">Register New Property</h2>

            <form action="{{ route('user.Properties.p_store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-gray-700 font-medium mb-1">Property Title</label>
                    <input type="text" id="title" name="title" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-gray-700 font-medium mb-1">Address</label>
                    <input type="text" id="address" name="address" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Type -->
                <div>
                    <label for="type" class="block text-gray-700 font-medium mb-1">Property Type</label>
                    <select id="type" name="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Select Type --</option>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                    @error('type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Map Location -->
                <div>
                    <label for="maplocation" class="block text-gray-700 font-medium mb-1">Map Location (Link or
                        coordinates)</label>
                    <input type="text" id="maplocation" name="maplocation"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('maplocation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex gap-4 items-center">
                    <button type="submit"
                        class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-8 py-3 rounded transition">
                        Submit
                    </button>
                    <a href="{{ route('user.dashboard') }}"
                        class="border bg-red-700 hover:bg-red-800 text-white font-semibold px-8 py-3 rounded transition">Cancel</a>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
