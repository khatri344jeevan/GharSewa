    {{-- <div class="flex-1 ml-40 min-h-screen flex flex-col bg-gray-70 mt-10 "> --}}
        <header
            class=" h-15 fixed top-0 left-0 right-0 bg-gray-300 shadow-md py-6 px-4 pl-64 flex justify-between items-center border-b border-gray-400 z-20">
            {{-- <h1 class="text-2xl font-extrabold text-gray-800">Dashboard</h1> --}}
            <div class="ml-5 text-gray-700 text-base font-semibold ">
                Welcome,
                <span class="text-gray-900">{{ Auth::user()->name }}</span>
            </div>
        </header>
