<div>
    <div class="lg:grid-cols-3 md:gap-10 relative grid items-start grid-cols-1 gap-5" wire:init="load">
        @if ($reservation)
            <div class="lg:col-span-2 space-y-5">
                <div class="panel space-y-5">
                    <x-heading heading="Billing Information" />
                    <div class="md:grid-cols-2 grid grid-cols-1 gap-5">
                        <x-form.text wireid="name" label="Full Name" />
                        <x-form.text wireid="phone" label="Phone Number" />
                    </div>
                    <div class="md:grid-cols-3 grid grid-cols-2 gap-5">
                        <x-form.text wireid="address" label="Address" class="md:col-span-2 col-span-2" />
                        <x-form.text wireid="unit" optional label="Unit" class="md:col-span-1 col-span-1" />
                        <x-form.text wireid="city" label="City" class="md:col-span-1 col-span-2" />
                        <x-form.select wireid="state" label="State" :options="['AK' => 'Alaska', 'AL' => 'Alabama', 'AR' => 'Arkansas', 'AS' => 'American Samoa', 'AZ' => 'Arizona', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DC' => 'District of Columbia', 'DE' => 'Delaware', 'FL' => 'Florida', 'GA' => 'Georgia', 'GU' => 'Guam', 'HI' => 'Hawaii', 'IA' => 'Iowa', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'MA' => 'Massachusetts', 'MD' => 'Maryland', 'ME' => 'Maine', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MO' => 'Missouri', 'MS' => 'Mississippi', 'MT' => 'Montana', 'NC' => 'North Carolina', 'ND' => ' North Dakota', 'NE' => 'Nebraska', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NV' => 'Nevada', 'NY' => 'New York', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'PR' => 'Puerto Rico', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VA' => 'Virginia', 'VI' => 'Virgin Islands', 'VT' => 'Vermont', 'WA' => 'Washington', 'WI' => 'Wisconsin', 'WV' => 'West Virginia', 'WY' => 'Wyoming']" />
                        <x-form.text wireid="zip" label="Zip" />
                    </div>
                    <x-heading heading="Card Information" />
                    <div wire:ignore id="card-element" class="bg-muted-lightest px-2 py-3 rounded-md"></div>
                    <div class="p-5 text-xs text-yellow-800 bg-yellow-100 rounded-lg">
                        By pressing the <span class="font-bold">Book Now</span> button, you authorize us
                        to place a temporary hold on your card for the amount of <span class="font-bold">${{ number_format($totalCost, 2) }}</span>.
                        Once your reservation is approved by one of the staff members (which may take up to 24 hours), then the hold will be released. If your
                        reservation isn't approved or if your reservation is rejected within the next 7 days, your funds will be released backed to you immediately.
                    </div>
                </div>
            </div>

            {{-- Right column --}}
            <div>
                <div class="panel z-10 flex flex-col opacity-100" x-data="{showCalendar:@entangle('showCalendar')}">
                    <div class="flex flex-col" wire:loading.class="bg-gray" wire:target="updateDates">
                        {{-- Dates --}}
                        <div class="flex justify-between">
                            <div class="flex flex-col">
                                <span class="text-muted text-sm">Check in</span>
                                <span class="text-xl font-semibold">{{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }}</span>
                            </div>
                            <div class="flex flex-col text-right">
                                <span class="text-muted text-sm">Check out</span>
                                <span class="text-xl font-semibold">{{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}</span>
                            </div>
                        </div>
                        {{-- Buttons --}}
                        <div class="mb-5">
                            <x-form.button wire:click="showCalendar" color="link">Change dates</x-form.button>
                            <x-form.button wire:click="submit">Book Now</x-form.button>
                            <div class="text-muted mt-2 mb-5 text-xs">
                                By pressing the <span class="font-bold">Book Now</span> button, you agree to our <span class="text-primary">Terms of Service</span>, <span class="text-primary">Cancellation Policy</span> as well as our <span class="text-primary">Privacy Policy</span>.
                            </div>
                            <hr>
                        </div>
                        {{-- Calendar --}}
                        <div wire:ignore x-show="showCalendar" x-cloak>
                            <input type="text" id="dates" class="sr-only">
                            <div id="calendar" class="w-full h-full"></div>
                            <hr>
                        </div>
                        {{-- Prices Breakdown --}}
                        <div class="text-muted mb-5 text-sm">
                            <div class="flex justify-between">
                                <span>${{ number_format($reservation->property->nightlyRate, 2) }} x {{ $reservation->nights }} nights</span>
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
                        <div class="flex items-baseline justify-between text-lg font-semibold">
                            <span>Total</span>
                            <span>${{ number_format($totalCost ?? 0, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Loading divs --}}
            <div class="lg:col-span-2">
                <div class="animate-pulse space-y-5">
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
                    startDate: @this.checkin,
                    endDate: @this.checkout,
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

            window.addEventListener('calendarDestroy', event => {
                calendar.destroy();
            })
        </script>

        {{-- Stripe --}}
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            window.addEventListener('stripeSetupCardElement', event => {
                window.stripe = Stripe('{{ env('STRIPE_KEY') }}');
                window.elements = stripe.elements();
                window.cardElement = elements.create('card');
                cardElement.mount('#card-element');
            });

            window.addEventListener('submitStripe', async (event) => {
                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    @this.stripeClientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: @this.name,
                                email: @this.email,
                                phone: @this.phone,
                                address: {
                                    line1: @this.address,
                                    line2: @this.unit,
                                    city: @this.city,
                                    state: @this.state,
                                    postal_code: @this.zip,
                                }

                            }
                        }
                    }
                );

                if (error) {
                    Toast.danger(error.message).push()
                } else {
                    @this.savePaymentMethod(setupIntent);
                }
            });
        </script>
    @endpush
</div>
