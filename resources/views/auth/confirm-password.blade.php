<x-guest-layout>
    <div class="auth-title">
        Confirm your password
    </div>

    <div class="auth-subtitle">
        This is a secure area of the application. Please confirm your password before continuing.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
        @csrf

        <!-- Password -->
        <div class="auth-input-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div>
            <x-primary-button>
                Confirm
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
