<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style></style>
        @endif
    </head>
    <body>
        <!-- Header Component -->
        <livewire:components.header />
        <livewire:auth.dashboard.header />

        <div class="flex">
            <!-- Sidebar -->
            <livewire:auth.dashboard.sidebar />

            <!-- Main Content -->
            <main class="flex-1 p-4 bg-primary dark:bg-primary text-secondary dark:text-secondary">
                @yield('content')
            </main>
        </div>

        <!-- Footer Component -->

        <script src="{{ asset('js/darkMode.js') }}"></script>
    </body>
</html>
