<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy - GharSewa</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Alpine.js (Optional) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <x-navbar />

    <main class="px-4 max-w-5xl mx-auto py-10">
        <section class="mb-8">
            <h1 class="text-4xl font-bold mb-2">Privacy Policy</h1>
            <p class="text-lg text-gray-700">
                At <strong>GharSewa</strong>, we are committed to protecting your privacy. This Privacy Policy explains
                how we collect, use, and safeguard your personal information.
            </p>
        </section>

        <!-- Section 1 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">1. Information We Collect</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li><strong>Personal Info:</strong> Name, email, phone, address, etc.</li>
                <li><strong>Property Info:</strong> Type, location, photos, and records.</li>
                <li><strong>Service Data:</strong> Bookings, preferences, ratings, feedback.</li>
                <li><strong>Technical Info:</strong> IP address, browser, device, cookies.</li>
            </ul>
        </section>

        <!-- Section 2 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">2. How We Use Your Information</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>To provide and manage property services efficiently.</li>
                <li>To personalize your dashboard and updates.</li>
                <li>To connect you with verified service providers.</li>
                <li>To enhance platform security and performance.</li>
            </ul>
        </section>

        <!-- Section 3 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">3. Data Security</h2>
            <p class="text-gray-700">
                We protect your data using encryption and secure servers. Access is restricted to authorized personnel
                only.
            </p>
        </section>

        <!-- Section 4 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">4. Data Sharing</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>We never sell or rent your personal data.</li>
                <li>We only share data with trusted service partners as needed.</li>
                <li>We comply with legal requests when required by law.</li>
            </ul>
        </section>

        <!-- Section 5 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">5. Your Rights</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>Edit or delete your information via profile settings.</li>
                <li>Request data export or account removal by contacting support.</li>
                <li>Opt-out of marketing messages at any time.</li>
            </ul>
        </section>

        <!-- Section 6 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">6. Cookies</h2>
            <p class="text-gray-700">
                We use cookies to enhance user experience. You can manage cookies in your browser settings. Some
                features may not work properly if disabled.
            </p>
        </section>

        <!-- Section 7 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">7. Policy Updates</h2>
            <p class="text-gray-700">
                This policy may change as our services evolve. Any updates will be posted here. Continued use means
                acceptance of the changes.
            </p>
        </section>

        <!-- Section 8 -->
        <section class="mb-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-3">8. Contact</h2>
            <p class="text-gray-700 mb-4">For questions or privacy concerns, contact us at:</p>

            <div class="flex items-center gap-2 text-gray-800 mb-2">
                <ion-icon name="call-outline" class="w-6 h-6 "></ion-icon>
                <span>+977-9745619727</span>
            </div>

            <div class="flex items-center gap-2 text-gray-800">
                <ion-icon name="mail-outline" class="w-6 h-6"></ion-icon>
                <span>gharsewa5@gmail.com</span>
            </div>
        </section>
    </main>

    <x-footer />
</body>

</html>
