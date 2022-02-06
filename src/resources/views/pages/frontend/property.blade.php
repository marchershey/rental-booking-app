<div> {{-- FULL PAGE COMPONENT - DONT USE LAYOUT --}}
    <div class="lg:grid-cols-3 grid items-start grid-cols-1 gap-4" wire:init="load">

        <!-- Left column -->
        <div class="lg:col-span-2 space-y-5">
            {{-- Images --}}
            <div class="panel">
                <div class="space-y-3">
                    <div id="main-slider" class="splide -mx-5 -mt-6">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach (\App\Models\Property::first()->photos as $photo)
                                    <li class="splide__slide relative">
                                        <div class="aspect-w-10 aspect-h-7 bg-muted md:rounded-b-lg block w-full overflow-hidden">
                                            <img src="/storage/{{ $photo->path }}" alt="" class="object-cover object-center pointer-events-none">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div id="thumbnail-slider" class="splide -mx-5">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach (\App\Models\Property::first()->photos as $photo)
                                    <li class="splide__slide overflow-hidden rounded-lg">
                                        <div class="aspect-w-10 aspect-h-7 bg-muted block w-full overflow-hidden rounded-b-lg">
                                            <img src="/storage/{{ $photo->path }}" alt="" class="object-cover object-center pointer-events-none">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Details --}}
            <div class="panel">
                <div>
                    <h1></h1>
                </div>
            </div>
        </div>

        <!-- Right column -->
        <div class="panel top-10 sticky flex flex-col space-y-5">
            {{-- Nightly rate and star rate --}}
            <div class="flex justify-between">
                <div class="flex items-baseline">
                    <span class="text-xl font-semibold">$355</span>
                    <span class="text-muted">&nbsp;/ night</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span class="text-lg font-semibold">4.9</span>
                </div>
            </div>

            {{-- Booking form / calendar --}}
            <div class="grid grid-cols-2">
                <x-form.text placeholder="Check-in date" inputclass="rounded-r-none" />
                <x-form.text placeholder="Check-out date" inputclass="rounded-l-none text-right" />
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var main = new Splide('#main-slider', {
                    type: 'loop',
                    mediaQuery: 'min',
                    rewind: true,
                    pagination: false,
                    arrows: true,
                    isNavigation: true,
                    updateOnMove: true,
                    breakpoints: {
                        786: {
                            padding: '20%',
                            gap: 10,
                        },
                        // 1280: {
                        //     // padding: '20%',
                        //     // gap: '10',
                        // }
                    },
                });

                var thumbnails = new Splide('#thumbnail-slider', {
                    fixedWidth: 150,
                    fixedHeight: 100,
                    gap: 10,
                    padding: 20,
                    rewind: true,
                    pagination: false,
                    updateOnMove: true,
                    arrows: false,
                    focus: 'right',
                    isNavigation: true,
                    breakpoints: {
                        600: {
                            fixedWidth: 80,
                            fixedHeight: 55,
                        },
                    },
                });

                main.sync(thumbnails);
                main.mount();
                thumbnails.mount();
            });
        </script>
    @endpush
</div>
