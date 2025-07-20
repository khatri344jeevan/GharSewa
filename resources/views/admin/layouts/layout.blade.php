<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Active sidebar link styling */
        .sidebar-active {
            background-color: #5e6370 !important;
            /* Tailwind blue-600 */
            color: #fff !important;
        }

        .sidebar-active i {
            color: #fff !important;
        }
    </style>
</head>

<body class="font-[Inter] bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-2xl font-semibold border-b border-slate-700">
                Admin
                <div class="py-2 text-xl font-semibold ">
                    {{ auth()->user()->name }}
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto">
                <ul class="mt-2">
                    <li><a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700"><i
                                class="bi bi-sliders mr-2"></i> Dashboard</a></li>
                    <li>
                        {{-- <a href="{{ route('admin.users.index') }}"
                            class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-people mr-2"></i> Manage Users
                        </a> --}}
                        <a href="#"
                            class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-people mr-2"></i> Manage Users
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-tools mr-2"></i> Services
                        </a>
                    </li>
                    <li>
                        {{-- <a href="{{ route('admin.properties.index') }}" class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-building mr-2"></i> Manage Properties
                        </a> --}}
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-building mr-2"></i> Manage Properties
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-calendar-check mr-2"></i> Service Bookings
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-person-badge mr-2"></i> Service Providers
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700">
                            <i class="bi bi-credit-card mr-2"></i> Subscriptions & Payments
                        </a>
                    </li>

                    <li><a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700"><i
                                class="bi bi-person mr-2"></i> Profile</a></li>

                    {{-- <li><a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700"><i
                                class="bi bi-box-arrow-in-right mr-2"></i> Sign In</a></li>
                    <li> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center px-4 py-2 w-full text-left hover:bg-slate-700">
                                <i class="bi bi-box-arrow-right mr-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>






            </nav>

        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Top navbar -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <div>
                    <button id="toggleSidebar" class="text-gray-600 text-4xl">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="notificationToggle" class="relative text-gray-600">
                        <i class="bi bi-bell text-xl"></i>

                        <span
                            class="absolute top-0 right-0 inline-block w-4 h-4 bg-blue-500 text-xs text-white text-center rounded-full">4</span>
                    </button>
                    <button id="messageToggle" class="text-gray-600">
                        <i class="bi bi-chat-left-dots text-xl"></i>
                    </button>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                {{-- <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link> --}}
                                @if (Auth::user()->role === 'admin')
                                    <x-dropdown-link :href="route('admin.dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @elseif (Auth::user()->role === 'service_provider')
                                    <x-dropdown-link :href="route('service_provider.dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @elseif (Auth::user()->role === 'user')
                                    <x-dropdown-link :href="route('user.dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @endif


                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-6">
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Blank Page</h1>
                <p class="text-lg text-gray-800">Admin Dashboard</p>
            </main>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script>
        // Sidebar toggle
        document.getElementById('toggleSidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('hidden');
        });

        // Notifications click
        document.getElementById('notificationToggle').addEventListener('click', () => {
            alert('You have 4 new notifications.');
        });

        // Messages click
        document.getElementById('messageToggle').addEventListener('click', () => {
            alert('You have 4 new messages.');
        });

        // Highlight active sidebar link
        document.querySelectorAll('#sidebar ul li a').forEach(link => {
            link.addEventListener('click', function(e) {
                // Remove active class from all links
                document.querySelectorAll('#sidebar ul li a').forEach(l => {
                    l.classList.remove('sidebar-active');
                });
                // Add active class to clicked link
                this.classList.add('sidebar-active');
            });
        });

        // Optionally, set the first link as active on page load
        document.addEventListener('DOMContentLoaded', function() {
            const firstSidebarLink = document.querySelector('#sidebar ul li a');
            if (firstSidebarLink) {
                firstSidebarLink.classList.add('sidebar-active');
            }
        });
    </script>
</body>

</html>
