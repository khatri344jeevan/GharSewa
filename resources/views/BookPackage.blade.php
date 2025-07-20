<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Maintenance Package</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <x-navbar />

    <form method="POST" action="/maintenance/book" class="bg-white p-8 rounded shadow-md max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Book Maintenance Package</h2>

        <div class="mb-4">
            <label for="property_id" class="block text-gray-700 font-medium mb-2">Select Property</label>
            <select id="property_id" name="property_id"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-700"
                required>
                <option value="">Select Property</option>
                <option value="1">Flat in Kathmandu</option>
                <option value="2">House in Bhaktapur</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="package_id" class="block text-gray-700 font-medium mb-2">Select Package</label>
            <select id="package_id" name="package_id"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-700"
                required>
                <option value="">Choose Package</option>
                <option value="1">Monthly - Rs. 999</option>
                <option value="2">6 Months - Rs. 4999</option>
                <option value="3">Annual - Rs. 8999</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="booking_date" class="block text-gray-700 font-medium mb-2">Preferred Booking Date</label>
            <input type="date" id="booking_date" name="booking_date"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-700"
                required>
        </div>

        <button type="submit"
            class="w-full bg-gray-700 hover:bg-gray-800 text-white font-semibold py-3 rounded-xl shadow-md text-lg transition-all duration-300">
            Book Package
        </button>
    </form>

    <x-footer />

</body>

</html>
