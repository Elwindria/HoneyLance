<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="page">
            Mot de passe oublié ?
        </x-slot>

        <div class="text-sm text-gray-600 py-4">
            Pas de soucis. Veuillez nous indiquer votre adresse e-mail et nous vous enverrons un lien de réinitialisation du mot de passe.
        </div>

        @if (session('status'))
        <div class="p-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="py-4" />

        <form method="POST" action="{{ route('password.email') }}" class="">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" plus="" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
