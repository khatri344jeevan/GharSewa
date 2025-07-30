<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>GharSewa</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />




    <style>

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

@if (session('success'))
    <div id="success-toast"
        class="fixed top-6 right-6 z-50 bg-green-600 text-white px-4 py-2 rounded shadow-md animate-fade-in">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            let toast = document.getElementById('success-toast');
            if (toast) toast.remove();
        }, 5000);
    </script>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.4s ease-out;
        }
    </style>
@endif

<body class="font-sans text-gray-900 antialiased bg-gray-50 min-h-screen">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-6">
        <div class="mb-8">
            <a href="/" class="flex items-center space-x-3">
                <x-application-logo class="w-10 h-10 fill-current" style="color: #1F284F;" />
                
                <img src="{{ asset('images/Gharsewaicon.jpg') }}" alt="image of gharsewa" class="w-28 mb-2 mt-10 ">
            </a>
        </div>

        <div class="w-full sm:max-w-md bg-white shadow-lg border border-gray-100 mb-20 sm:rounded-2xl">
            <div class="px-8 py-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
