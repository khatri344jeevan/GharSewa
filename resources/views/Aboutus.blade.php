{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <x-navbar />

    <section
        class=" relative bg-gradient-to-b from-white via-slate-50 to-white py-6 px-6 md:px-16 text-black overflow-hidden">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-20">

            <!-- Left Content -->
            <div class="md:w-1/2 text-left relative z-10">
                <h2
                    class="text-5xl font-extrabold text-gray-700 mb-6 tracking-tight leading-tight border-l-8 border-gray-700 pl-5">
                    About Us
                </h2>

                <p
                    class="text-lg text-gray-700 leading-relaxed mb-12 bg-white/60 backdrop-blur-sm p-6 rounded-xl shadow-lg border border-gray-100">
                    Ghar Sewa is your trusted platform for professional and affordable home services. Whether you need a
                    plumber, electrician, cleaner, or appliance repair expert — we bring verified service providers
                    right to your doorstep. Book easily, get fast support, and enjoy peace of mind with our reliable
                    team.
                </p>

                <h3 class="text-2xl text-gray-700 font-bold mb-6 uppercase tracking-widest">Why Us?</h3>

                <ul class="space-y-5">
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Trained & Verified Professionals – Background-checked and
                            skilled.</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Easy Booking Process – No app download required.</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Transparent Pricing – No hidden charges, upfront estimates.
                        </p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Timely Services – Punctuality is our priority.</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Customer Satisfaction – We listen, we care, we improve.</p>
                    </li>
                </ul>
            </div>

            <!-- Right Image -->
            <div class="md:w-1/2 flex justify-center relative z-10">
                <div class="relative group w-full max-w-md transform transition duration-300 hover:scale-105">
                    <div
                        class="absolute -inset-2 bg-gray-200 rounded-3xl blur-xl opacity-50 group-hover:opacity-70 transition">
                    </div>
                    <img src="{{ asset('images/Aboutus.jpg') }}" alt="About Ghar Sewa"
                        class="relative z-10 rounded-3xl shadow-2xl border-4 border-white w-full object-cover" />
                </div>
            </div>
        </div>

        <!-- Decorative Background Elements (optional) -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-gray-100 rounded-full opacity-30 blur-3xl animate-pulse -z-10">
        </div>
        <div
            class="absolute bottom-0 right-0 w-72 h-72 bg-gray-300 rounded-full opacity-20 blur-3xl animate-pulse -z-10">
        </div>


        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between gap-8 ">

            <!-- Left: Need Help -->
            <div class="md:w-1/2 pt-10">
                <h1 class="text-2xl text-gray-700 font-bold mb-4 uppercase tracking-widest">
                    Need Help?
                </h1>
                <div>
                    <p class="border rounded-lg shadow hover:shadow-lg px-5 py-5 bg-gray-100 font-medium text-gray-800">
                        If you need any help, feel free to contact us through the number or email provided below.
                    </p>
                </div>
            </div>

            <!-- Right: Who is GharSewa for? -->
            <div class="md:w-1/2 mt-4 ">
                <h1 class="text-2xl text-gray-700 font-bold mb-6 uppercase tracking-widest">
                    Who is GharSewa for?
                </h1>
                <ul class="space-y-5">
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Nepalese living abroad</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Busy professionals with no time for property upkeep</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Landlords and real estate investors</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Organizations managing multiple properties</p>
                    </li>
                </ul>
            </div>

        </div>


    </section>



    <x-footer />


</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <x-navbar />

    <section
        class=" relative bg-gradient-to-b from-white via-slate-50 to-white py-6 px-6 md:px-16 text-black overflow-hidden">
        <div class="max-w-7xl  flex flex-col md:flex-row items-center gap-20">
            <div class="md:w-1/2 text-left  relative z-10">
                <h2
                    class="text-5xl font-extrabold text-gray-700 mb-6 tracking-tight leading-tight border-l-8 border-gray-700 pl-5">
                    About Us</h2>

                <p
                    class="text-lg text-gray-700 leading-relaxed mb-12 bg-white/60 backdrop-blur-sm p-6 rounded-xl shadow-lg border border-gray-100">
                    GharSewa is a trusted digital platform that connects you with verified home service professionals
                    across Nepal. Whether you need plumbing, electrical work, cleaning, or appliance repair, we make it
                    easy to book reliable experts from your phone or computer. Designed for busy individuals and
                    property owners living abroad, GharSewa ensures stress-free maintenance with real-time tracking,
                    transparent pricing, and service history management. Our user-friendly system supports both one-time
                    bookings and recurring maintenance packages. We focus on trust, quality, and convenience so you can
                    take care of your property without being there physically. At GharSewa, your home is in safe hands.
                </p>
            </div>


            {{-- image --}}
            <div class="relative group w-full max-w-md transform transition duration-300 hover:scale-105 ml-0 sm:ml-0 md:ml-20  pt-7">
                <div
                    class="absolute -inset-2 bg-gray-200 rounded-3xl blur-xl opacity-50 group-hover:opacity-70 transition">
                </div>
                <img src="{{ asset('images/Aboutus.jpg') }}" alt="About Ghar Sewa"
                    class="relative z-10 rounded-3xl shadow-2xl border-4 border-white w-full object-cover" />
            </div>


        </div>

        <div class="flex flex-col md:flex-row justify-between gap-10">
            {{-- left --}}
            <div class="md:w-1/2 ">
                <h3 class="text-2xl text-gray-700 font-bold mb-6 uppercase tracking-widest">Why Us?</h3>
                <ul class="space-y-5">
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Trained & Verified Professionals — Background-checked and
                            skilled.</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Easy Booking Process — No app download required.</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Transparent Pricing — No hidden charges, upfront estimates.
                        </p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Timely Services — Punctuality is our priority.</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-gray-700 text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Customer Satisfaction — We listen, we care, we improve.</p>
                    </li>
                </ul>
            </div>

            {{-- Right --}}
            <div class="md:w-1/2 pl-10">
                <h1 class="text-2xl text-gray-700 font-bold mb-6 uppercase tracking-widest">Who is GharSewa for?</h1>
                <ul class="space-y-5">
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Nepalese living abroad</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Busy professionals with no time for property upkeep</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Landlords and real estate investors</p>
                    </li>
                    <li class="flex items-start bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                        <span class="text-2xl mr-4 mt-1">✔️</span>
                        <p class="text-gray-800 font-medium">Organizations managing multiple properties</p>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Need Help --}}
        <div class="md:w-1/2 pt-14 mb-5 ">
            <h1 class="text-2xl text-gray-700 font-bold mb-4 uppercase tracking-widest">
                Need Help?
            </h1>
            <div>
                <p class="border rounded-lg shadow hover:shadow-lg px-5 py-6 bg-gray-100 font-medium text-gray-800">
                    If you need any help, feel free to contact us through the number or email provided below.
                </p>
            </div>
        </div>


    </section>

    <x-footer />

</body>

</html>
