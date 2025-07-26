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
