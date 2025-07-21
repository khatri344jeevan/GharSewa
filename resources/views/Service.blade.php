<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <x-navbar />


    <section class="scroll-mt-24 bg-gray-100 py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-bold text-center text-gray-700 mb-6 tracking-wide">Our Services</h2>
            <p class="text-center text-lg text-gray-700 mb-8 max-w-3xl mx-auto leading-relaxed">
                GharSewa offers essential home maintenance services including cleaning, plumbing, and electrical repairs
                all
                delivered by trusted, verified professionals.
            </p>

            <div class="pb-6 text-center ">
                <a href="/BookPackage">
                    <button
                        class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-xl text-lg transition-all duration-300">
                        Book Maintenance Package
                    </button>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Cleaning Service -->
                <div
                    class="bg-white rounded-3xl shadow-lg p-10 flex flex-col gap-10 transition-transform hover:scale-[1.03] duration-300">
                    <div class="w-full">
                        <h3 class="text-3xl font-extrabold text-gray-700 mb-6 tracking-wide">Cleaning Service</h3>
                        <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                            Keep your property spotless with professional housekeeping and deep cleaning options.
                            Customizable schedules and real-time updates included. Experience the convenience of a
                            clean,
                            welcoming space managed by trusted experts.
                        </p>
                        <div class="w-full flex flex-wrap items-center gap-6 p-4 mb-8">
                            <h4 class="text-xl font-semibold text-gray-700 tracking-wide">View Packages</h4>
                            <a href="/CleaningPackage"
                                class="bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 shadow font-semibold transition">
                                See Options
                            </a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <img src="{{ asset('images/cleaning1.jpg') }}" alt="Cleaning 1"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/cleaning2.jpg') }}" alt="Cleaning 2"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/cleaning3.jpg') }}" alt="Cleaning 3"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                        </div>
                    </div>
                </div>

                <!-- Electrical Service -->
                <div
                    class="bg-white rounded-3xl shadow-lg p-10 flex flex-col gap-10 transition-transform hover:scale-[1.03] duration-300">
                    <div class="w-full">
                        <h3 class="text-3xl font-extrabold text-gray-700 mb-6 tracking-wide">Electrical Service</h3>
                        <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                            From routine installations to emergency repairs, we ensure your property stays powered,
                            safe,
                            and compliant with verified electricians.
                        </p>
                        <div class="w-full flex flex-wrap items-center gap-6 p-4 mb-8">
                            <h4 class="text-xl font-semibold text-gray-700 tracking-wide">View Packages</h4>
                            <a href="/ElectricalPackage"
                                class="bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 shadow font-semibold transition">
                                See Options
                            </a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <img src="{{ asset('images/electrical1.jpeg') }}" alt="Electrical 1"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/electrical2.jpeg') }}" alt="Electrical 2"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/electrical3.jpeg') }}" alt="Electrical 3"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                        </div>
                    </div>
                </div>

                <!-- Plumbing Service -->
                <div
                    class="bg-white rounded-3xl shadow-lg p-10 flex flex-col gap-10 transition-transform hover:scale-[1.03] duration-300">
                    <div class="w-full">
                        <h3 class="text-3xl font-extrabold text-gray-700 mb-6 tracking-wide">Plumbing Service</h3>
                        <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                            Leaky taps or major repairs , our skilled plumbers deliver reliable service on time.
                            Available
                            on-demand or with a care plan.
                        </p>
                        <div class="w-full flex flex-wrap items-center gap-6 p-4 mb-8">
                            <h4 class="text-xl font-semibold text-gray-700 tracking-wide">View Packages</h4>
                            <a href="/PlumbingPackage"
                                class="bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 shadow font-semibold transition">
                                See Options
                            </a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <img src="{{ asset('images/plumbing1.jpeg') }}" alt="Plumbing 1"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/plumbing2.jpeg') }}" alt="Plumbing 2"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/plumbing3.jpeg') }}" alt="Plumbing 3"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                        </div>
                    </div>
                </div>

                <!-- Device & Appliance Support -->
                <div
                    class="bg-white rounded-3xl shadow-lg p-10 flex flex-col gap-10 transition-transform hover:scale-[1.03] duration-300">
                    <div class="w-full">
                        <h3 class="text-3xl font-extrabold text-gray-700 mb-6 tracking-wide">Device &amp; Appliance
                            Support
                        </h3>
                        <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                            We provide setup, repair, and maintenance for essential devices like printers, tube lights,
                            scanners, projectors, and more. Our skilled technicians ensure your equipment stays
                            efficient
                            and functional at home or in the office.
                        </p>
                        <div class="w-full flex flex-wrap items-center gap-6 p-4 mb-8">
                            <h4 class="text-xl font-semibold text-gray-700 tracking-wide">View Packages</h4>
                            <a href="/DevicePackage"
                                class="bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 shadow font-semibold transition">
                                See Options
                            </a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <img src="{{ asset('images/printer.jpg') }}" alt="Printer"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/projector.jpeg') }}" alt="Projector"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                            <img src="{{ asset('images/scanner.jpeg') }}" alt="Scanner"
                                class="w-full h-36 object-cover rounded-2xl shadow-md" loading="lazy" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <x-footer />

</body>

</html>
