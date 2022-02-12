<div> {{-- FULL PAGE COMPONENT - DONT USE LAYOUT --}}
    <div class="lg:grid-cols-3 md:gap-10 relative grid items-start grid-cols-1 gap-5" wire:init="load">

        <!-- Left column -->
        <div class="lg:col-span-2 space-y-5">
            {{-- Images --}}
            <div class="panel" wire:ignore>
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
            <div class="panel space-y-5">
                <x-heading heading="About {{ $property->name ?? '' }}" />
                <div class="gap-x-3 gap-y-2 flex flex-wrap text-xs font-semibold uppercase">
                    <span class="bg-muted-lightest text-muted-darkest px-2 py-1 rounded-lg">2 guests</span>
                    <span class="bg-muted-lightest text-muted-darkest px-2 py-1 rounded-lg">2 bedrooms</span>
                    <span class="bg-muted-lightest text-muted-darkest px-2 py-1 rounded-lg">2 beds</span>
                    <span class="bg-muted-lightest text-muted-darkest px-2 py-1 rounded-lg">2 bathrooms</span>
                </div>
                <div class="space-y-5">
                    <h3 class="mb-2 text-lg font-semibold leading-6">{{ $property->title ?? '' }}</h3>
                    <p>{{ $property->description ?? '' }}</p>
                </div>
            </div>
        </div>

        <!-- Right column -->
        {{-- <div class="panel top-5 sticky flex flex-col order-1 md:order-2 space-y-5 md:w-[320px] z-10"> --}}
        <div class="contain md:top-10 md:sticky bottom-0 z-10 w-full">
            <div class="panel flex flex-col order-1 md:order-2 space-y-5 md:w-[320px] z-10" x-data="{datesSelected:false}" @showconfirmation.window="datesSelected = true" @hideconfirmation.window="datesSelected = false">
                {{-- Nightly rate and star rate --}}
                <div>
                    <div class="flex justify-between">
                        <div class="flex items-baseline">
                            <span class="text-xl font-semibold">${{ number_format($property->nightlyRate ?? 0, 2) }}</span>
                            <span class="text-muted">&nbsp;/ night</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="text-lg font-semibold">4.9</span>
                        </div>
                    </div>
                    {{-- <div x-show="datesSelected" x-cloak class="flex flex-col hidden space-y-5">

                        <div class="flex justify-between">
                            <div class="flex flex-col">
                                <span class="text-muted text-sm">Check in</span>
                                <span class="text-xl">{{ Carbon\Carbon::parse($checkin)->format('M jS') }}</span>
                            </div>
                            <div class="flex flex-col text-right">
                                <span class="text-muted text-sm">Check out</span>
                                <span class="text-xl">{{ Carbon\Carbon::parse($checkout)->format('M jS') }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="flex flex-col space-y-2">
                            <div class="text-muted-dark flex items-baseline justify-between">
                                <span>${{ number_format($property->nightlyRate ?? 0, 2) }} x {{ $nights ?? 0 }}</span>
                                <span>${{ number_format($nightlyRate ?? 0, 2) }}</span>
                            </div>
                            @if ($fees)
                                @foreach ($fees as $fee)
                                    <div class="text-muted-dark flex items-baseline justify-between">
                                        <span>{{ $fee['name'] }}</span>
                                        <span>${{ number_format($fee['amount'], 2) }}</span>
                                    </div>
                                @endforeach
                            @endif
                            @if ($tax)
                                <div class="text-muted-dark flex items-baseline justify-between">
                                    <span>Tax</span>
                                    <span>${{ number_format($tax, 2) }}</span>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="flex items-baseline justify-between mb-5 text-lg font-semibold">
                            <span>Total</span>
                            <span>${{ number_format($totalCost ?? 0, 2) }}</span>
                        </div>
                        <div>
                            <x-form.button wire:click="submit">Continue</x-form.button>
                            <x-form.button color="link" wire:click="clearDates">Change dates</x-form.button>
                        </div>
                    </div> --}}
                </div>



                {{-- Booking form / calendar --}}
                <div class="" wire:ignore>
                    <input type="text" id="dates" class="sr-only">
                    <div class=" bg-muted-lightest text-muted-dark flex items-center justify-center p-3 space-x-2 text-xs rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            <polyline points="11 12 12 12 12 16 13 16"></polyline>
                        </svg>
                        <span>
                            Please note: there is a 3 night minimum
                        </span>
                    </div>
                    <div id="calendar" class="w-full h-full"></div>
                </div>
                <div x-show="datesSelected" x-cloak class="flex flex-col space-y-5">
                    <div class="flex justify-between">
                        <div class="flex flex-col">
                            <span class="text-muted text-sm">Check in</span>
                            <span class="text-xl">{{ Carbon\Carbon::parse($checkin)->format('M jS') }}</span>
                        </div>
                        <div class="flex flex-col text-right">
                            <span class="text-muted text-sm">Check out</span>
                            <span class="text-xl">{{ Carbon\Carbon::parse($checkout)->format('M jS') }}</span>
                        </div>
                    </div>
                    <x-form.button wire:click="submit">Book {{ $nights }} Nights</x-form.button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{-- <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script> --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" /> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.calendar = new Litepicker({
                    element: document.getElementById('dates'),
                    parentEl: document.getElementById('calendar'),
                    zIndex: 1,
                    singleMode: false,
                    inlineMode: true,
                    minDays: 4,
                    minDate: new Date(),
                    tooltipText: {
                        one: 'night',
                        other: 'nights'
                    },
                    disallowLockDaysInRange: true,
                    lockDays: [

                        ['2022-02-15', '2022-02-19']
                    ],
                    tooltipNumber: (totalDays) => {
                        return totalDays - 1;
                    },
                    setup: (picker) => {
                        picker.on('selected', (date1, date2) => {
                            @this.updateDates([date1.dateInstance, date2.dateInstance])
                        });
                        picker.on('error:range', (b) => {
                            calendar.clearSelection()
                            @this.clearDates()
                            Toast.danger('You\'ve selected dates that are already booked.')
                        });
                    },

                })
                // window.addEventListener('clearcalendardates', event => {
                //     calendar.clearSelection();
                // })
            });
        </script>
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
