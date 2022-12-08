<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="page">
            Connexion
        </x-slot>

        <x-jet-validation-errors class="p-4" />

        @if (session('status'))
        <div class="p-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" plus="" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" plus="" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 font-extrabold ">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 flex flex-col items-center justify-end gap-2">
                <x-jet-button>
                    {{ __('Log in') }}
                </x-jet-button>
                @if (Route::has('password.request'))
                <a class="mt-2 text-center inline-block font-extrabold hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
