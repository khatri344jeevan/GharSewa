@include('service_provider.layouts.head')

<body class="bg-gray-100 flex font-sans">
    @include('service_provider.layouts.sidebar')

    <div class=" flex flex-col mt-10">
        @include('service_provider.layouts.header')

        <main class="flex-1 m-10">
            @yield('content')
        </main>
    </div>
    @yield('scripts')

</body>

</html>
