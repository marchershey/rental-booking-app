<div {{ $attributes->merge(['class' => 'relative w-full space-y-1']) }} x-data="select({ items: {{ $items }} })" x-init="init()" x-on:click.away="open = false">
    <div class="flex items-center justify-between">
        <label for="{{ $inputId }}" class="block font-medium">{{ $title }}</label>
        @if ($optional)
            <span class="text-muted block mt-1 text-xs" id="{{ $inputId }}-optional">Optional</span>
        @endif
    </div>
    <div>
        <input x-model="query" x-on:focus="open = true" type="search" id="{{ $inputId }}" class="focus:border-blue-500 z-10 block w-full placeholder-gray-300 border-gray-300 rounded" @if ($placeholder) placeholder="{{ $placeholder }}"@endif @if ($desc) aria-describedby="{{ $inputId }}-description"@endif @if ($wireId) wire:model.lazy="{{ $wireId }}"@endif>
    </div>
    <div x-show="open" x-cloak class="focus:outline-none absolute w-full mt-1 origin-top bg-white border border-gray-300 divide-y rounded shadow-2xl" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <template x-for="(item, index) in options">
            <span class="block px-4 py-2 text-sm text-gray-700" x-text="item"></span>
        </template>
    </div>
    <div class="whitespace-nowrap gap-x-3 gap-y-1 flex flex-wrap pt-1">
        <template x-for="(item, index) in selections">
            <div class="flex items-center px-2 py-1 space-x-1 text-sm font-semibold bg-gray-100 rounded">
                <span x-text="item"></span>
                <svg class="text-muted block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
        </template>
    </div>
    @if ($desc)
        <div class="ml-px">
            <p class="text-muted text-xs" id="{{ $inputId }}-description">{{ $desc }}</p>
        </div>
    @endif
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('select', (config) => ({
            // states
            open: false,

            // data
            items: config.options, // items are the full list of options available
            options: {}, // options are items that are available (updated after search)
            selected: {}, // selected are the items selected to be sent to backend

            query: '', // the search term

            init: function() {
                this.options = this.items
                var selected = this.selected
                if (selected.find(this.options)) this.selected = null


                if (!(this.selected in this.options)) this.selected = null
                this.$watch('search', ((value) => {
                    if (!this.open || !value) return this.options = this.data
                    this.options = Object.keys(this.data)
                        .filter((key) => this.data[key].toLowerCase().includes(value.toLowerCase()))
                        .reduce((options, key) => {
                            options[key] = this.data[key]
                            return options
                        }, {})
                }))
            },

            selectOption: function() {
                if (!this.open) return this.toggleListboxVisibility()
                this.selected = Object.keys(this.options)[this.focusedOptionIndex]
                this.closeListbox()
            },


        }))
    })
</script>
