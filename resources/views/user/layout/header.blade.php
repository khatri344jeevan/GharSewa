<!-- Main Content -->
    {{-- <div class="flex-1 ml-40 min-h-screen flex flex-col bg-gray-70 mt-10 "> --}}
        <!-- Top bar -->
        <header
            class=" h-15 fixed top-0 left-0 right-0 bg-gray-300 shadow-md py-6 px-4 pl-64 flex justify-between items-center border-b border-gray-400 z-20">
            {{-- <h1 class="text-2xl font-extrabold text-gray-800">Dashboard</h1> --}}
            <div class="ml-5 text-gray-700 text-base font-semibold ">
                Welcome,
                <span class="text-gray-900">{{ Auth::user()->name }}</span>
            </div>

            {{-- <div class="bg-white shadow rounded-xl border border-blue-200 p-4 md:col-span-1">
                <h2 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                    <i class="bi bi-bell-fill text-gray-800 mr-2"></i> Notifications
                </h2>
                <form method="POST" action="{{ route('user.notifications.markAllRead') }}">
                    @csrf
                    <button type="submit" class="text-xs text-blue-500 underline mb-2">Mark all as read</button>
                </form>
                <div class="max-h-64 overflow-y-auto">
                    @forelse($notifications as $notification)
                        <div
                            class="p-2 mb-2 bg-gray-50 shadow-sm rounded border-l-4 {{ $notification->read_at ? 'border-gray-300' : 'border-blue-500' }}">
                            <p class="text-gray-700 text-sm">{{ $notification->data['message'] ?? '' }}</p>
                            <a href="{{ $notification->data['url'] ?? '#' }}"
                                class="text-blue-600 hover:underline mt-1 inline-block text-xs">
                                View Booking
                            </a>
                            @if (!$notification->read_at)
                                <form method="POST" action="{{ route('user.notifications.markRead', $notification->id) }}"
                                    class="inline">
                                    @csrf
                                    <button type="submit" class="text-xs text-green-600 underline ml-2">Mark as
                                        read</button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">You have no new notifications.</p>
                    @endforelse
                </div>
            </div> --}}

        </header>
