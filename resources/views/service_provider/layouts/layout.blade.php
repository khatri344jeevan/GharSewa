<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'GharSewa Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 flex font-sans">
    <!-- Sidebar -->
    <aside class="w-64 bg-white text-gray-800 h-screen fixed top-0 left-0 flex flex-col shadow-lg z-30">
        <!-- Logo Section -->
        <div class="py-4 px-5 flex items-center text-2xl font-extrabold text-gray-900 border-b border-gray-200">
            <img src="{{ asset('images/transparentlogo.png') }}" alt="Logo" class="w-10 h-10 mr-3">
            GharSewa
        </div>
        <!-- Navigation Links -->
        <nav class="flex-grow pt-4">
            <ul class="flex flex-col space-y-2 px-4">
                <li>
                    <a href="{{ route('service-provider.dashboard') }}"
                       class="flex items-center py-2.5 px-4 rounded-lg text-base font-semibold transition-colors hover:bg-indigo-100 hover:text-indigo-600 
                              {{ request()->routeIs('service-provider.dashboard') ? 'bg-indigo-500 text-white' : 'text-gray-600' }}">
                        <i class="bi bi-grid-1x2-fill w-6"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('service-provider.profile.show') }}"
                       class="flex items-center py-2.5 px-4 rounded-lg text-base font-semibold transition-colors hover:bg-indigo-100 hover:text-indigo-600
                              {{ request()->routeIs('service-provider.profile.*') ? 'bg-indigo-500 text-white' : 'text-gray-600' }}">
                        <i class="bi bi-person-circle w-6"></i>
                        <span class="ml-3">Profile</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Logout Button -->
        <div class="p-4 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center py-2.5 px-4 rounded-lg text-base font-semibold text-gray-600 hover:bg-red-100 hover:text-red-600">
                    <i class="bi bi-box-arrow-left w-6"></i><span class="ml-3">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col bg-gray-50">
        <!-- Top bar -->
        <header class="bg-white shadow-sm py-4 px-8 flex justify-end items-center border-b border-gray-200 z-10">
            <div class="text-gray-700 text-base font-semibold ">
                Welcome, <span class="text-indigo-600">{{ Auth::user()->name }}</span>
            </div>
        </header>
        <!-- Page Content Slot -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>