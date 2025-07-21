<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GharSewa Provider - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-100 flex font-sans">
    <aside class="w-64 bg-white text-gray-800 h-screen fixed top-0 left-0 flex flex-col shadow-lg z-30">
        <a href="/">
            <div class="py-3 px-4 flex items-center text-2xl font-extrabold text-gray-800 border-b">
                <img src="{{ asset('images/transparentlogo.png') }}" alt="GharSewa" class="w-12 h-12 mr-2">
                GharSewa
            </div>
        </a>
        <nav class="flex-1 overflow-y-auto mt-6">
            <ul class="space-y-3 px-6">
                <li>
                    <a href="{{ route('service-provider.dashboard') }}" class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-200 transition font-semibold {{ request()->routeIs('service-provider.dashboard') ? 'bg-blue-500 text-white' : '' }}">
                        <i class="bi bi-speedometer2 text-lg"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('service-provider.profile.show') }}" class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-200 transition font-semibold {{ request()->routeIs('service-provider.profile.*') ? 'bg-blue-500 text-white' : '' }}">
                        <i class="bi bi-person-circle text-lg"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('service-provider.tasks.index') }}" class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-200 transition font-semibold {{ request()->routeIs('service-provider.tasks.index') ? 'bg-blue-500 text-white' : '' }}">
                        <i class="bi bi-list-task text-lg"></i>
                        My Tasks
                    </a>
                </li>
                <li class="pt-4 border-t mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-4 px-5 py-3 rounded text-left text-red-600 hover:bg-red-100 transition font-semibold">
                            <i class="bi bi-box-arrow-right text-lg"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>
    <main class="flex-1 ml-64 p-8">
        @yield('content')
    </main>
</body>
</html>