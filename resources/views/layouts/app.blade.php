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
            <div class="mx-auto max-w-7xl px-2 sm:px-3 lg:px-4 relative z-50 flex justify-between py-2 sm:py-3 lg:py-4">
                @auth
                <div class="relative z-10 flex items-center">
                    <a href="{{ route('trades-list')}}" class="flex items-center gap-1">
                        <img class="h-10 w-auto" src="{{ url('images/logo.png')}}">
                        <p class='text-darkHoney font-bold text-2xl'>Honey<span class="text-honey">lance</span></p>
                    </a>
                </div>
                <div class="lg:flex hidden items-center gap-6">
                    <a href="{{ route('user-settings') }}" class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors font-semibold border-honey text-honey hover:border-darkHoney hover:text-darkHoney active:bg-honey active:text-honey lg:block">Paramètres utilisateur</a>
                    <a href="{{ route('dashboard') }}" class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-darkHoney text-white hover:bg-darkHoney-900 active:bg-darkHoney active:text-white/80 lg:block">Dashboard</a>
                </div>
                <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left">
                    <div>
                        <button @click="open = !open" type="button" class="relative group flex p-2 items-center rounded-full text-honey-300 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-honey-300 focus:ring-offset-2 focus:ring-offset-honey-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                              </svg>
                        </button>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" @click="open = false">Account settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" @click="open = false">Support</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" @click="open = false">License</a>
                        </div>
                    </div>
                </div>
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
