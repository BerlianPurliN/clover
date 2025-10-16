<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @stack('styles')
    <title>@yield('title', 'Clover')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-deepwhite">

    <div class="sticky top-0 z-50 bg-purewhite">
        @include('components.navbar')
    </div>


    @yield('sidebar')

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @stack('scripts')
</body>

</html>