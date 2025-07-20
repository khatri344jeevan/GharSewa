{{-- <nav class="flex bg-white shadow-md px-6 py-2 justify-between items-center sticky top-0 z-50">
    <a href="/  "  class="flex items-center ">
      <img src="{{ asset('images/Gharsewaicon.jpg') }}" alt="GharSewa Logo" class="w-25 h-20 rounded-full" />
      <span class="text-3xl font-extrabold text-gray-700 tracking-wide">GharSewa</span>
    </a>
    <div class="flex space-x-12 text-lg font-medium text-gray-700">
      <a href="/Home" class="hover:text-gray-500 transition-colors duration-300">Home</a>
      <a href="/Aboutus" class="hover:text-gray-500 transition-colors duration-300">About Us</a>
      <a href="/Service" class="hover:text-gray-500 transition-colors duration-300">Services</a>
      <a href="/Contactus" class="hover:text-gray-500 transition-colors duration-300">Contact Us</a>
    </div>
    <div class="space-x-4">
      <a href="{{route('login')}}"><button class="bg-white border border-gray-700 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-100 transition">Login</button></a>
      <a href="{{route('register')}}"><button class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">Register</button></a>
    </div>
  </nav> --}}
<nav class="flex bg-white shadow-md px-6 py-2 justify-between items-center sticky top-0 z-50">
    <a href="/" class="flex items-center">
        <img src="{{ asset('images/Gharsewaicon.jpg') }}" alt="GharSewa Logo" class="w-25 h-20 rounded-full" />
        <span class="text-3xl font-extrabold text-gray-700 tracking-wide">GharSewa</span>
    </a>

    <div class="flex space-x-12 text-lg font-medium text-gray-700">
        <a href="/Home" class="hover:text-gray-500 transition-colors duration-300">Home</a>
        <a href="/Aboutus" class="hover:text-gray-500 transition-colors duration-300">About Us</a>
        <a href="/Service" class="hover:text-gray-500 transition-colors duration-300">Services</a>
        <a href="/Contactus" class="hover:text-gray-500 transition-colors duration-300">Contact Us</a>
    </div>

    <div class="space-x-4">
        @if (Route::has('login'))
            @auth
                {{-- <a
                    href="{{ url('/dashboard') }}"
                    class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition"
                >
                    Dashboard
                </a> --}}
                <!-- Settings Dropdown -->
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
            @else
                <a href="{{ route('login') }}"
                    class="bg-white border border-gray-700 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-100 transition">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">
                        Register
                    </a>
                @endif
            @endauth
        @endif
    </div>
</nav>
