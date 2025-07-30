@extends('service_provider.layouts.master')

<body class="bg-gray-100 flex font-sans">
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
                    <a href="{{ route('service_provider.dashboard') }}"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-speedometer2 text-lg"></i>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('service_provider.profile') }}"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg bg-gray-400 text-gray-900 font-semibold">
                        <i class="bi bi-person-circle text-lg"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center gap-4 px-5 py-3 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition font-semibold">
                        <i class="bi bi-calendar-check text-lg"></i>
                        My Tasks
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

<main class="flex-1 ml-64 pt-20 pb-8 px-8">
    <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Edit Profile</h1>
                        <p class="text-gray-600 mt-2">Update your service provider information</p>
                    </div>
                    <a href="{{ route('service_provider.profile') }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                        <i class="bi bi-arrow-left mr-2"></i>Back to Profile
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('service_provider.profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $serviceProvider->name) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                   required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input type="email"
                                   id="email"
                                   value="{{ $serviceProvider->email }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed"
                                   readonly>
                            <p class="text-sm text-gray-500 mt-1">Email cannot be changed</p>
                        </div>


                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <input type="tel"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone', $serviceProvider->phone) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                                   placeholder="e.g., +977-9841234567">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="md:col-span-2">
                            <label for="specialization" class="block text-sm font-medium text-gray-700 mb-2">
                                Specialization <span class="text-red-500">*</span>
                            </label>
                            <select id="specialization"
                                    name="specialization"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('specialization') border-red-500 @enderror"
                                    required>
                                <option value="">Select your specialization</option>
                                <option value="Plumbing Service" {{ old('specialization', $serviceProvider->specialization) == 'Plumbing' ? 'selected' : '' }}>Plumbing Service</option>
                                <option value="Electrical Service" {{ old('specialization', $serviceProvider->specialization) == 'Electrical' ? 'selected' : '' }}>Electrical Service</option>
                                <option value="Cleaning Service" {{ old('specialization', $serviceProvider->specialization) == 'Cleaning' ? 'selected' : '' }}>Cleaning Service</option>
                                <option value="Device & Appliance" {{ old('specialization', $serviceProvider->specialization) == 'Appliance Repair' ? 'selected' : '' }}>Device & Appliance Support</option>
                            </select>
                            @error('specialization')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="md:col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">
                                Bio / About Me
                            </label>
                            <textarea id="bio"
                                      name="bio"
                                      rows="5"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('bio') border-red-500 @enderror"
                                      placeholder="Tell us about yourself, your experience, and what makes you special...">{{ old('bio', $serviceProvider->bio) }}</textarea>
                            @error('bio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-sm text-gray-500 mt-1">Maximum 1000 characters</p>
                        </div>
                    </div>

                
                    <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t">
                        <a href="{{ route('service_provider.profile') }}"
                           class="px-6 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 font-semibold transition">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-6 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg font-semibold transition">
                            <i class="bi bi-check-circle mr-2"></i>Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
