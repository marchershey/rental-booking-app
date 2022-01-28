<div class="" wire:init="loadProperties">
    @if ($properties)
        <ul role="list" class="flex flex-col gap-5">
            @foreach ($properties as $key => $property)
                <li class="overflow-hidden bg-white rounded shadow-lg">
                    <div class="sm:grid-cols-5 grid grid-cols-1">
                        <div class="col-span-2">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper{{ $key }}">
                                <div class="swiper-wrapper">
                                    @foreach ($property->photos as $photo)
                                        <div class="swiper-slide">
                                            <img class="swiper-lazy" data-src="/storage/{{ $property->photos->first()->path }}" alt="">
                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                        </div>
                                    @endforeach
                                </div>
                                @if (count($property->photos) > 1)
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                @endif
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <script>
                            var swiper{{ $key }} = new Swiper(".mySwiper{{ $key }}", {
                                lazy: true,
                                pagination: {
                                    el: ".swiper-pagination",
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                            });
                        </script>

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
                                        <div class="px-2 py-1 text-xs bg-gray-200 rounded">{{ $property->beds }} beds</div>
                                        <div class="px-2 py-1 text-xs bg-gray-200 rounded">{{ $property->bathrooms }} bathrooms</div>
                                    </div>
                                </div>
                                <div class="flex items-end h-full">
                                    <button class="hover:text-primary w-full py-3 font-bold bg-white">View Property</button>
                                    <a href="{{ route('frontend.reserve', $property->id) }}" class="bg-primary hover:bg-primary-darker w-full py-3 font-bold text-center text-white rounded">Book Now</a>
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
