<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Gharsewa - Care for Your Property</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="text-gray-800 bg-gray-100">

<x-navbar />

<div x-data="{ openIndex: null }" class="max-w-2xl mx-auto mb-20 mt-10 bg-white shadow-md rounded-2xl p-8 ">
  <h2 class="text-2xl font-bold mb-6">Frequently Asked Questions</h2>

  {{-- Q1  --}}
  <div class="border-b py-4">
    <button @click="openIndex === 1 ? openIndex = null : openIndex = 1" class="w-full text-left font-medium text-lg">
      What is GharSewa?
    </button>
    <div x-show="openIndex === 1" x-collapse class="mt-2 text-gray-700">
      GharSewa is a digital property management platform that helps property owners, especially those living abroad, manage and maintain their buildings, apartments, or homes in Nepal.
    </div>
  </div>

  {{-- Q2  --}}
  <div class="border-b py-4">
    <button @click="openIndex === 2 ? openIndex = null : openIndex = 2" class="w-full text-left font-medium text-lg">
      How can I book a service?
    </button>
    <div x-show="openIndex === 2" x-collapse class="mt-2 text-gray-700">
      Log in to the GharSewa website, choose your property, select the service you need, and schedule a time that works best for you.
    </div>
  </div>

  {{-- Q3 --}}
  <div class="border-b py-4">
    <button @click="openIndex === 3 ? openIndex = null : openIndex = 3" class="w-full text-left font-medium text-lg">
      What types of services are available?
    </button>
    <div x-show="openIndex === 3" x-collapse class="mt-2 text-gray-700">
      We provide Plumbing, Electrical Repairs, Cleaning, Device &amp; Appliance Support.
    </div>
  </div>

  {{-- Q4 --}}
  <div class="border-b py-4">
    <button @click="openIndex === 4 ? openIndex = null : openIndex = 4" class="w-full text-left font-medium text-lg">
      How are the service providers selected?
    </button>
    <div x-show="openIndex === 4" x-collapse class="mt-2 text-gray-700">
      All service providers go through a strict verification process, background checks, and are trained to meet GharSewa’s quality standards.
    </div>
  </div>

  {{-- Q5 --}}
  <div class="border-b py-4">
    <button @click="openIndex === 5 ? openIndex = null : openIndex = 5" class="w-full text-left font-medium text-lg">
      What locations does GharSewa provide its services?
    </button>
    <div x-show="openIndex === 5" x-collapse class="mt-2 text-gray-700">
      GharSewa currently offers services in the Kathmandu Valley, including Kathmandu, Lalitpur, and Bhaktapur. Expansion to other cities is planned.
    </div>
  </div>

  {{-- Q6 --}}
  <div class="border-b py-4">
    <button @click="openIndex === 6 ? openIndex = null : openIndex = 6" class="w-full text-left font-medium text-lg">
      What are the costs associated with the services?
    </button>
    <div x-show="openIndex === 6" x-collapse class="mt-2 text-gray-700">
      Prices vary depending on the type and frequency of services. All costs are displayed upfront before booking confirmation.
    </div>
  </div>

  {{-- Q7 --}}
  <div class="border-b py-4">
    <button @click="openIndex === 7 ? openIndex = null : openIndex = 7" class="w-full text-left font-medium text-lg">
      Can I get an annual maintenance contract (AMC)?
    </button>
    <div x-show="openIndex === 7" x-collapse class="mt-2 text-gray-700">
      Yes, GharSewa offers Annual Maintenance Contracts (AMCs) for individuals and institutions who want regular, hassle-free upkeep of their properties.
    </div>
  </div>

  {{-- Q8 --}}
  <div class="border-b py-4">
    <button @click="openIndex === 8 ? openIndex = null : openIndex = 8" class="w-full text-left font-medium text-lg">
      How do I contact GharSewa?
    </button>
    <div x-show="openIndex === 8" x-collapse class="mt-2 text-gray-700">
      You can reach out via our contact form on the website, call our support number, or email us at support@gharsewa.com.
    </div>
  </div>
</div>

<x-footer />

</body>
</html>
