<div x-data="app()" x-init="initCalendar()">

    <div class="fixed bottom-0 w-full">
        <div class="w-full p-5 mx-auto">
            <button x-on:click="startReservation($dispatch)" class="button big">
                Reserve Dates
            </button>
        </div>
    </div>

    <x-popup>
        {{-- header --}}
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <div class="text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" x-on:click="$dispatch('hidepopup')">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <button class="text-sm" x-on:click="reset()">
                        Clear dates
                    </button>
                </div>
            </div>
        </x-slot>

        {{-- popup content --}}
        <div class="flex flex-col space-y-5">

            {{-- titles --}}
            <div>
                <div class="flex items-center">
                    <h1 class="text-xl font-bold" x-text="title" wire:loading.remove wire:target="updateDates"></h1>
                    <div class="w-2/3 h-6 my-0 mb-2 bg-gray-200 rounded" wire:loading wire:target="updateDates"></div>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-muted" x-text="subtitle" wire:loading.remove wire:target="updateDates"></p>
                    <div class="w-5/6 h-4 my-0 bg-gray-200 rounded" wire:loading wire:target="updateDates"></div>
                </div>
            </div>

            {{-- stay dates & calendar --}}
            <div>
                <div class="flex px-3 py-1 border border-gray-300 rounded-md shadow-sm" x-on:click="calendarVisible = !calendarVisible">
                    <div>
                        <label for="checkindate" class="block text-xs font-medium text-gray-900 @error('checkinDate') text-red-500 @enderror">Check-in Date</label>
                        <input wire:model="checkinDate" value="" id="checkindate" type="text" class="block w-full p-0 capitalize border-0 focus:ring-0 sm:text-sm focus:outline-none" readonly>
                    </div>
                    <div class="pl-3 border-l border-gray-300">
                        <label for="checkoutdate" class="block text-xs font-medium text-right text-gray-900 @error('checkoutDate') text-red-500 @enderror">Check-out Date</label>
                        <input wire:model="checkoutDate" value="" id="checkoutdate" type="text" class="block w-full p-0 text-right capitalize border-0 focus:ring-0 sm:text-sm focus:outline-none" readonly>
                    </div>
                </div>
                <div class="relative w-full">
                    <div class="absolute w-full" x-on:click.away="calendarVisible = false" x-show="calendarVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
                        <div wire:ignore>
                            <input x-ref="picker" class="hidden" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- user information --}}
            <div class="space-y-3">
                <div class="flex px-3 py-1 border border-gray-300 rounded-md shadow-sm">
                    <div>
                        <label for="firstname" class="block text-xs font-medium text-gray-900 @error('firstName') text-red-500 @enderror">First Name</label>
                        <input wire:model.lazy="firstName" value="" id="firstname" type="text" class="block w-full p-0 capitalize border-0 focus:ring-0 sm:text-sm focus:outline-none " placeholder="John">
                    </div>
                    <div class="pl-3 border-l border-gray-300">
                        <label for="lastname" class="block text-xs font-medium text-right text-gray-900 @error('lastName') text-red-500 @enderror">Last Name</label>
                        <input wire:model.lazy="lastName" value="" id="lastname" type="text" class="block w-full p-0 text-right capitalize border-0 focus:ring-0 sm:text-sm focus:outline-none" placeholder="Smith">
                    </div>
                </div>

                <div class="flex px-3 py-1 border border-gray-300 rounded-md shadow-sm">
                    <div>
                        <label for="birthday" class="block text-xs font-medium text-gray-900 @error('birthdate') text-red-500 @enderror">Birthay</label>
                        <input wire:model.lazy="birthdate" value="" id="birthday" type="text" class="block w-full p-0 capitalize border-0 date-format focus:ring-0 sm:text-sm focus:outline-none" placeholder="01/02/1990">
                    </div>
                    <div class="pl-3 border-l border-gray-300">
                        <label for="phone" class="block text-xs font-medium text-right text-gray-900 @error('phoneNumber') text-red-500 @enderror">Phone Number</label>
                        <input wire:model.lazy="phoneNumber" value="" id="phone" type="text" class="block w-full p-0 text-right capitalize border-0 phone-format focus:ring-0 sm:text-sm focus:outline-none" placeholder="859-555-1273">
                    </div>
                </div>

                <div>
                    <div class="flex px-3 py-1 border border-gray-300 rounded-md shadow-sm">
                        <div class="w-full">
                            <label for="email" class="block text-xs font-medium text-gray-900 @error('emailAddress') text-red-500 @enderror">Email Address</label>
                            <input wire:model.debounce.1s="emailAddress" value="" id="email" type="text" class="block w-full p-0 border-0 focus:ring-0 sm:text-sm focus:outline-none" placeholder="jsmith10@gmail.com">
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-xs text-muted">Your information is never shared with any third parties. We use this information for verification purposes only.</p>
                </div>

            </div>

            <div class="w-full h-24">
                <div>
                    @if($errors->all())

                    <div class="w-full px-5 py-2 mb-5 text-sm text-center text-white bg-red-500 rounded">
                        <span>{{ $errors->first() }}</span>
                    </div>

                    @endif
                </div>

                <div x-show="pricesVisible">
                    <div class="text-sm text-gray-500">
                        <div class="flex items-center justify-between">
                            <div>$299 x {{ $numOfNights }} nights</div>
                            <div>${{ number_format($baseFee * $numOfNights) }}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>Cleaning fee</div>
                            <div>${{ number_format($cleaningFee) }}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>Taxes</div>
                            <div>${{ number_format($taxes)}}</div>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between font-bold">
                            <div>Total</div>
                            <div>${{ number_format($total) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                {{-- user data filled continue button --}}
                <button class="text-white button big disabled:text-gray-400" wire:loading.attr="disabled" x-on:click="submit()" :disabled="!continueButtonEnabled">
                    <span wire:loading.remove wire:target="updateDates, submitUserData" x-text="continueButtonText"></span>
                    <span wire:loading wire:target="updateDates, submitUserData">
                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </x-popup>

</div>

@push('scripts')
<script>
    function app() {
        return {
            // states
            calendarVisible: @entangle('calendarVisible'),
            guestDataVisible: @entangle('guestDataVisible'),
            pricesVisible: @entangle('pricesVisible'),
            continueButtonEnabled: @entangle('continueButtonEnabled'),
            submitType: @entangle('submitType'),
            // vars & strings
            title: @entangle('title'),
            subtitle: @entangle('subtitle'),
            numOfNights: @entangle('numOfNights'),   
            continueButtonText: @entangle('continueButtonText'),

            startReservation($dispatch) {
                $dispatch('showpopup')
            },
            initCalendar() {
                window.calendar = flatpickr(this.$refs.picker, {
                    mode: "range",
                    minDate: 'today',
                    monthSelectorType: 'static',
                    inline: true,
                    onChange: function(selectedDates, dateStr, instance) {
                        console.log(selectedDates);
                        @this.updateDates(selectedDates, dateStr)
                    },
                });
            },
            closePopup($dispatch) {
                $dispatch('hidepopup')
            },
            reset() {
                @this.resetReservation()
                calendar.clear()
                calendar.set("disable", [])
            },
            submit() {
                if(this.submitType == "submitUserData"){
                    @this.submitUserData()
                }else if(submitType = "checkout"){
                    @this.checkout()
                }
            }
        }
    }
    // window.addEventListener('resetDatesToStart', event => {
    //     calendar.setDate(event.detail.checkinDate)
    // })
    window.addEventListener('disableMinDates', event => {
        calendar.set("disable", [
            function(date) {
                var calendarDay = moment.utc(date)
                var selectedDay = moment.utc(event.detail.selectedDate)
                var differenceInDays = moment(calendarDay).diff(moment(selectedDay), 'days')
                if(differenceInDays < 3 && differenceInDays != 0){
                    return true
                }
            }
        ])
    })
    window.addEventListener('enableAllDates', event => {
        calendar.set("disable", [])
    })
    
    document.addEventListener("DOMContentLoaded", function() {
        var cleaveDate = new Cleave('.date-format', {
            date: true,
            delimiter: '/',
            datePattern: ['m', 'd', 'Y']
        });
        var cleavePhone = new Cleave('.phone-format', {
            phone: true,
            delimiter: '-',
            phoneRegionCode: 'US'
        });        
    });
</script>
@endpush