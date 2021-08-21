<div x-data="app()" x-init="initCalendar()">

    <div class="fixed bottom-0 w-full">
        <div class="w-full p-5 mx-auto">
            <button x-on:click="startReservation($dispatch)" class="button big">
                Request Reservationss
            </button>
        </div>
    </div>

    <x-popup>
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <div class="text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" x-on:click="closePopup($dispatch)">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <button class="text-sm" x-on:click="clearDates()">
                        Clear dates
                    </button>
                </div>
            </div>
        </x-slot>
        <div class="flex flex-col space-y-5">
            <div>
                <h1 class="text-xl font-bold" x-text="title"></h1>
                <p class="text-sm text-muted" x-text="subtitle"></p>
            </div>
            <div wire:ignore>
                <input x-ref="picker" class="hidden" placeholder="" wire:ignore.self />
            </div>
            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
            </div>
            <div class="">
                <div class="flex items-center justify-between">
                    <div>$299 x {{ $numOfNights }} nights</div>
                    <div>${{ number_format($numOfNights * 299) }}</div>
                </div>
                <div class="flex items-center justify-between">
                    <div>Cleaning fee</div>
                    <div>$175</div>
                </div>
                <div class="flex items-center justify-between">
                    <div>Taxes</div>
                    <div>$79</div>
                </div>
                <div class="flex items-center justify-between font-bold">
                    <div>Total</div>
                    <div>$2,155</div>
                </div>
            </div>
            <div>
                <button class="button big" :disabled="isDisabled">Continue</button>
            </div>
        </div>
    </x-popup>

</div>

@push('scripts')
<script>
    function app() {
        return {
            title: @entangle('title'),
            subtitle: @entangle('subtitle'),
            numOfNights: @entangle('numOfNights'),
            isDisabled: @entangle('isDisabled'),
            startReservation($dispatch) {
                $dispatch('lockbody')
                $dispatch('showpopup')
            },
            initCalendar() {
                window.calendar = flatpickr(this.$refs.picker, {
                    mode: "range",
                    inline: true,
                    minDate: 'today',
                    dateFormat: "M j, Y",
                    position: 'center',
                    onChange: function(selectedDates, dateStr, instance) {
                        console.log(selectedDates)
                        console.log(dateStr)
                        console.log(instance)
                        @this.updateDates(selectedDates, dateStr)
                    },
                });
            },
            clearDates() {
                @this.clearDates()
                calendar.clear()
            },
            closePopup($dispatch) {
                this.clearDates()
                $dispatch('hidepopup')
            },
        }
    }

    window.addEventListener('resetDatesToStart', event => {
        calendar.setDate(event.detail.checkinDate)
        // alert('Name updated to: ' + event.detail.checkinDate);
    })
</script>
@endpush