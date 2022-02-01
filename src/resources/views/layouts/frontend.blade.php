<x-layouts.base>
    <div class="relative">
        @hasSection('navbar')
            @include('layouts.frontend-nav')
        @else
            <x-slot name="navbar">
                Server Error
            </x-slot>
        @endif
        <div class="min-full-screen">
            {{ $slot }}
        </div>
        @include('layouts.frontend-footer')
    </div>
</x-layouts.base>
