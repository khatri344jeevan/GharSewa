{{-- @include('user.layout.head');

<body class="bg-gray-100 flex font-sans"> --}}
<!-- Sidebar -->
<aside class="w-64 bg-gray-300 text-gray-700 h-screen fixed top-0 left-0 flex flex-col shadow-lg z-30">
    <a href="/">
        <div class="py-3 px-4 flex items-center text-2xl font-extrabold text-gray-800">
            <img src="{{ asset('images/transparentlogo.png') }}" alt="" class="w-12 h-12 mr-2">
            GharSewa
        </div>
    </a>


    <nav class="flex-1 overflow-y-auto mt-6">
        <ul class="space-y-3 px-6">
            <li>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                    <i class="bi bi-speedometer2 text-lg"></i>
                    Dashboard
                </a>
            </li>
            <li>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                     <i class="bi bi-people mr-2"></i> Manage Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.packages.index') }}"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                   <i class="bi bi-tools mr-2"></i> Maintenance Package
                </a>
            </li>
             <li>
                <a href="{{ route('admin.properties.index') }}"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                   <i class="bi bi-building mr-2"></i> Manage Properties
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bookings.index') }}"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                     <i class="bi bi-calendar-check mr-2"></i> Manage Bookings
                </a>
            </li>
            <li>
                <a href="{{ route('admin.service_providers.index') }}"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                            <i class="bi bi-person-badge mr-2"></i> Manage Service Providers

                </a>
            </li>
             <li>
                <a href="/payments"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                           <i class="bi bi-credit-card mr-2"></i>Payments

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
                <a href="{{ route('admin.profile.edit') }}"
                    class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                    <i class="bi bi-person-circle text-lg"></i>
                    Profile
                </a>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-4 px-5 py-3 rounded text-red-600 hover:bg-red-400 hover:text-white transition font-semibold">
                        <i class="bi bi-box-arrow-right text-lg"></i>
                        Logout
                    </button>
                </form>
            </li>

        </ul>
    </nav>
</aside>


<!-- Main Content -->
{{-- <div class="flex-1 ml-64 min-h-screen flex flex-col bg-gray-70 mt-10 ">
        @include('user.layout.header') --}}


<!-- Page Content -->
{{-- <main class="flex-1 p-2">
            @yield('content')
        </main>
    </div>
</body>

</html> --}}
