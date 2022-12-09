<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <title>{{ config('app.name', 'Honeylance') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Gérer votre salaire de freelance n'aura jamais été aussi facile 💖">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#FFFFFF">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#FFFFFF">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#FFFFFF">

    <link rel='manifest' href='{{ asset('manifest.json') }}'>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="canonical" href="https://honeylance.vinvui.com/login">
    <link rel="apple-touch-icon" href="{{ asset('appImages/maskable/maskable_icon_x192.png') }}">

    <!-- PWA Modules -->
    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
        const el = document.createElement('pwa-update');
        document.body.appendChild(el);
    </script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@pwabuilder/pwainstall"></script>

    <!-- Fonts GDPR friendly -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:200,300,400,500,600,700,800" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @toastScripts
    <script src="https://unpkg.com/website-carbon-badges@1.1.3/b.min.js" defer></script>
</head>
<body class="antialiased bg-body text-king font-body">

    {{ $slot }}

    <pwa-update></pwa-update>
</body>
</html>
