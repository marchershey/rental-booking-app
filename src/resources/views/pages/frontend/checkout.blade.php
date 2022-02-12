<div>
    <div class="lg:grid-cols-3 md:gap-10 relative grid items-start grid-cols-1 gap-5" wire:init="calculateTotal()">
        <div class="lg:col-span-2 space-y-5">
            <div class="panel">
                asdf
            </div>
        </div>

        <div class="contain md:top-10 md:sticky bottom-0 z-10 w-full">
            <div class="panel flex flex-col order-1 md:order-2 space-y-5 md:w-[320px] z-10" x-data="{datesSelected:false}" @hidecalendar.window="datesSelected = true" @showcalendar.window="datesSelected = false">
                <div class="flex justify-between">
                    <div class="flex flex-col">
                        <span class="text-muted text-sm">Check in</span>
                        <span class="text-xl">{{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }}</span>
                    </div>
                    <div class="flex flex-col text-right">
                        <span class="text-muted text-sm">Check out</span>
                        <span class="text-xl">{{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}</span>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col space-y-2">
                    <div class="text-muted-dark flex items-baseline justify-between">
                        <span>${{ number_format($reservation->property->nightlyRate ?? 0, 2) }} x {{ $nights ?? 0 }}</span>
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
                    <x-form.button color="link" wire:click="changeDates">Change dates</x-form.button>
                </div>
            </div>
        </div>
    </div>
</div>
