<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Cleaning Packages | GharSewa</title>
  <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#f8fafc] text-gray-800 font-sans">

  <x-navbar />

  <section class="max-w-7xl mx-auto px-6 py-16">
    <div class="text-center mb-14">
      <h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-4">Choose Your Cleaning Plan</h1>
      <p class="text-lg text-gray-600 max-w-xl mx-auto">
        Select from monthly, 6-month, or yearly plans designed to keep your space clean and comfortable.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

      {{-- 1 Month Package --}}
      <div class="bg-white rounded-3xl border border-gray-200 shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 p-8 flex flex-col">
        <img src="{{ asset('images/cleaning1.jpg') }}" alt="1 Month Cleaning" class="w-full h-40 object-cover rounded-xl mb-4" loading="lazy">
        <h2 class="text-2xl font-bold text-gray-800 mb-1">1 Month Plan</h2>
        <p class="text-sm text-gray-500 mb-4">Home cleaning service valid for 1 month.</p>

        <p class="text-base mb-2"><strong>Duration:</strong> 1 Month</p>
        <p class="text-3xl text-gray-700 font-extrabold mb-4">Rs. 999</p>

        <ul class="space-y-2 text-sm text-gray-700 mb-6">
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Floor & surface cleaning</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Dusting & trash removal</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Wiping switches & handles</li>
        </ul>

         <p class="text-xs text-gray-500">Task uploaded to your dashboard</p>
      </div>

      {{-- 6 Month Package --}}
      <div class="bg-white rounded-3xl border-2 border-yellow-400 shadow-xl relative p-8 transform hover:-translate-y-1 transition duration-300 flex flex-col">
        <span class="absolute top-0 right-0 bg-yellow-400 text-white text-xs font-bold px-4 py-1 rounded-bl-2xl rounded-tr-2xl shadow-md">Most Popular</span>
        <img src="{{ asset('images/cleaning2.jpg') }}" alt="6 Month Cleaning" class="w-full h-40 object-cover rounded-xl mb-4" loading="lazy">
        <h2 class="text-2xl font-bold text-gray-800 mb-1">6 Month Plan</h2>
        <p class="text-sm text-gray-500 mb-4">Extended cleaning service for 6 months.</p>

        <p class="text-base mb-2"><strong>Duration:</strong> 6 Months</p>
        <p class="text-3xl text-yellow-500 font-extrabold mb-4">Rs. 5499</p>

        <ul class="space-y-2 text-sm text-gray-700 mb-6">
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Includes 1 Month services</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Deep kitchen & bathroom cleaning</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Glass polishing</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Monthly photo reports</li>
        </ul>

        <p class="text-xs text-gray-500">Task uploaded to your dashboard</p>
      </div>

      {{-- 12 Month Package --}}
      <div class="bg-white rounded-3xl border border-gray-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 p-8 flex flex-col">
        <img src="{{ asset('images/cleaning3.jpg') }}" alt="12 Month Cleaning" class="w-full h-40 object-cover rounded-xl mb-4" loading="lazy">
        <h2 class="text-2xl font-bold text-gray-800 mb-1">12 Month Plan</h2>
        <p class="text-sm text-gray-500 mb-4">Annual full-service cleaning coverage.</p>

        <p class="text-base mb-2"><strong>Duration:</strong> 12 Months</p>
        <p class="text-3xl text-indigo-600 font-extrabold mb-4">Rs. 11399</p>

        <ul class="space-y-2 text-sm text-gray-700 mb-6">
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Includes 6 Month services</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Terrace & balcony sweeping</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Monthly sanitization</li>
          <li><i class="bi bi-check-circle-fill text-green-600 mr-2"></i>Mold prevention & priority scheduling</li>
        </ul>

         <p class="text-xs text-gray-500">Task uploaded to your dashboard</p>
      </div>
    </div>

    <div class="pt-10 text-center">
      <a href="{{route('user.Bookings.b_create')}}">
        <button class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-xl text-lg transition-all duration-300">
          Book Maintenance Package
        </button>
      </a>
    </div>
  </section>

  <x-footer />

</body>
</html>
