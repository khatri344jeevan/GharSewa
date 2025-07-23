<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="">
        <div class="auth-title text-center pb-6 font-bold text-2xl pt-3">
            Sign in to your account
        </div>

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <!-- Email Address -->
            <div class="auth-input-group pb-4">
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="auth-input-group">
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                    placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mt-6">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 border-gray-300 rounded"
                        style="accent-color: #1F284F;" name="remember">
                    <span class="ml-2 block text-sm text-gray-700">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="auth-link text-sm" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <div class="pt-4 ">
                <x-primary-button>
                    Sign in
                </x-primary-button>
            </div>

            <div class="text-center mt-3">
                <span class="text-sm text-gray-600">Don't have an account? </span>
                <a href="{{ route('register') }}" class="auth-link text-sm">
                    Sign up
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
