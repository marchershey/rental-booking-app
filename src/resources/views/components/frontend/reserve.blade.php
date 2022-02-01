<div wire:init="load" class="contain">

    <div class="lg:grid-cols-7 lg:gap-5 md:mt-0 grid grid-cols-1 -mt-5">

        <div class="lg:order-last col-span-3 mb-5">
            <x-base.div-box>

                {{-- Loading --}}
                <div wire:loading wire:target="load" class="w-full">
                    <div class="animate-pulse grid grid-cols-5 gap-5">
                        <div class="w-full h-20 col-span-2 bg-gray-300 rounded"></div>
                        <div class="w-full col-span-3">
                            <div class="w-1/4 h-4 bg-gray-200 rounded"></div>
                            <div class="w-full h-5 mt-2 bg-gray-300 rounded"></div>
                            <div class="w-1/2 h-5 mt-2 bg-gray-300 rounded"></div>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                @if ($property)
                    <div wire:loading.remove wire:target="load">
                        <div class="grid w-full grid-cols-5 gap-5 mb-5">
                            <div class="col-span-2">
                                <img class="rounded-lg" src="/storage/{{ $property->photos->first()->path }}" alt="">
                            </div>
                            <div class="flex flex-col justify-between col-span-3">
                                <div class="">
                                    <p class="text-muted text-xs leading-3 uppercase">{{ $property->type }}</p>
                                    <h1 class="line-clamp-2 text-xl font-semibold leading-6">{{ $property->listing_headline }}</h1>
                                </div>



                                <div class="flex items-center gap-3">
                                    <div class="whitespace-nowrap flex items-center gap-1">
                                        <span class="text-primary font-medium">{{ $property->listing_rating }}</span>
                                        <span class="text-muted text-xs">({{ $property->listing_rating_count }})</span>
                                    </div>
                                    <div class="text-muted">&bullet;</div>
                                    <div class="truncate">
                                        <p class="text-muted text-xs truncate">Mount Washington, KY</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-center p-3 text-xs bg-gray-100 rounded-lg">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-gray-500">Complete the reservation steps to calculate prices</p>
                            </div>
                        </div>

                        <div class="hidden">
                            <dl class="md:text-base text-sm divide-y divide-gray-100">

                                <div class="flex justify-between py-2">
                                    <dt class="font-medium">$389 x 4 nights</dt>
                                    <dd class="text-muted">$1,200.00</dd>
                                </div>
                                <div class="flex justify-between py-2">
                                    <dt class="font-medium">Cleaning Fee</dt>
                                    <dd class="text-muted">$175.00</dd>
                                </div>
                                <div class="flex justify-between py-2">
                                    <dt class="font-medium">Service Fee</dt>
                                    <dd class="text-muted">$25.00</dd>
                                </div>
                                <div x-data="{show: false}">
                                    <div class="flex justify-between pt-2" x-on:click="show = !show">
                                        <dt class="font-medium">
                                            <div class="flex items-center">
                                                <span>Tax</span>
                                                <svg class="text-muted w-4 h-4 mt-px ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        </dt>
                                        <dd class="text-muted">$200.00</dd>
                                    </div>
                                    <div class="p-3 mt-2 text-gray-600 bg-gray-200 rounded" x-show="show" x-cloak x-transition>
                                        <p class="mb-2 text-sm font-semibold">State - Kentucky</p>
                                        <div class="space-y-1 text-xs">
                                            <div class="flex justify-between">
                                                <dt class="">Lodging Tax</dt>
                                                <dd class="text-muted">$113.80</dd>
                                            </div>
                                            <div class="flex justify-between">
                                                <dt class="">Accommodations Tax</dt>
                                                <dd class="text-muted">$16.91</dd>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </dl>
                        </div>
                    </div>
                @endif
            </x-base.div-box>
        </div>

        <div class="lg:order-first col-span-4" x-data="reservation()">
            <x-base.div-box>
                <div class="flex flex-col gap-6">

                    {{-- Loading --}}
                    <div wire:loading wire:target="load, auth, submit" class="w-full">
                        <div class="animate-pulse flex flex-col gap-10 mb-3">
                            <div class="flex flex-col gap-2">
                                <div class="w-1/6 h-3 mx-auto bg-gray-200 rounded"></div>
                                <div class="w-2/3 h-6 mx-auto bg-gray-300 rounded"></div>
                                <hr class="mt-6">
                            </div>

                            <div class="flex flex-col gap-2">
                                <div class="w-1/2 h-4 bg-gray-200 rounded"></div>
                                <div class="w-full h-8 bg-gray-300 rounded"></div>
                                <div class="w-3/4 h-3 bg-gray-100 rounded"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div wire:loading.remove wire:target="load, auth, submit" x-cloak>
                        <form wire:submit.prevent="submit">
                            <div class="flex flex-col gap-10">

                                {{-- auth --}}
                                <div x-show="step == 'auth'" x-cloak>
                                    <div class="flex flex-col gap-6">
                                        <div class="text-center">
                                            <span class="text-muted text-xs uppercase">Step 1 of 3</span>
                                            <h1 class="text-2xl font-bold uppercase">BEGIN YOUR RESERVATION</h1>
                                        </div>
                                        <hr>
                                        <x-form.text-field wireId="email" title="Email Address" desc="We'll email you trip confirmations and receipts" placeholder="jsmith82@gmail.com" />
                                    </div>
                                </div>

                                {{-- signin --}}
                                <div x-show="step == 'signin'" x-cloak>
                                    <div class="flex flex-col gap-6">
                                        <div class="text-center">
                                            <span class="text-muted text-xs uppercase">Step 1 of 3</span>
                                            <h1 class="text-2xl font-bold uppercase">Sign into your account</h1>
                                        </div>
                                        <hr>
                                        <div class="flex flex-col gap-3">
                                            <div>
                                                <span class="font-medium">Email Address</span>
                                                <span class="text-xs cursor-pointer">(<a href="#" x-on:click="$wire.resetReservation()" class="text-primary">edit</a>)</span>
                                                <span class="block w-full px-3 py-2 mt-1 bg-gray-100 border border-gray-200 rounded">{{ $email }}</span>
                                            </div>
                                            <x-form.text-field inputType="password" wireId="password" title="Password" placeholder="••••••••••" />
                                        </div>
                                    </div>
                                </div>

                                {{-- register --}}
                                <div x-show="step == 'register'" x-cloak>
                                    <div class="flex flex-col gap-6 text-left">
                                        <div class="text-center">
                                            <span class="text-muted text-xs uppercase">Step 1 of 3</span>
                                            <h1 class="text-2xl font-bold uppercase">Create your account</h1>
                                        </div>
                                        <hr>
                                        <div>
                                            <span class="font-medium">Email Address</span>
                                            <span class="text-xs cursor-pointer">(<a href="#" x-on:click="$wire.resetReservation()" class="text-primary">edit</a>)</span>
                                            <span class="block w-full px-3 py-2 mt-1 bg-gray-100 border border-gray-200 rounded">{{ $email }}</span>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <x-form.text-field wireId="first_name" title="First Name" placeholder="John" />
                                            <x-form.text-field wireId="last_name" title="Last Name" placeholder="Smith" />
                                            <div class="text-muted col-span-2 -mt-2 text-xs tracking-wide">
                                                <p>Make sure it matches the name on your government ID.</p>
                                            </div>
                                            <div class="col-span-2">
                                                <x-form.text-field inputType="date" wireId="birthdate" title="Birthdate" desc="Your birthdate is used to verify you age and will not be shared with any third parties." placeholder="mm/dd/yyy" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="flex flex-col gap-3">
                                            <x-form.text-field inputType="password" wireId="password" title="Password" desc="Passwords must be a minimum of six characters and contain at least one number" placeholder="••••••••••" />
                                            <x-form.text-field inputType="password" wireId="password_confirmation" title="Retype Password" desc="Retype your password one more time to verify" placeholder="••••••••••" />
                                        </div>
                                    </div>
                                </div>

                                {{-- dates --}}
                                <div x-show="step == 'trip'" x-cloak>
                                    <div class="flex flex-col gap-6 text-left">
                                        <div class="text-center">
                                            <span class="text-muted text-xs uppercase">Step 2 of 3</span>
                                            <h1 class="text-2xl font-bold uppercase">Let's Plan your trip</h1>
                                        </div>
                                        <hr>
                                        <div>
                                            <div class="hover:shadow-xl bg-gray-50 hover:bg-white border border-gray-300 rounded">
                                                <div class="grid grid-cols-2 divide-x divide-gray-300">
                                                    <label for="check_in_date" class="flex flex-col px-3 py-2 cursor-pointer">
                                                        <span class="text-muted text-xs uppercase">Check-in</span>
                                                        <input wire:ignore id="check_in_date" class="flatpickr focus:ring-0 md:text-lg p-0 bg-transparent border-0 cursor-pointer" type="text" placeholder="Select check-in..." readonly="readonly">
                                                    </label>
                                                    <label for="check_out_date" class="flex flex-col px-3 py-2 text-right cursor-pointer">
                                                        <span class="text-muted text-xs uppercase">Check-out</span>
                                                        <input wire:ignore id="check_out_date" class="focus:ring-0 md:text-lg p-0 text-right bg-transparent border-0 cursor-pointer" type="text" placeholder="" readonly="readonly" tabindex="-1">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="button" class="text-primary text-xs">reset</button>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-3">
                                            <x-form.ticker wireId="adults" title="Adults" desc="Ages 13 years and older" default="2" min="1" />
                                            <x-form.ticker wireId="children" title="Children" desc="Ages 12 years and younger" default="2" min="0" />
                                        </div>
                                    </div>
                                    <script>
                                        window.calendar = flatpickr("#check_in_date", {
                                            mode: "range",
                                            // minDate: "today",
                                            dateFormat: 'F J', // format of dates visible to user
                                            altFormat: 'MMM', // format of dates sent to server
                                            monthSelectorType: 'static',
                                            onValueUpdate: function(selectedDates, dateStr, instance) {
                                                @this.updateDates(selectedDates)
                                            },
                                            "plugins": [new rangePlugin({
                                                input: "#check_out_date"
                                            })]
                                        });
                                    </script>
                                </div>

                                <div>
                                    <button type="submit" class="bg-primary hover:bg-primary-darker w-full py-3 font-bold text-center text-white rounded">Continue</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </x-base.div-box>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('reservation', () => ({
                step: @entangle('step'),
                reset() {
                    calendar.clear()
                },
            }))
        })
    </script>
</div>
