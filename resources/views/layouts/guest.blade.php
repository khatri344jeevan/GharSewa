<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GharSewa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fallback styles for browser compatibility -->
        <style>
            /* Ensure basic styling works even if Tailwind fails to load */
            .browser-fallback {
                font-family: 'Figtree', sans-serif;
                background-color: #f9fafb;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .auth-container {
                background: white;
                padding: 2.5rem;
                border-radius: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 28rem;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50 min-h-screen">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-6">
            <div class="mb-8">
                <a href="/" class="flex items-center space-x-3">
                    <x-application-logo class="w-10 h-10 fill-current" style="color: #1F284F;" />
                    {{-- <h1 class="text-xl font-semibold text-gray-900">GharSewa</h1> --}}
                </a>
            </div>

            <div class="w-full sm:max-w-md bg-white shadow-lg border border-gray-100 overflow-hidden sm:rounded-2xl">
                <div class="px-8 py-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
