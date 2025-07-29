<!-- Main Content -->
{{-- <div class="flex-1 ml-40 min-h-screen flex flex-col bg-gray-70 mt-10 "> --}}
<!-- Top bar -->
<header
    class="h-15 fixed top-0 left-0 right-0 bg-gray-300 shadow-md py-6 px-4 pl-64 flex justify-between items-center border-b border-gray-400 z-20">
    {{-- <h1 class="text-2xl font-extrabold text-gray-800">Dashboard</h1> --}}
    <div class="ml-5 text-gray-700 text-base font-semibold ">
        Welcome,
        <span class="text-gray-900">{{ Auth::user()->name }}</span>
    </div>

    {{-- Notification Dropdown --}}
    {{-- <div x-data="{ showMessage: false }" class="relative inline-block">
        <button class="text-lg font-semibold text-gray-800 flex items-center" @click="showMessage = !showMessage"
            type="button" aria-haspopup="true">
            <i class="bi bi-bell-fill text-gray-800 mr-2 text-2xl"></i>
            <div
                class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 shadow opacity-0 group-hover:opacity-100 transition duration-200">
                Notifications
            </div>
        </button>

        <div x-show="showMessage" @click.away="showMessage = false" x-transition style="display: none;"
            class="absolute right-0 mt-2 w-80 max-h-64 overflow-y-auto bg-white border border-gray-300 rounded shadow-lg z-50">
            @if ($notifications->count())
                <div class="p-3 bg-green-100 text-green-800 rounded-t text-sm font-semibold">
                    You have {{ $notifications->count() }} new notification{{ $notifications->count() > 1 ? 's' : '' }}!
                </div>

                <form method="POST" action="{{ route('user.notifications.markAllRead') }}" class="p-2 border-b">
                    @csrf
                    <button type="submit" class="text-xs text-blue-500 underline">Mark all as read</button>
                </form>

                @foreach ($notifications as $notification)
                    <div
                        class="p-2 bg-gray-50 shadow-sm border-l-4 rounded border-gray-300 {{ $notification->read_at ? 'border-gray-300' : 'border-blue-500' }} hover:bg-gray-100">
                        <p class="text-gray-700 text-sm">{{ $notification->data['message'] ?? 'No message' }}</p>
                        @if (isset($notification->data['url']))
                            <a href="{{ $notification->data['url'] }}"
                                class="text-blue-600 hover:underline mt-1 inline-block text-xs">
                                View Booking
                            </a>
                        @endif
                        @if (!$notification->read_at)
                            <form method="POST" action="{{ route('user.notifications.markRead', $notification->id) }}"
                                class="inline ml-2">
                                @csrf
                                <button type="submit" class="text-xs text-green-600 underline">Mark as read</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="p-3 text-gray-500 text-sm">
                    You have no new notifications.
                </div>
            @endif
        </div>
    </div> --}}
</header>
