<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-200">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?{{ rand() }}">
    @livewireStyles
    <!-- Scripts -->
    @livewireScripts
    @toastScripts
    <script src="{{ asset('js/app.js') }}?{{ rand() }}"></script>
    @stack('scripts')
</head>

<body class="touch-manipulation relative h-full">
    <livewire:toasts />
    {{-- size indicator --}}
    <div class="fixed bottom-0 right-0 z-50 px-1 text-xs bg-white">
        <div class="sm:hidden">xs</div>
        <div class="sm:block md:hidden hidden">sm</div>
        <div class="md:block lg:hidden hidden">md</div>
        <div class="lg:block xl:hidden hidden">lg</div>
        <div class="xl:block 2xl:hidden hidden">xl</div>
        <div class="2xl:block hidden">2xl</div>
    </div>
    <!-- container -->
    <div> {{ $slot }} </div>

</body>

</html>
