<div wire:init="load" class="contain">

    @section('navbar', true)

    <div class="lg:grid-cols-7 lg:gap-5 md:mt-0 grid grid-cols-1 -mt-5">

        <div class="lg:order-last col-span-3 mb-5">
            <x-base.div-box>

                {{-- Loading --}}
                <div wire:loading wire:target="load" class="w-full">
                    <div class="flex items-center justify-center">
                        <svg class="animate-spin w-12 h-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="text-gray-200" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="text-gray-300" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
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
                            <div class="flex items-center p-3 text-xs text-gray-500 bg-gray-100 rounded-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p>Complete the booking steps to calculate prices</p>
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

                {{-- Loading --}}
                <div wire:loading wire:target="load, auth" class="w-full">
                    <div class="flex flex-col gap-10">
                        <div class="animate-pulse flex flex-col gap-2">
                            <div class="w-1/3 h-4 bg-gray-200"></div>
                            <div class="w-2/3 h-6 bg-gray-300"></div>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div wire:loading.remove wire:target="load, auth">
                    <div class="flex flex-col gap-5">

                        {{-- auth --}}
                        <template x-if="step == 'auth'">
                            <div class="flex flex-col gap-5">
                                <div>
                                    <span class="text-muted text-xs uppercase">Step 1 of 3</span>
                                    <h1 class="text-xl font-semibold">Begin your reservation</h1>
                                </div>
                                <x-form.text-field alpineId="email" title="Email Address" desc="We'll email you trip confirmations and receipts" placeholder="jsmith82@gmail.com" />
                            </div>
                        </template>

                        {{-- login --}}
                        <template x-if="step == 'login'">
                            <div class="flex flex-col gap-5">
                                <div>
                                    <span class="text-muted text-xs uppercase">Step 1 of 3</span>
                                    <h1 class="text-xl font-semibold">Sign into your account</h1>
                                </div>
                                <x-form.text-field alpineId="email" title="Email Address" placeholder="jsmith82@gmail.com" />
                            </div>
                        </template>

                        {{-- register --}}
                        <template x-if="step == 'register'">
                            <div class="flex flex-col gap-5 text-left">
                                <div>
                                    <span class="text-muted text-xs uppercase">Step 1 of 3</span>
                                    <h1 class="text-xl font-semibold">Let's create your profile</h1>
                                </div>
                                <p>
                                    <span class="block font-medium">Email Address:</span>
                                    <span class="text-muted">{{ $email }}</span>
                                    <span class="text-xs cursor-pointer">(<a href="#" x-on:click="$wire.resetReservation()" class="text-primary">edit</a>)</span>
                                </p>
                                <div class="grid grid-cols-2 gap-3">
                                    <x-form.text-field alpineId="first_name" title="First Name" placeholder="John" />
                                    <x-form.text-field alpineId="last_name" title="Last Name" placeholder="Smith" />
                                    <div class="text-muted col-span-2 -mt-2 text-xs tracking-wide">
                                        <p>Make sure it matches the name on your government ID.</p>
                                    </div>
                                </div>
                                <x-form.text-field inputType="date" alpineId="birthday" title="Birthdate" desc="Your birthdate is used to verify you age and will not be shared with any third parties." placeholder="mm/dd/yyy" />
                            </div>
                        </template>


                        <button wire:click="{{ $step }}" type="button" class="bg-primary hover:bg-primary-darker w-full py-3 font-bold text-center text-white rounded">Continue</button>
                    </div>
                </div>

            </x-base.div-box>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('reservation', () => ({
                step: @entangle('step'),
                email: @entangle('email'),
                first_name: @entangle('first_name'),
                last_name: @entangle('last_name'),
                birthdate: @entangle('birthdate'),
            }))
        })
    </script>

</div>
