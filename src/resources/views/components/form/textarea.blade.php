<div {{ $attributes->merge(['class' => 'w-full']) }} @if ($max) x-data="{ count: 0 }" x-init="count = $refs.textarea.value.length" @endif>
    <div class="flex items-center justify-between">
        <label class="block font-medium @error($wireId) text-red-500 @enderror">{{ $title }}</label>
        @if ($optional)
            <span class="text-muted block mt-1 text-xs">Optional</span>
        @endif
    </div>
    <div class="mt-1">
        <textarea class="focus:border-blue-500 block w-full placeholder-gray-300 border-gray-300 rounded read-only:bg-gray-100 @error($wireId) border-red-500 @enderror" @if ($max) maxlength="{{ $max }}" x-ref="textarea" x-on:keyup="count = $refs.textarea.value.length" @endif rows="3" @if ($placeholder) placeholder="{{ $placeholder }}"@endif @if ($wireId) wire:model.lazy="{{ $wireId }}"@endif></textarea>
    </div>
    <div class="flex items-center justify-between">
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
