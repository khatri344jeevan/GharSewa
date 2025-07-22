
    @include('service_provider.layouts.head')

<body class="bg-gray-100 flex font-sans">
    <!-- Sidebar -->
    @include('service_provider.layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col mt-10">
        @include('service_provider.layouts.header')

        <!-- Page Content -->
        <main class="flex-1 m-10">
            @yield('content')
        </main>
    </div>
    @yield('scripts')

</body>

</html>