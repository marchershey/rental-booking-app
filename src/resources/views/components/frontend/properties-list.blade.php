<div class="" wire:init="loadProperties">
    @if ($properties)
        <ul role="list" class="flex flex-col gap-10">
            @foreach ($properties as $property)
                <li class="overflow-hidden bg-white rounded shadow-lg">
                    <div class="sm:grid-cols-5 grid grid-cols-1">

                        <div class="grid grid-cols-2 col-span-2 gap-2">
                            <div class="col-span-2">
                                <img class="sm:rounded-br" src="/storage/{{ $property->photos->first()->path }}" alt="">
                            </div>
                            @if ($property->photos->has([1, 2]))
                                <div>
                                    <img class="sm:rounded-br-none rounded-r" src="/storage/{{ $property->photos[1]->path }}" alt="">
                                </div>
                                <div>
                                    <img class="sm:rounded-t sm:rounded-bl-none rounded-l" src="/storage/{{ $property->photos[2]->path }}" alt="">
                                </div>
                            @endif
                        </div>

                        <div class="w-full col-span-3 p-5">
                            <div class="flex flex-col justify-between h-full space-y-5">
                                <div class="flex flex-col gap-5">
                                    <div>
                                        <h1 class="line-clamp-2 text-2xl font-semibold">{{ $property->listing_headline }}</h1>
                                        <p class="text-muted line-clamp-7 mt-2">{{ $property->listing_desc }}</p>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        <div class="px-2 py-1 text-xs bg-gray-200 rounded">{{ $property->guests }} guests</div>
                                        <div class="px-2 py-1 text-xs bg-gray-200 rounded">{{ $property->bedrooms }} bedrooms</div>
                                        <div class="px-2 py-1 text-xs bg-gray-200 rounded">### beds</div>
                                        <div class="px-2 py-1 text-xs bg-gray-200 rounded">{{ $property->bathrooms }} bathrooms</div>
                                    </div>
                                </div>
                                <div class="flex items-end h-full">
                                    <button class="hover:text-primary w-full py-3 font-bold bg-white">View Property</button>
                                    <button class="bg-primary hover:bg-primary-darker w-full py-3 font-bold text-white rounded">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <div>loading...</div>
    @endif
</div>
