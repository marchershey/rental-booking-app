<x-layouts.dashboard>
    <x-slot name="header">Properties</x-slot>
    <x-slot name="subheader">All of your properties, in one place.</x-slot>

    <x-base.div-box>
        <div class="text-center">
            <svg class="w-12 h-12 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <h3 class="mt-2 text-xl font-medium text-gray-800">No properties found</h3>
            <p class="text-muted mt-1 leading-5">
                Looks like you haven't added any properties yet.
            </p>
            <div class="mt-6">
                <a href="{{ route('dashboard.properties.new') }}" class="hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 inline-flex items-center px-4 py-2 font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    New Property
                </a>
            </div>
        </div>
    </x-base.div-box>
</x-layouts.dashboard>
