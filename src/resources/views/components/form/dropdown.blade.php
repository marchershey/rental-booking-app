<div {{ $attributes->merge(['class' => 'w-full']) }} x-data="dropdown{{ $wireId }}" x-init="update" wire:key="dropdown{{ $wireId }}">
    <div class="flex items-center justify-between">
        <label class="block font-medium">{{ $title }}</label>
        @if ($optional)
            <span class="text-muted block mt-1 text-xs">Optional</span>
        @endif
    </div>
    <div class="mt-1">
        <select x-model="value" class="block w-full border-gray-300 rounded" :class="muted ? 'text-gray-300' : ''" x-on:click="unmute">
            @if ($placeholder)
                <option value="" selected hidden>{{ $placeholder }}</option>
            @endif
            @if ($options)
                @foreach ($options as $key => $value)
                    @if ($loop->first && !$placeholder)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endif
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
        Alpine.data('dropdown{{ $wireId }}', (config) => ({
            value: @entangle($wireId),
            muted: false,
            unmute() {
                this.muted = false;
            },
            update() {
                if ({{ $muted }}) {
                    this.muted = true;
                }
                console.log("{{ $wireId }}-{{ $muted }}");
            }


        }))
    })
</script>
