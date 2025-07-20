<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Your Property</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <x-navbar />

    <form method="POST" action="/" class="bg-white p-8 rounded shadow-md max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Register Your Property</h2>

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Property Title</label>
            <input type="text" id="title" name="title" placeholder="e.g., 2BHK Flat in Lalitpur"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-700"
                required>
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
            <input type="text" id="address" name="address" placeholder="Full address"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-700"
                required>
        </div>

        <!-- Map Location -->
        <div class="mb-4">
            <label for="map_location" class="block text-gray-700 font-medium mb-2">Map Location (URL or Embed)</label>
            <input type="text" id="map_location" name="map_location" placeholder="Google Maps URL"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-700">
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-gray-700 hover:bg-gray-800 text-white font-semibold py-3 rounded-xl shadow-md text-lg transition-all duration-300">
            Submit Property
        </button>
    </form>


    <x-footer />

</body>

</html>
