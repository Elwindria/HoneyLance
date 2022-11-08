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

    <link rel='manifest' href='{{ asset('manifest.json') }}'>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="canonical" href="https://honeylance.vinvui.com">
    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
            const el = document.createElement('pwa-update');
            document.body.appendChild(el);
         </script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@pwabuilder/pwainstall"></script>
    {{-- <script type="module" src="https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate"></script> --}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('appImages/android/android-launchericon-48-48.png') }}">
    <link rel="icon" type="image/png" sizes="72x72" href="{{ asset('appImages/android/android-launchericon-72-72.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('appImages/android/android-launchericon-96-96.png') }}">
    <link rel="icon" type="image/png" sizes="144x144" href="{{ asset('appImages/android/android-launchericon-144-144.png') }}">
    <link rel="icon" type="image/png" sizes="152x152" href="{{ asset('appImages/android/android-launchericon-192-192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('appImages/android/android-launchericon-512-512.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-honey-light/40">
    <div class="font-sans text-king antialiased">
        {{ $slot }}
    </div>
</body>
</html>
