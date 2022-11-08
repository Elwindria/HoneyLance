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
    </head>
    <body class="bg-honey-light/40">
        <div class="font-sans text-king antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
