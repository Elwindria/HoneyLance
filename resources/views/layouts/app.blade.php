<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#FFFFFF">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#FFFFFF">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#FFFFFF">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @toastScripts
</head>
<body class="font-sans antialiased bg-king">
    <livewire:toasts />
    <div class="h-screen">
        @if (Route::has('login'))
        <nav class="sticky top rounded-b-3xl bg-white">
            <div class="mx-auto max-w-7xl px-2 sm:px-3 lg:px-4 relative z-50 flex justify-between py-2 sm:py-3 lg:py-4">
                @auth
                <div class="relative z-10 flex items-center">
                    <a href="{{ route('trades-list')}}" class="flex items-center gap-1">
                        <img class="h-10 w-auto" src="{{ url('images/logo.png')}}">
                        <p class='text-honey-dark font-bold text-2xl'>Honey<span class="text-honey">lance</span></p>
                    </a>
                </div>
                <div class="lg:flex hidden items-center gap-6">
                    <a href="{{ route('user-settings') }}" class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors font-semibold border-honey text-honey hover:border-darkHoney hover:text-darkHoney active:bg-honey active:text-honey lg:block">Paramètres utilisateur</a>
                    <a href="{{ route('dashboard') }}" class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-darkHoney text-white hover:bg-darkHoney-900 active:bg-darkHoney active:text-white/80 lg:block">Dashboard</a>
                </div>
                <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="lg:hidden relative inline-block text-left">
                    <div>
                        <button @click="open = !open" type="button" class="relative group flex p-2 items-center rounded-full text-king hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-honey-300 focus:ring-offset-2 focus:ring-offset-honey-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                              </svg>
                        </button>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1" role="none">
                            <a href="{{ route('user-settings') }}" class="flex items-center px-4 py-2 text-sm text-gray-700" @click="open = false">
                                <svg width="32" height="32" class="h-4 w-4 mr-2" viewBox="0 0 15 15"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" clip-rule="evenodd"><path d="m5.944.5l-.086.437l-.329 1.598a5.52 5.52 0 0 0-1.434.823L2.487 2.82l-.432-.133l-.224.385L.724 4.923L.5 5.31l.328.287l1.244 1.058c-.045.277-.103.55-.103.841c0 .291.058.565.103.842L.828 9.395L.5 9.682l.224.386l1.107 1.85l.224.387l.432-.135l1.608-.537c.431.338.908.622 1.434.823l.329 1.598l.086.437h3.111l.087-.437l.328-1.598a5.524 5.524 0 0 0 1.434-.823l1.608.537l.432.135l.225-.386l1.106-1.851l.225-.386l-.329-.287l-1.244-1.058c.046-.277.103-.55.103-.842c0-.29-.057-.564-.103-.841l1.244-1.058l.329-.287l-.225-.386l-1.106-1.85l-.225-.386l-.432.134l-1.608.537a5.52 5.52 0 0 0-1.434-.823L9.142.937L9.055.5H5.944Z"/><path d="M9.5 7.495a2 2 0 0 1-4 0a2 2 0 0 1 4 0Z"/></g></svg>
                                Paramètres
                            </a>
                            <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-2 text-sm text-gray-700" @click="open = false">
                                <svg width="32" height="32" class="h-4 w-4 mr-2" viewBox="0 0 24 24"><path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.538Q10.275 15 12 15q1.725 0 3.3.562q1.575.563 2.85 1.538q.875-1.025 1.363-2.325Q20 13.475 20 12q0-3.325-2.337-5.663Q15.325 4 12 4T6.338 6.337Q4 8.675 4 12q0 1.475.488 2.775q.487 1.3 1.362 2.325ZM12 13q-1.475 0-2.488-1.012Q8.5 10.975 8.5 9.5t1.012-2.488Q10.525 6 12 6t2.488 1.012Q15.5 8.025 15.5 9.5t-1.012 2.488Q13.475 13 12 13Zm0 9q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z"/></svg>
                                Compte
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="px-4 py-2 text-sm text-gray-700">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center text-red-600">
                                    <svg width="32" height="32" class="h-4 w-4 mr-2" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22zm7-6v-3h-8v-2h8V8l5 4l-5 4z"/></svg>
                                    Me déconnecter
                                </a>
                            </form>
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
        <main class="bg-king">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>
</html>
