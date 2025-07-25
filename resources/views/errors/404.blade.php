<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>404 Error</title>
  <link rel="icon" href="{{ asset('images/Gharsewa.jpg') }}" type="image/jpeg" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-700 flex items-center justify-center min-h-screen overflow-hidden">

  <div class="text-center text-white max-w-md px-4 mb-28 mt-28">
    <img src="{{ asset('images/error.png') }}" alt="Error Image" class="w-[400px] mx-auto mb-6" />
    <h1 class="text-5xl font-bold mb-2"> Page Not Found</h1>
    <p class="text-lg mb-4">Sorry, the page you’re looking for doesn’t exist.</p>
    <a href="/" class="inline-block">
      <button
        class="bg-gray-800 text-white px-6 py-2  border rounded hover:bg-gray-900 transition duration-200">
        Go Back Home
      </button>
    </a>
  </div>

</body>

</html>
