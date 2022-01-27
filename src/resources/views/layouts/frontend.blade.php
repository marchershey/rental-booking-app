<x-layouts.base>
    @include('layouts.frontend-nav')
    <div class="space-y-10 text-gray-600">
        {{ $slot }}
    </div>
    @include('layouts.frontend-footer')
</x-layouts.base>
