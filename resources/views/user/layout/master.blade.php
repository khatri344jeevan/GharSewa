
    @include('user.layout.head')

<body class="bg-gray-100 flex font-sans">
    <!-- Sidebar -->
    @include('user.layout.sidebar')

    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col mt-10">
        @include('user.layout.header')

        <!-- Page Content -->
        <main class="flex-1 mt-10">
            @yield('content')
        </main>
    </div>
</body>

</html>
