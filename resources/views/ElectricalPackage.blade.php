<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electrical Packages | GharSewa</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <x-navbar />

    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-14">
            <h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-4">Electrical Packages</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Select from monthly, 6-month, or annual plans for safe and expert electrical support.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- 1 Month Plan -->
            <div class="bg-white rounded-3xl border border-gray-200 shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 p-8 flex flex-col">
                <img src="{{ asset('images/electrical1.jpeg') }}" alt="1 Month Plan" class="w-full h-40 object-cover rounded-xl mb-4" loading="lazy">
                <h2 class="text-2xl font-bold text-gray-800 mb-1">1 Month Plan</h2>
                <p class="text-sm text-gray-500 mb-4">Basic home electrical inspection and fixes.</p>

                <p class="text-base mb-2"><strong>Duration:</strong> 1 Month</p>
                <p class="text-3xl text-gray-700 font-extrabold mb-4">Rs. 999</p>

                <ul class="space-y-2 text-sm text-gray-700 mb-6">
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Socket & switch testing</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Mini fuse replacement</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Basic wiring inspection</li>
                </ul>

                <p class="text-xs text-gray-500">SMS alert after inspection</p>
            </div>

            <!-- 6 Month Plan -->
            <div class="bg-white rounded-3xl border-2 border-yellow-400 shadow-xl relative transform hover:-translate-y-1 transition duration-300 p-8 flex flex-col">
                <span class="absolute top-0 right-0 bg-yellow-400 text-white text-xs font-bold px-4 py-1 rounded-bl-2xl rounded-tr-2xl shadow-md">Most Popular</span>
                <img src="{{ asset('images/electrical2.jpeg') }}" alt="6-Month Plan" class="w-full h-40 object-cover rounded-xl mb-4" loading="lazy">
                <h2 class="text-2xl font-bold text-gray-800 mb-1">6 Month Plan</h2>
                <p class="text-sm text-gray-500 mb-4">Routine checkups to prevent faults and improve safety.</p>

                <p class="text-base mb-2"><strong>Duration:</strong> 6 Months</p>
                <p class="text-3xl text-yellow-500 font-extrabold mb-4">Rs. 5499</p>

                <ul class="space-y-2 text-sm text-gray-700 mb-6">
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Includes 1 Month services</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Main panel inspection</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Short-circuit prevention</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Appliance safety testing</li>
                </ul>

                <p class="text-xs text-gray-500">Progress reports with images</p>
            </div>

            <!-- 12 Month Plan -->
            <div class="bg-white rounded-3xl border border-gray-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 p-8 flex flex-col">
                <img src="{{ asset('images/electrical3.jpeg') }}" alt="12 Month Plan" class="w-full h-40 object-cover rounded-xl mb-4" loading="lazy">
                <h2 class="text-2xl font-bold text-gray-800 mb-1">12 Month Plan</h2>
                <p class="text-sm text-gray-500 mb-4">Full-year support for large homes or commercial spaces.</p>

                <p class="text-base mb-2"><strong>Duration:</strong> 12 Months</p>
                <p class="text-3xl text-indigo-600 font-extrabold mb-4">Rs. 11399</p>

                <ul class="space-y-2 text-sm text-gray-700 mb-6">
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Includes 6 Month services</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Wiring load balancing</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Voltage fluctuation protection</li>
                    <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Emergency fault repair</li>
                </ul>

                <p class="text-xs text-gray-500">Technician-certified report with ratings</p>
            </div>
        </div>

        <div class="pt-10 text-center">
            <a href="#">
              <button class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-xl text-lg transition-all duration-300">
                Book Maintenance Package
              </button>
            </a>
        </div>
    </section>

    <x-footer />

</body>
</html>
