<div {{ $attributes->merge(['class' => 'w-full']) }} x-data="{{ $wireId }}_dropdown" x-init="update">
    <div class="flex items-center justify-between">
        <label class="block font-medium @error($wireId) text-red-500 @enderror">{{ $title }}</label>
        @if ($optional)
            <span class="text-muted block mt-1 text-xs">Optional</span>
        @endif
    </div>
    <div class="mt-1">
        <select x-model="value" name="{{ $wireId }}" class="block w-full border-gray-300 rounded disabled:bg-gray-100 text-gray-300 @error($wireId) border-red-500 @enderror" @if ($placeholder) :class="muted ? '' : 'text-gray-700'"@endif x-on:focus="unmute">
            @if ($options)
                @if ($placeholder)
                    <option value="" selected hidden>{{ $placeholder }}</option>
                @endif
                @foreach ($options as $key => $value)
                    <option wire:key="{{ $key }}" value="{{ $key }}">{{ $value }}</option>
                @endforeach
            @endif
        </select>
    </div>
    @if ($desc)
        <div class="mt-1 ml-px">
            <p class="text-muted text-xs">{{ $desc }}</p>
        </div>
    @endif
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('{{ $wireId }}_dropdown', (config) => ({
            value: @entangle("$wireId"),
            muted: false,
            unmute() {
                this.muted = false;
            },
            update() {
                if ({{ $muted }} && this.value == null) {
                    this.muted = true;
                }
            }
        }))
    })
</script>
