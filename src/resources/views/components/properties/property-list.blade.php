<div wire:init="init">

    <x-base.div-box>
        @if ($properties)
            @if (count($properties) > 0)
                <ul role="list" class="sm:grid-cols-3 sm:gap-5 lg:grid-cols-3 grid grid-cols-2 gap-3">
                    @foreach ($properties as $key => $property)
                        <a href="/dashboard/properties/{{ $property->id }}">
                            <li class="group relative cursor-pointer">
                                <div class="aspect-w-3 aspect-h-2 block w-full overflow-hidden bg-gray-100 border border-transparent rounded-lg">
                                    <img src="/storage/{{ $property->photos()->first()->path }}" alt="" class="object-cover object-center w-full pointer-events-none">
                                </div>
                                <div class="flex flex-col mt-1">
                                    <span class="block w-full text-sm font-medium truncate pointer-events-none">{{ $property->listing_headline }}</span>
                                    <span class="text-muted text-xs capitalize truncate">{{ $property->address }}, {{ $property->city }}, {{ $property->state }}</span>
                                </div>
                            </li>
                        </a>
                    @endforeach
                    <a href="/dashboard/properties/new">
                        <li class="group relative">
                            <div class="aspect-w-3 aspect-h-2 block w-full overflow-hidden bg-gray-100 border border-transparent rounded-lg cursor-pointer">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="text-muted text-xs">Add another listing...</span>
                                </div>
                            </div>
                        </li>
                    </a>
                </ul>
            @else
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
            @endif
        @endif

        <div wire:loading.flex class="flex justify-center w-full">
            <div>
                <svg class="animate-spin text-muted w-24 h-24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    </x-base.div-box>
</div>
