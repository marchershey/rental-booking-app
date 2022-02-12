<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?{{ rand() }}">
    @livewireStyles

    <!-- Scripts -->
    @toastScripts
    <script src="{{ asset('js/app.js') }}?{{ rand() }}" defer></script>
    <script>
        window.livewire_app_url = "{{ config('app.url') }}";
    </script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <livewire:toasts />

    <div class="fixed bottom-0 right-0 z-50 px-1 text-xs bg-white">
        <div class="sm:hidden">xs</div>
        <div class="sm:block md:hidden hidden">sm</div>
        <div class="md:block lg:hidden hidden">md</div>
        <div class="lg:block xl:hidden hidden">lg</div>
        <div class="xl:block 2xl:hidden hidden">xl</div>
        <div class="2xl:block hidden">2xl</div>
    </div>

    <div class="min-h-screen bg-gray-100">

        {{ $slot }}

    </div>

    @livewireScripts
    <!-- Page scripts -->
    @stack('scripts')

    <script>
        window.addEventListener('console', event => {
            console.log(event.detail.message);
        })
    </script>
</body>

</html>
