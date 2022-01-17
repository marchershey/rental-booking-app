<div class="flex items-center justify-between" x-data="ticker()">
    <div>
        <label for="" class="block font-medium">{{ $title }}</label>
        <p class="text-muted text-xs" id="-description">{{ $desc }}</p>
    </div>
    <div class="flex items-center space-x-5">
        <button x-on:click="add()" x-bind:disabled="addDisabled" class="hover:ring-blue-500 hover:text-blue-500 ring-2 focus:outline-blue-500 ring-gray-300 disabled:ring-gray-50 disabled:text-gray-50 disabled:cursor-not-allowed block p-1.5 text-gray-400 rounded-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </button>
        <div>
            <input x-model="value" type="text" class=" w-8 p-0 text-xl text-center border-none pointer-events-none" readonly />
        </div>
        <button x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="hover:ring-blue-500 hover:text-blue-500 ring-2 focus:outline-blue-500 ring-gray-300 disabled:ring-gray-50 disabled:text-gray-50 disabled:cursor-not-allowed block p-1.5 text-gray-400 rounded-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
            </svg>
        </button>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('ticker', (config) => ({
            value: @entangle($wireId),
            step: {{ $step }},
            min: {{ $min }},
            max: {{ $max }},
            add() {
                this.ticker = (this.addDisabled) ? this.ticker + this.step : this.ticker;
            },
            subtract() {
                this.ticker = (this.subtractDisabled) ? this.ticker - this.step : this.ticker;
            },
            addDisabled() {
                return this.ticker >= this.max
            },
            subtractDisabled() {
                return this.ticker <= this.min
            },


        }))
    })
</script>
