<x-guest-layout>
    <div class="auth-title">
        Create account
    </div>

    {{-- <div class="auth-subtitle">
        Let's get started with your 30 days free trial
    </div> --}}

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <!-- Name -->
        <div class="auth-input-group">
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div class="auth-input-group">
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Phone -->
        <div class="auth-input-group">
            <x-text-input id="phone" type="tel" name="phone" :value="old('phone')" required autocomplete="tel" placeholder="Phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-1" />
        </div>

        <!-- Address -->
        <div class="auth-input-group">
            <x-text-input id="address" type="text" name="address" :value="old('address')" required autocomplete="street-address" placeholder="Address" />
            <x-input-error :messages="$errors->get('address')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="auth-input-group">
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="auth-input-group">
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="pt-2">
            <x-primary-button>
                Create account
            </x-primary-button>
        </div>

        <div class="text-center">
            <span class="text-sm text-gray-600">Already have an account? </span>
            <a href="{{ route('login') }}" class="auth-link text-sm">
                Log in
            </a>
        </div>
    </form>
</x-guest-layout>
