<x-guest-layout>
    <div class="auth-title text-xl">
        Forgot your password?
    </div>

    <div class="auth-subtitle pt-3 font-bold text-red-600">
        No problem. Just let us know your email address and we will email you a password reset link.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf

        <!-- Email Address -->
        <div class="auth-input-group mt-4 space-y-4">
            <x-input-label for="email" :value="__('Email address')"  />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email address" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="pt-3">
            <x-primary-button>
                Email password reset link
            </x-primary-button>
        </div>

        <div class="text-center pt-3">
            <a href="{{ route('login') }}" class="auth-link text-sm">
                Back to sign in
            </a>
        </div>
    </form>
</x-guest-layout>
