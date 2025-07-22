{{-- resources/views/service_provider/layouts/sidenav.blade.php --}}

@include('user.layout.head')

<body class="bg-gray-50 flex font-sans">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white text-gray-800 h-screen fixed top-0 left-0 flex flex-col shadow-lg z-30">
        {{-- Logo --}}
        <a href="/">
            <div class="py-4 px-4 flex items-center text-2xl font-extrabold">
                <img src="{{ asset('images/transparentlogo.png') }}" alt="GharSewa Logo" class="w-10 h-10 mr-3">
                GharSewa
            </div>
        </a>

        {{-- Navigation Links --}}
        <nav class="flex-1 mt-4">
            <ul class="space-y-2 px-4">
                {{-- Dashboard Link with Active State --}}
                <li>
                    <a href="{{ route('service_provider.dashboard') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg font-semibold transition
                              {{ request()->is('service-provider/dashboard') ? 'bg-blue-500 text-white shadow' : 'hover:bg-gray-100' }}">
                        <i class="bi bi-speedometer2 text-lg"></i>
                        Dashboard
                    </a>
                </li>

                {{-- Profile Link --}}
                <li>
                    <a href="#" {{-- Replace with your profile route later --}}
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg font-semibold transition hover:bg-gray-100">
                        <i class="bi bi-person-circle text-lg"></i>
                        Profile
                    </a>
                </li>

                {{-- My Tasks Link --}}
                <li>
                    <a href="#" {{-- Replace with your tasks route later --}}
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg font-semibold transition hover:bg-gray-100">
                        <i class="bi bi-calendar-check text-lg"></i>
                        My Tasks
                    </a>
                </li>

                {{-- Logout Button --}}
                <li class="pt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg font-semibold text-red-600 transition hover:bg-red-50 hover:text-red-700">
                            <i class="bi bi-box-arrow-right text-lg"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- This part remains the same --}}
    <main class="flex-1 ml-64 p-8">
        @yield('content')
    </main>

</body>