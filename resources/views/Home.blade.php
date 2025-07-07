<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800">
  <x-navbar />

  <main class="px-4 max-w-5xl mx-auto py-6">
    <section class="mb-8">
      <h2 class="text-3xl font-bold mb-2">Welcome to GharSewa</h2>
      <p class="text-lg">Your trusted partner for reliable, transparent, and stress-free property maintenance in Nepal.</p>
    </section>

    <section class="mb-8 bg-white p-5 rounded-lg shadow">
      <h2 class="text-2xl font-semibold mb-3">What is GharSewa?</h2>
      <p class="text-base leading-relaxed">
        GharSewa is a centralized digital platform that connects property owners with verified service providers for all
        kinds of home and commercial property maintenance. Whether you're living abroad or simply too busy to manage
        your property, GharSewa offers a reliable solution to keep your assets safe, clean, and functional — all from one
        dashboard.
      </p>
    </section>

    <section class="mb-8 bg-white p-5 rounded-lg shadow ">
      <h2 class="text-2xl font-semibold mb-3">Our Services</h2>
      <p class="mb-4">Manage all your property needs with just a few clicks:</p>
      <ul class="space-y-3">
        <li class="flex items-center gap-3">
          <ion-icon name="construct-outline" class="text-blue-600 text-2xl"></ion-icon>
          <span class="font-medium">Plumbing and Pipe Repairs</span>
        </li>
        <li class="flex items-center gap-3">
          <ion-icon name="bulb-outline" class="text-yellow-500 text-2xl"></ion-icon>
          <span class="font-medium">Electrical Maintenance</span>
        </li>
        <li class="flex items-center gap-3">
          <ion-icon name="sparkles-outline" class="text-green-600 text-2xl"></ion-icon>
          <span class="font-medium">Cleaning Services</span>
        </li>
        <li class="flex items-center gap-3">
          <ion-icon name="hardware-chip-outline" class="text-purple-600 text-2xl"></ion-icon>
          <span class="font-medium">Device & Appliance Support</span>
        </li>
      </ul>
      <p class="mt-4 text-base">Choose one-time services or subscribe to recurring maintenance packages.</p>
    </section>

    <section class="mb-8 bg-white p-5 rounded-lg shadow">
      <h2 class="text-2xl font-semibold mb-3">Who is GharSewa for?</h2>
      <ul class="list-disc list-inside space-y-2 text-base">
        <li>Nepalese living abroad</li>
        <li>Busy professionals with no time for property upkeep</li>
        <li>Landlords and real estate investors</li>
        <li>Organizations managing multiple properties</li>
      </ul>
    </section>

    <section class="mb-8 bg-white p-5 rounded-lg shadow">
      <h2 class="text-2xl font-semibold mb-4">How It Works</h2>
      <ul class="list-decimal list-inside space-y-4 text-base">
        <li>
          <strong>Register Your Property</strong>
          <p class="text-gray-600">Add basic property info like location, type, and size.</p>
        </li>
        <li>
          <strong>Select Services</strong>
          <p class="text-gray-600">Choose from our verified maintenance categories.</p>
        </li>
        <li>
          <strong>Book & Pay</strong>
          <p class="text-gray-600">Schedule services and pay securely online or after service.</p>
        </li>
        <li>
          <strong>Track & Review</strong>
          <p class="text-gray-600">Monitor service updates, get reports, and leave reviews.</p>
        </li>
      </ul>
    </section>

    <section class="bg-white p-5 rounded-lg shadow">
      <h2 class="text-2xl font-semibold mb-2">Need Help?</h2>
      <p class="text-base text-gray-700">If you need any help, feel free to contact us through the number or email provided below.</p>
    </section>
  </main>

  <x-footer />
</body>

</html>
