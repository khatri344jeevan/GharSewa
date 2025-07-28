@include('admin.layout.head')

<body class="bg-gray-100 flex font-sans">
    <!-- Sidebar -->
    @include('admin.layout.sidebar')

    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col mt-10">
        @include('admin.layout.header')

        <!-- Page Content -->
        <main class="flex-1 m-10">
            @yield('content')
        </main>
    </div>

    <!-- ✅ Toast Message (top-right) -->
    @if (session('success'))
        <div id="success-toast"
            class="fixed top-6 right-6 z-50 bg-green-600 text-white px-4 py-2 rounded shadow-md animate-fade-in">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                let toast = document.getElementById('success-toast');
                if (toast) toast.remove();
            }, 5000);
        </script>

        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.4s ease-out;
            }
        </style>
    @endif


</body>

</html>
