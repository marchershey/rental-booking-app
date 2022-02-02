<div wire:init="load">
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
                @if ($trip)
                    <div wire:loading.remove wire:target="load">
                        <div class="grid w-full grid-cols-5 gap-5 mb-5">
                            <div class="col-span-2">
                                <img class="rounded-lg" src="/storage/{{ $trip->property->photos->first()->path }}" alt="">
                            </div>
                            <div class="flex flex-col justify-between col-span-3">
                                <div class="">
                                    <p class="text-muted text-xs leading-3 uppercase">{{ $trip->property->type }}</p>
                                    <h1 class="line-clamp-2 text-xl font-semibold leading-6">{{ $trip->property->listing_headline }}</h1>
                                </div>



                                <div class="flex items-center gap-3">
                                    <div class="whitespace-nowrap flex items-center gap-1">
                                        <span class="text-primary font-medium">{{ $trip->property->listing_rating }}</span>
                                        <span class="text-muted text-xs">({{ $trip->property->listing_rating_count }})</span>
                                    </div>
                                    <div class="text-muted">&bullet;</div>
                                    <div class="truncate">
                                        <p class="text-muted text-xs truncate">Mount Washington, KY</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
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

        <div class="lg:order-first col-span-4">
            <x-base.div-box>
                <div class="flex flex-col gap-6" x-data="{showCreditCardField: @entangle('showCreditCardField')}">
                    <div class="text-center">
                        <span class="text-muted text-xs uppercase">Step 3 of 3</span>
                        <h1 class="text-2xl font-bold uppercase">Confirm and pay</h1>
                    </div>
                    <hr>
                    <div class="flex flex-col gap-3">
                        <div>
                            <h2 class="text-xl font-medium">Billing Details</h2>
                            <p class="text-muted text-xs">Enter your billings details below.</p>
                        </div>
                        <div x-show="!showCreditCardField">
                            <form wire:submit.prevent="saveUserBillingInfo">
                                <div class="md:grid-cols-12 grid grid-cols-1 gap-3">
                                    <x-form.text-field wireId="email" title="Email Address" placeholder="email@domain.com" disabled class="md:col-span-12" />
                                    <x-form.text-field wireId="first_name" title="First name" placeholder="John" disabled class="md:col-span-4" />
                                    <x-form.text-field wireId="last_name" title="Last name" placeholder="Smith" disabled class="md:col-span-4" />
                                    <x-form.text-field wireId="phone" title="Phone Number" placeholder="555-555-5555" class="md:col-span-4" inputClass="mask-phone" />
                                    <x-form.text-field wireId="address" title="Street Address" placeholder="1600 Pennsylvania Avenue" class="md:col-span-10" />
                                    <x-form.text-field wireId="unit" title="Unit" placeholder="1A" class="md:col-span-2" />
                                    <x-form.text-field wireId="city" title="City" placeholder="Washington" class="md:col-span-5" />
                                    <x-form.dropdown wireId="state" title="State" placeholder="Select a state..." default="AK" class="md:col-span-4" :options="['AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming']" />
                                    <x-form.text-field wireId="zip" title="Zip" placeholder="20500" class="md:col-span-3" inputClass="mask-zip" />
                                    <div class="col-span-full">
                                        <button type="submit" class="bg-primary hover:bg-primary-darker w-full px-2 py-3 font-bold text-white rounded">Continue</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <script>
                            window.maskPhoneNumbers();
                            window.maskZipCodes();
                        </script>

                        <div x-show="showCreditCardField" x-cloak>
                            <div wire:ignore>
                                <div class="md:col-span-1 w-full col-span-2">
                                    <div class="flex items-center justify-between">
                                        <label class="block font-medium">City</label>
                                    </div>
                                    <div class="mt-1">
                                        <div id="card-element" class="px-2 py-3 text-base bg-white border border-gray-200 rounded"></div>
                                    </div>
                                </div>
                                <button id="card-button">
                                    Process Payment
                                </button>
                            </div>

                            <script>
                                const stripe = Stripe("{{ env('STRIPE_KEY') }}");

                                const elements = stripe.elements();
                                const cardElement = elements.create('card');

                                cardElement.mount('#card-element');

                                const cardHolderName = document.getElementById('card-holder-name');
                                const cardButton = document.getElementById('card-button');

                                cardButton.addEventListener('click', async (e) => {
                                    const {
                                        paymentMethod,
                                        error
                                    } = await stripe.createPaymentMethod(
                                        'card', cardElement, {
                                            billing_details: {
                                                name: "@js($user->fullName())"
                                            }
                                        }
                                    );

                                    if (error) {
                                        console.log(error);
                                        Toast.danger(error.message)
                                    } else {
                                        @this.processPayment(paymentMethod);
                                    }
                                });
                            </script>

                        </div>



                    </div>
                </div>
            </x-base.div-box>
        </div>

        {{-- <div class="lg:order-first hidden col-span-4">
            <x-base.div-box>
                @if ($trip)
                    <div class="flex flex-col gap-10">
                        <div class="text-center">
                            <span class="text-muted text-xs uppercase">Step 3 of 3</span>
                            <h1 class="text-2xl font-bold uppercase">Confirm and pay</h1>
                        </div>
                        <hr>
                        <div class="">
                            <h3 class="mb-3 text-lg font-medium">Contact Information</h3>
                            <dl class="grid grid-cols-2 gap-3">
                                <div>
                                    <dt class="">
                                        Name
                                    </dt>
                                    <dd class="text-muted mt-1">
                                        {{ $trip->user->fullName() }}
                                    </dd>
                                </div>
                                <div>
                                    <dt class="">
                                        Email
                                    </dt>
                                    <dd class="text-muted mt-1">
                                        {{ $trip->user->email }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="">
                            <h3 class="mb-3 text-lg font-medium">Trip Information</h3>
                            <dl class="grid grid-cols-2 gap-3">
                                <div>
                                    <dt class="">
                                        Check in Date
                                    </dt>
                                    <dd class="text-muted mt-1">
                                        {{ Carbon\Carbon::parse($trip->check_in_date)->format('F jS') }} at 4pm
                                    </dd>
                                </div>
                                <div>
                                    <dt class="">
                                        Check out date
                                    </dt>
                                    <dd class="text-muted mt-1">
                                        {{ Carbon\Carbon::parse($trip->check_out_date)->format('F jS') }} at 11am
                                    </dd>
                                </div>
                            </dl>
                        </div>


                        <div>
                            <input id="card-holder-name" type="text">

                            <!-- Stripe Elements Placeholder -->
                            <div id="card-element"></div>

                            <button id="card-button">
                                Process Payment
                            </button>
                        </div>

                        <script>
                            const stripe = Stripe('{{ env('STRIPE_KEY') }}');

                            const elements = stripe.elements();
                            const cardElement = elements.create('card');

                            cardElement.mount('#card-element');

                            const cardHolderName = document.getElementById('card-holder-name');
                            const cardButton = document.getElementById('card-button');

                            cardButton.addEventListener('click', async (e) => {
                                const {
                                    paymentMethod,
                                    error
                                } = await stripe.createPaymentMethod(
                                    'card', cardElement, {
                                        billing_details: {
                                            name: cardHolderName.value
                                        }
                                    }
                                );

                                if (error) {
                                    // Display "error.message" to the user...
                                    console.log(error);
                                } else {
                                    console.log(paymentMethod);
                                    @this.processPayment(paymentMethod);
                                    // The card has been verified successfully...
                                }
                            });
                        </script>
                @endif
            </x-base.div-box>
        </div> --}}
    </div>
</div>

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
