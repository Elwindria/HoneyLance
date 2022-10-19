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
        <div class="h-screen">
            @if (Route::has('login'))
            <nav>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-50 flex justify-between py-8">
                    @auth
                        <div class="relative z-10 flex items-center gap-16">
                            <a href="{{ route('trades-list')}}" class="flex items-center gap-1">
                                <img class="h-14 w-auto" src="{{ url('images/logo.png')}}">
                                <p class='text-darkHoney font-bold text-2xl'>Honey<span class="text-honey">lance</span></p>
                            </a>
                        </div>
                        <div class="lg:flex hidden items-center gap-6">
                            <a href="{{ route('user-settings') }}" class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors font-semibold border-honey text-honey hover:border-darkHoney hover:text-darkHoney active:bg-honey active:text-honey lg:block">Paramètres utilisateur</a>
                            <a href="{{ route('dashboard') }}" class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-darkHoney text-white hover:bg-darkHoney-900 active:bg-darkHoney active:text-white/80 lg:block">Dashboard</a> 
                        </div>
                        <img src='{{ url('/images/menu_burger.png') }}' class="lg:hidden">
                    @else
                        <div class="relative z-10 flex items-center gap-16">
                            <a href="{{ route('trades-list')}}">
                                <img class="h-14 w-auto" src="{{ url('images/logo.png')}}">
                            </a>
                        </div>
                        <div class="flex items-center gap-6">
                            <a href="{{ route('login') }}" class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-honey text-gray-700 hover:border-darkHoney active:bg-darkHoney active:text-darkHoney lg:block">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-darkHoney text-white hover:bg-darkHoney-900 active:bg-darkHoney active:text-white/80 lg:block">Register</a>
                            @endif
                        </div>
                    @endauth
                </div>
            </nav>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
