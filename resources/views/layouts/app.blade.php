<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <script src="dist/clipboard.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-custom-background text-primary-white">
    @unless (request()->routeIs('login') ||
            request()->routeIs('register') ||
            request()->routeIs('password.request') ||
            request()->routeIs('password.reset'))
        <livewire:layout.navigation />
    @endunless

    <main>
        {{ $slot }}
    </main>

    <x-mary-toast />
</body>

</html>
