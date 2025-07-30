<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <title>Gharsewa - Care for Your Property</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        @keyframes fade {

            0%,
            16.66% {
                opacity: 1;
            }

            33.33%,
            100% {
                opacity: 0;
            }
        }

        .animate-fade {
            animation: fade 30s infinite;
        }

        .animate-fade.delay-5s {
            animation-delay: 5s;
        }

        .animate-fade.delay-10s {
            animation-delay: 10s;
        }

        .animate-fade.delay-15s {
            animation-delay: 15s;
        }

        .animate-fade.delay-20s {
            animation-delay: 20s;
        }

        .animate-fade.delay-25s {
            animation-delay: 25s;
        }
    </style>

</head>

<body class="bg-gray-50 font-sans text-gray-700">

    <x-navbar />



    <div class="relative w-full min-h-[88vh] overflow-hidden">
        <img src="{{ asset('images/1.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-100 animate-fade" />
        <img src="{{ asset('images/2.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-0 animate-fade delay-5s" />
        <img src="{{ asset('images/3.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-0 animate-fade delay-10s" />
        <img src="{{ asset('images/4.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-0 animate-fade delay-15s" />
        <img src="{{ asset('images/5.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-0 animate-fade delay-20s" />
        <img src="{{ asset('images/6.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-0 animate-fade delay-25s" />

        <div class="absolute left-10 top-1/2 -translate-y-1/2 z-10 text-white max-w-md">
            <h1 class="text-5xl font-extrabold mb-4 drop-shadow-md">GharSewa </h1>
            <p class="text-2xl mb-6 font-light drop-shadow-sm">A Care for your Property</p>
            <a href="/RegisterProperty"
                class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-6 py-6 rounded shadow-lg transition duration-300 text-2xl">
                Register Your Property
            </a>
        </div>
    </div>







    <x-aboutus />

    <x-service />

    <x-contactus />

    <x-footer />

</body>

</html>
