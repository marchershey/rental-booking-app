<div class="" wire:init="loadProperties">
    @if ($properties)
        <ul role="list" class="flex flex-col gap-5">
            @foreach ($properties as $key => $property)
                <li class="overflow-hidden bg-white rounded shadow-lg">
                    <div class="sm:grid-cols-5 grid grid-cols-1">

                        <div class="col-span-2">
                            {{-- <div class="swiper swiper1">
                                <div class="absolute inset-0 z-50 p-2">
                                    <div class="flex items-center justify-between h-full">
                                        <div class="hover:bg-white p-1 bg-gray-100 rounded-full">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </div>
                                        <div class="swiper-next">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-wrapper">
                                    @foreach ($property->photos as $photo)
                                        <div class="swiper-slide touch-pan-x">
                                            <div>
                                                <img class="" src="/storage/{{ $property->photos->first()->path }}" alt="">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> --}}

                            <div class="">

                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper{{ $key }}">
                                    <div class="swiper-wrapper">
                                        @foreach ($property->photos as $photo)
                                            <div class="swiper-slide">
                                                <!-- Required swiper-lazy class and image source specified in data-src attribute -->
                                                <img class="swiper-lazy" data-src="/storage/{{ $property->photos->first()->path }}" alt="">
                                                <!-- Preloader image -->
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
                                        nextEl: ".swiper-next",
                                        prevEl: ".swiper-prev",
                                    },
                                });
                            </script>
                        </div>

                        {{-- <div class="grid grid-cols-2 col-span-2 gap-2">
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
                        </div> --}}

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
