<div>
    <div class="lg:grid-cols-3 lg:space-y-0 lg:space-x-5 grid grid-cols-1 space-y-5" wire:init="load">

        @if ($property)
            <!-- Left column -->
            <div class="lg:col-span-2 space-y-5">
                {{-- Images --}}
                <div class="panel">
                    <div class="space-y-3" wire:ignore>
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

            {{-- Right column --}}
            <div>
                <div class="panel z-10 flex flex-col" x-data="{showCalendar:@entangle('showCalendar'), showLoginForm:@entangle('showLoginForm'), showSignupForm:@entangle('showSignupForm')}">
                    {{-- Calendar --}}
                    <div wire:ignore x-show="showCalendar" x-cloak class="mb-5">
                        <div class="flex justify-between">
                            <div class="flex items-baseline">
                                <span class="text-xl font-semibold">${{ number_format($property->nightlyRate ?? 0, 2) }}</span>
                                <span class="text-muted">&nbsp;/ night</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg class="w-6 h-6 -mt-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="text-lg font-semibold">4.9</span>
                            </div>
                        </div>
                        <input type="text" id="dates" class="sr-only">
                        <div id="calendar" class="w-full h-full"></div>
                        <x-form.button class="mb-5" wire:click="checkAvailabilty">Check Availability</x-form.button>
                        <div class=" bg-muted-lightest text-muted-dark flex items-center p-3 space-x-2 text-xs rounded">
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
                    </div>
                    <div x-show="!showCalendar" x-cloak class="space-y-5">
                        {{-- Dates --}}
                        <div class="flex justify-between">
                            <div class="flex flex-col">
                                <span class="text-muted text-sm">Check in</span>
                                <span class="text-xl font-semibold">{{ Carbon\Carbon::parse($checkin)->format('M jS') }}</span>
                            </div>
                            <div class="flex flex-col text-right">
                                <span class="text-muted text-sm">Check out</span>
                                <span class="text-xl font-semibold">{{ Carbon\Carbon::parse($checkout)->format('M jS') }}</span>
                            </div>
                        </div>
                        {{-- Auth --}}
                        <div>
                            @auth
                                <x-form.button wire:click="submit">Book {{ $nights }} Nights</x-form.button>
                            @else
                                <form wire:submit.prevent="{{ $authType }}" class="space-y-3" autocomplete="off">
                                    <div class="text-lg font-semibold text-center">Log in or sign up to reserve</div>
                                    <x-form.text wireid="email" label="Email Address" placeholder="Email Address" />
                                    <div x-show="showLoginForm" x-cloak>
                                        <x-form.text wireid="password" inputtype="password" label="Password" placeholder="Password" />
                                    </div>
                                    <div x-show="showSignupForm" x-cloak class="space-y-3">
                                        <x-form.text wireid="name" label="Full Name" inputclass="capitalize" placeholder="First and last name" />
                                        <x-form.text wireid="password" inputtype="password" label="Password" placeholder="Password" />
                                        <x-form.text wireid="password_confirmation" inputtype="password" label="Confirm Password" placeholder="Retype your password" />
                                    </div>

                                    <x-form.button type="submit">Continue</x-form.button>
                                </form>
                            @endauth
                        </div>
                        {{-- Prices Breakdown --}}
                        <div class="flex flex-col space-y-5">
                            <hr>
                            <div class="text-muted text-sm">
                                <div class="flex justify-between">
                                    <span>${{ number_format($property->nightlyRate, 2) }} x {{ $nights }} nights</span>
                                    <span>${{ number_format($nightlyRate, 2) }}</span>
                                </div>
                                @if ($fees)
                                    @foreach ($fees as $fee)
                                        <div class="flex justify-between">
                                            <span>{{ $fee['name'] }}</span>
                                            <span>${{ number_format($fee['amount'], 2) }}</span>
                                        </div>
                                    @endforeach
                                @endif
                                @if ($tax)
                                    <div class="flex justify-between">
                                        <span>Tax</span>
                                        <span>${{ number_format($tax, 2) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="flex items-baseline justify-between mb-5 text-lg font-semibold">
                                <span>Total</span>
                                <span>${{ number_format($totalCost ?? 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else
            {{-- Loading divs --}}
            <div class="lg:col-span-2">
                <div class="animate-pulse space-y-5">
                    <div class="bg-muted w-full h-[320px] md:h-[435px] rounded-lg"></div>
                    <div class="panel">
                        <div class="bg-muted w-[200px] h-[27px] rounded"></div>
                        <hr class="mt-3 -mx-5">
                        <div class="flex mt-3 space-x-5">
                            <div class="bg-muted w-[73px] h-[24px] rounded"></div>
                            <div class="bg-muted w-[93px] h-[24px] rounded"></div>
                            <div class="bg-muted w-[73px] h-[24px] rounded"></div>
                            <div class="bg-muted w-[83px] h-[24px] rounded"></div>
                        </div>
                        <div class="bg-muted mt-5 w-3/4 h-[24px] rounded"></div>
                        <div class="flex flex-col mt-5 space-y-2">
                            <div class="bg-muted w-full h-4 rounded"></div>
                            <div class="bg-muted w-3/5 h-4 rounded"></div>
                            <div class="bg-muted w-4/5 h-4 rounded"></div>
                            <div class="bg-muted w-2/5 h-4 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="panel animate-pulse">
                    <div class="bg-muted w-3/4 h-6 rounded"></div>
                    <div class="bg-muted mt-5 w-full h-[330px] rounded"></div>
                </div>
            </div>
        @endif
    </div>

    {{-- @push('outside')
        <div class="lg:hidden fixed bottom-0 w-full bg-white">
            <div class="flex items-center justify-between p-5">
                <div class="flex items-baseline">
                    <span class="text-xl font-semibold">${{ number_format($property->nightlyRate ?? 0, 2) }}</span>
                    <span class="text-muted">&nbsp;/ night</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-6 h-6 -mt-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span class="text-lg font-semibold">4.9</span>
                </div>
            </div>
        </div>
    @endpush --}}

    @push('scripts')

        {{-- Calendar --}}
        <script>
            window.addEventListener('calendarLoad', event => {
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
                        // ['2022-02-15', '2022-02-19']
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

                });
            })
        </script>

        {{-- Photo Slider --}}
        <script>
            window.addEventListener('sliderLoad', event => {
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
