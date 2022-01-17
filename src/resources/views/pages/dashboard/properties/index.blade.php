<x-layouts.dashboard>
    <x-slot name="header">Properties</x-slot>
    <x-slot name="subheader">You can find all of your properties below.</x-slot>

    <div>
        <div class="text-center">
            <h3 class="mt-2 text-xl font-medium text-gray-900">No properties found</h3>
            <p class="mt-1 text-sm italic text-gray-500">
                Looks like you haven't added any properties yet.
            </p>
            <div class="mt-6">
                <a href="{{ route('dashboard.properties.new') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    New Property
                </a>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
