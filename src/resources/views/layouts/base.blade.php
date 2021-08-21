<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?{{ rand() }}">
    @livewireStyles

    {{-- Scripts --}}
    @livewireScripts
    <script src="{{ asset('js/app.js') }}?{{ rand() }}" defer></script>

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr(".flatpickr");

    </script> --}}


</head>

<body class="relative text-gray-600 bg-gray-100" x-data="{ bodyLocked: false, popupOpen: false }">

    <div :class="{ 'max-h-screen overflow-hidden': bodyLocked }" @lockbody.window="bodyLocked = true" @unlockbody.window="bodyLocked = false">
        @yield('body')
    </div>


    {{-- <x-popup /> --}}

    {{-- Script stack --}}
    @stack('scripts')
</body>

</html>