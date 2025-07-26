
    @include('user.layout.head')

<body class="bg-gray-100 flex font-sans">
    <!-- Sidebar -->
    @include('user.layout.sidebar')

    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col mt-10">
        @include('user.layout.header')

        <!-- Page Content -->
        <main class="flex-1 m-10">
            @yield('content')
        </main>
    </div>

    @if(session('success'))
    <div id="toast-success"
         class="fixed top-5 right-5 z-50 bg-green-600 text-white px-6 py-3 rounded shadow-lg animate-fade-in">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast-success');
            if (toast) {
                toast.style.transition = 'opacity 0.5s ease';
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 500);
            }
        }, 4000);
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
            animation: fade-in 0.4s ease forwards;
        }
    </style>
@endif

</body>

</html>
