<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @toastScripts
    </head>
    <body class="font-sans antialiased">
        <livewire:toasts />
        <div class="bg-gray-100">
            <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <a href="{{ route('user-settings') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Paramètres utilisateur</a>
                    <a href="{{ route('trades') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Nouvelle transaction</a>
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>           
                </div>
            </div>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
