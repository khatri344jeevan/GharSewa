<x-guest-layout>
    <div class="auth-title">
        Reset your password
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="auth-form">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">


        <div class="auth-input-group">
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="Enter your email address" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>


        <div class="auth-input-group">
            <x-input-label for="password" :value="__('New password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Enter your new password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="auth-input-group">
            <x-input-label for="password_confirmation" :value="__('Confirm password')" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your new password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div>
            <x-primary-button>
                Reset password
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
