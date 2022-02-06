<div class="panel flex flex-col pb-0" wire:init="load">

    <x-heading heading="Property Details" description="Details about your property" class="col-span-full" />

    <div class="divide-muted-lighter flex flex-col -mx-5 divide-y">
        @if ($properties)
            @foreach ($properties as $property)
                <a href="{{ route('admin.properties.edit', $property->id) }}">
                    <div class="flex items-center justify-between w-full px-5 py-3 space-x-5">
                        <div class="w-full truncate">
                            <h1 class="font-semibold truncate">{{ $property->name }}</h1>
                            <div class="text-muted text-sm truncate">{{ $property->address }}</div>
                        </div>
                        <div class="md:w-full">
                            <span class="label muted">
                                vacant
                            </span>
                        </div>
                        <div class="flex items-center justify-between space-x-2">
                            <svg class="text-muted w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="px-5 divide-y">
                <div class="animate-pulse py-4 space-y-3">
                    <div class="bg-muted-light w-[10rem] h-4 rounded-full"></div>
                    <div class="bg-muted-lighter w-[30rem] max-w-full h-3 rounded-full"></div>
                </div>
            </div>
        @endif
    </div>
</div>
