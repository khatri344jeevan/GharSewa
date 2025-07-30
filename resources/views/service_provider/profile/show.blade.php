@extends('service_provider.layouts.master')

<body class="bg-gray-100 flex font-sans min-h-screen">
    <aside class="bg-gray-300 text-gray-700 h-screen fixed top-0 left-0 flex flex-col shadow-lg z-30 w-64">
        <a href="/">
            <div class="py-4 px-6 flex items-center text-2xl font-extrabold text-gray-800">
                <img src="{{ asset('images/transparentlogo.png') }}" alt="" class="w-12 h-12 mr-2">
                GharSewa
            </div>
        </a>
        <nav class="flex-1 overflow-y-auto mt-8">
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


    <main class="flex-1 ml-64 pt-12 pb-8 px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-6 mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">My Profile</h1>
                    <p class="text-gray-600 mt-2">Manage your service provider information</p>
                </div>
                <a href="{{ route('service_provider.profile.edit') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded-lg font-semibold transition flex items-center">
                    <i class="bi bi-pencil-square mr-2"></i>Edit Profile
                </a>
            </div>

            @if (session('success'))
            <div id="success-toast"
                class="fixed top-6 right-6 z-50 bg-green-600 text-white px-4 py-2 rounded shadow-md animate-fade-in">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    let toast = document.getElementById('success-toast');
                    if (toast) toast.remove();
                }, 3000);
            </script>
            <style>
                @keyframes fade-in {
                    from { opacity: 0; transform: translateY(-20px);}
                    to { opacity: 1; transform: translateY(0);}
                }
                .animate-fade-in { animation: fade-in 0.4s ease-out;}
            </style>
            @endif


            <div class="bg-white rounded-lg shadow-md overflow-hidden">

                <div class="bg-gray-700 p-8 text-white flex items-center gap-8">
                    <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-4xl font-bold">
                        {{ substr($serviceProvider->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold">{{ $serviceProvider->name }}</h2>
                        <p class="text-blue-100 text-lg">{{ $serviceProvider->specialization ?: 'No specialization set' }}</p>
                    </div>
                </div>


                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Contact Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="bi bi-envelope text-gray-500 w-6"></i>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-600">Email</p>
                                        <p class="font-semibold">{{ $serviceProvider->email }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-telephone text-gray-500 w-6"></i>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-600">Phone</p>
                                        <p class="font-semibold">{{ $serviceProvider->phone ?: 'Not provided' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Professional Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="bi bi-briefcase text-gray-500 w-6"></i>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-600">Specialization</p>
                                        <p class="font-semibold">{{ $serviceProvider->specialization ?: 'Not specified' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="bi bi-clock text-gray-500 w-6 mt-1"></i>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-600">Member Since</p>
                                        <p class="font-semibold">{{ $serviceProvider->created_at->format('F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">About Me</h3>
                        <div class="bg-gray-50 rounded-lg p-6">
                            @if($serviceProvider->bio)
                            <p class="text-gray-700 leading-relaxed">{{ $serviceProvider->bio }}</p>
                            @else
                            <p class="text-gray-500 italic">No bio provided yet. Click "Edit Profile" to add your bio.</p>
                            @endif
                        </div>
                    </div>

                
                    <div class="mt-12">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Change Password</h3>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
