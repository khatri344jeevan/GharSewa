{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <x-navbar />

    <div class="bg-gray-100 text-gray-800 p-10">
    <div class="w-full flex flex-col lg:flex-row gap-x-32 ">

    <div class="lg:w-1/2 space-y-10 px-4">
      <!-- Contact Us -->
      <div>
        <h2 class="text-4xl font-bold mb-4">Contact Us</h2>
        <div class="space-y-2">
          <div class="flex items-center gap-2">
            <ion-icon name="location-sharp" class="w-7 h-7"></ion-icon>
            <span>Kathmandu, Nepal</span>
          </div>
          <div class="flex items-center gap-2">
            <ion-icon name="call-outline"  class="w-6 h-6"></ion-icon>
            <span>+977-9745619727</span>
          </div>
          <div class="flex items-center gap-2">
            <ion-icon name="mail-outline"  class="w-6 h-6"></ion-icon>
            <span>support@gharsewa.com</span>
          </div>
        </div>
      </div>

      <!-- Office Hours -->
      <div>
        <h2 class="text-2xl font-bold mb-4">Office Hours</h2>
        <p><span class="font-medium">Monday to Friday</span><br>9:00 am to 6:00 pm</p>
        <p class="mt-2"><span class="font-medium">Sunday</span><br>9:00 am to 12 noon</p>
      </div>

      <!-- Social Links -->
      <div>
        <h2 class="text-2xl font-semibold mb-4">Follow us online</h2>
        <div class="flex items-center space-x-4 mb-2 text-3xl">
          <a href="#" class="text-blue-600 hover:text-blue-800"><i class="bi bi-facebook text-blue-600 text-3xl"></i></a>
          <a href="#" class="hover:text-black"><i class="bi bi-twitter text-blue-400 text-3xl"></i></a>
          <a href="#" class="text-pink-500 hover:text-pink-800"><i class="bi bi-instagram text-pink-500 text-3xl"></i></a>
        </div>
        <p class="text-sm text-gray-600">Simplifying property care across Nepal with verified  <br>professionals and smart digital tools.</p>
      </div>
    </div>

    <!-- Right Side: Contact Form -->
    <div class="lg:w-2/5 ">
      <form id="contact" action="#" method="POST"
        class="scroll-mt-24 px-6 sm:px-10 py-10 bg-white rounded-xl shadow-lg">
        <p class="text-3xl font-bold text-center py-3">Contact Us</p>

        <div class="space-y-4">
          <div>
            <label for="name" class="block mb-1 font-semibold">Name:</label>
            <input type="text" id="name" name="name"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="your name" required>
          </div>

          <div>
            <label for="email" class="block mb-1 font-semibold">Email:</label>
            <input type="email" id="email" name="email"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="example@mail.com" required>
          </div>

          <div>
            <label for="contactnumber" class="block mb-1 font-semibold">Contact Number:</label>
            <input type="number" id="contactnumber" name="contactnumber"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="contact number" required>
          </div>

          <div>
            <label for="message" class="block mb-1 font-semibold">Message:</label>
            <textarea name="message" id="message"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="Your message..."></textarea>
          </div>

          <button type="submit"
            class="w-full bg-gray-700 text-white py-2 rounded hover:bg-gray-800 transition duration-200">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<x-footer />


</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <x-navbar />

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
            }, 3000);
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

    <div class="bg-gray-100 text-gray-800 p-10">
        <div class="w-full flex flex-col lg:flex-row gap-x-32">

            <!-- Left Info Section -->
            <div class="lg:w-1/2 space-y-10 px-4">
                <div>
                    <h2 class="text-4xl font-bold mb-4">Contact Us</h2>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <ion-icon name="location-sharp" class="w-7 h-7"></ion-icon>
                            <span>Kathmandu, Nepal</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <ion-icon name="call-outline" class="w-6 h-6"></ion-icon>
                            <span>+977-9745619727</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <ion-icon name="mail-outline" class="w-6 h-6"></ion-icon>
                            <span>gharsewa5@gmail.com</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-4">Office Hours</h2>
                    <p><span class="font-medium">Monday to Friday</span><br>9:00 am to 6:00 pm</p>
                    <p class="mt-2"><span class="font-medium">Sunday</span><br>9:00 am to 12 noon</p>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Follow us online</h2>
                    <div class="flex items-center space-x-4 mb-2 text-3xl">
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="hover:text-black"><i class="bi bi-twitter text-blue-400"></i></a>
                        <a href="#" class="text-pink-500 hover:text-pink-800"><i class="bi bi-instagram"></i></a>
                    </div>
                    <p class="text-sm text-gray-600">Simplifying property care across Nepal with verified professionals
                        and smart digital tools.</p>
                </div>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="lg:w-2/5">
                <form method="POST" action="{{ route('contact.submit') }}"
                    class="px-6 sm:px-10 py-10 bg-white rounded-xl shadow-lg">
                    @csrf

                    <p class="text-3xl font-bold text-center py-3">Contact Us</p>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block mb-1 font-semibold">Name:</label>
                            <input type="text" id="name" name="name"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Your name" required>
                        </div>

                        <div>
                            <label for="email" class="block mb-1 font-semibold">Email:</label>
                            <input type="email" id="email" name="email"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="example@mail.com" required>
                        </div>

                        <div>
                            <label for="contactnumber" class="block mb-1 font-semibold">Contact Number:</label>
                            <input type="number" id="contactnumber" name="contactnumber"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Contact number" required>
                        </div>

                        <div>
                            <label for="message" class="block mb-1 font-semibold">Message:</label>
                            <textarea name="message" id="message"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Your message..." required></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-gray-700 text-white py-2 rounded hover:bg-gray-800 transition duration-200">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
