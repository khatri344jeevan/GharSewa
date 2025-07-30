<nav x-data="{ open: false }" class="bg-white shadow-md px-6 py-3 sticky top-0 z-50">
    <div class="flex justify-between items-center">
        <a href="/" class="flex items-center">
            <img src="{{ asset('images/Gharsewaicon.jpg') }}" alt="GharSewa Logo" class="w-24 h-20 rounded-full" />
            <span class="text-2xl md:text-3xl font-extrabold text-gray-700 ml-2">GharSewa</span>
        </a>

         {{-- Hamburger Icon  --}}
        <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round"


                stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>


        <div class="hidden md:flex space-x-10 text-lg font-medium text-gray-700">
            <a href="/" class="hover:text-gray-500 transition-colors duration-300">Home</a>
            <a href="/Aboutus" class="hover:text-gray-500 transition-colors duration-300">About Us</a>
            <a href="/Service" class="hover:text-gray-500 transition-colors duration-300">Services</a>
            <a href="/Contactus" class="hover:text-gray-500 transition-colors duration-300">Contact Us</a>
        </div>


        <div class="hidden md:flex space-x-4 items-center">
            @if (Route::has('login'))
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                            @if (Auth::user()->role === 'admin')
                                <x-dropdown-link :href="route('admin.dashboard')">Dashboard</x-dropdown-link>
                            @elseif (Auth::user()->role === 'service_provider')
                                <x-dropdown-link :href="route('service_provider.dashboard')">Dashboard</x-dropdown-link>
                            @elseif (Auth::user()->role === 'user')
                                <x-dropdown-link :href="route('user.dashboard')">Dashboard</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                        class="border border-gray-700 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    
    <div x-show="open" class="md:hidden mt-3 space-y-2">
        <a href="/" class="block text-gray-700 hover:text-gray-500">Home</a>
        <a href="/Aboutus" class="block text-gray-700 hover:text-gray-500">About Us</a>
        <a href="/Service" class="block text-gray-700 hover:text-gray-500">Services</a>
        <a href="/Contactus" class="block text-gray-700 hover:text-gray-500">Contact Us</a>

        @if (Route::has('login'))
            @auth
                <a href="{{ route('profile.edit') }}" class="block text-gray-700 hover:text-gray-500">Profile</a>
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-gray-500">Dashboard</a>
                @elseif (Auth::user()->role === 'service_provider')
                    <a href="{{ route('service_provider.dashboard') }}" class="block text-gray-700 hover:text-gray-500">Dashboard</a>
                @elseif (Auth::user()->role === 'user')
                    <a href="{{ route('user.dashboard') }}" class="block text-gray-700 hover:text-gray-500">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left text-gray-700 hover:text-gray-500">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block text-gray-700 hover:text-gray-500">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="block text-gray-700 hover:text-gray-500">Register</a>
                @endif
            @endauth
        @endif
    </div>
</nav>
