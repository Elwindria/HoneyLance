<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @toastScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:scripts />
    <livewire:styles />
</head>
<body>
    <livewire:toasts />
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ route('user-settings') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Paramètres utilisateur</a>
                <a href="{{ route('trades-list') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Résumé</a>
                <a href="{{ route('trade-store', ['trade_id' => 'none']) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Nouvelle transaction</a>
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>      
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
            <div class="flex flex-col justify-center">
                <label for=""></label>
                <input type="" id="" wire:model.debounce.500ms='' value="{{ ('') }}">
                @error('') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
        @endif
    </div>
</body>
</html>
