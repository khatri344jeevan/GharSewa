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
    <aside class="w-64 bg-gray-300 text-gray-700 h-screen fixed top-0 left-0 flex flex-col shadow-lg z-30">
        <div class="py-3 px-4 flex items-center text-2xl font-extrabold text-gray-800">
            <img src="{{ asset('images/transparentlogo.png') }}" alt="" class="w-12 h-12 mr-2">
            GharSewa
        </div>


        <nav class="flex-1 overflow-y-auto mt-6">
            <ul class="space-y-3 px-6">
                <li>
                    <a href="/dashboard"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-speedometer2 text-lg"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/properties"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-building text-lg"></i>
                        My Properties
                    </a>
                </li>
                <li>
                    <a href="/bookings"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-calendar-check text-lg"></i>
                        My Bookings
                    </a>
                </li>
                <li>
                    <a href="/payments"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-credit-card text-lg"></i>
                        My Payments
                    </a>
                </li>
                {{-- <li>
                    <a href="/packages"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-box-seam text-lg"></i>
                        My Packages
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="/tasks"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-list-task text-lg"></i>
                        Tasks
                    </a>
                </li> --}}
                <li>
                    <a href="/profile"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-person-circle text-lg"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="/support"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-life-preserver text-lg"></i>
                        Support
                    </a>
                </li>
                <li>
                    {{-- <a href="/logout"
                        class="flex items-center gap-4 px-5 py-3 rounded text-red-600 hover:bg-red-400 hover:text-white transition font-semibold">
                        <i class="bi bi-box-arrow-right text-lg"></i>
                        Logout
                    </a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-4 px-5 py-3 rounded text-red-600 hover:bg-red-400 hover:text-white transition font-semibold">
                            <i class="bi bi-box-arrow-right text-lg"></i>
                            Logout
                        </button>
                    </form>

                </li>
            </ul>
        </nav>
    </aside>


    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col bg-gray-70 mt-10 ">
        <!-- Top bar -->
        <header
            class="fixed top-0 left-0 right-0 bg-gray-300 shadow-md py-6 px-4 pl-64 flex justify-between items-center border-b border-gray-400 z-20">
            {{-- <h1 class="text-2xl font-extrabold text-gray-800">Dashboard</h1> --}}
            <div class="ml-5 text-gray-700 text-base font-semibold ">
                Welcome,
                <span class="text-gray-900">{{ Auth::user()->name }}</span>
            </div>
        </header>


        <!-- Page Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
