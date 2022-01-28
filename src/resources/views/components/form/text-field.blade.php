<div {{ $attributes->merge(['class' => 'w-full']) }} @if ($max) x-data="{ count: 0 }" x-init="count = $refs.inputfield.value.length" @endif>
    <div class="flex items-center justify-between">
        <label class="block font-medium @error($wireId) text-red-500 @enderror">{{ $title }}</label>
        @if ($optional)
            <span class="text-muted block mt-1 text-xs tracking-wide">Optional</span>
        @endif
    </div>
    <div class="mt-1">
        <input type="{{ $inputType }}" class="focus:border-blue-500 block w-full placeholder-gray-300 border-gray-300 rounded read-only:bg-gray-100 @error($wireId) border-red-500 @enderror" @if ($placeholder) placeholder="{{ $placeholder }}"@endif @if ($max) maxlength="{{ $max }}" x-ref="inputfield" x-on:keyup="count = $refs.inputfield.value.length" @endif @if ($wireId) wire:model.lazy="{{ $wireId }}" @endif @if ($alpineId) x-model.debounce="{{ $alpineId }}" @endif>
    </div>
    <div class="flex items-center justify-between tracking-wide">
        @if ($desc)
            <div class="mt-1 ml-px">
                <p class="text-muted text-xs">{{ $desc }}</p>
            </div>
        @endif
        @if ($max)
            <div class="mt-1 ml-px">
                <p class="text-muted text-xs"><span x-text="count"></span> / {{ $max }}</p>
            </div>
        @endif
    </div>
</div>
