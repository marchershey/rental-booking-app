<div {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="flex items-center justify-between">
        <label for="{{ $inputId }}" class="block font-medium">{{ $title }}</label>
        @if ($optional)
            <span class="text-muted block mt-1 text-xs" id="{{ $inputId }}-optional">Optional</span>
        @endif
    </div>
    <div class="mt-1">
        <input type="{{ $inputType }}" id="{{ $inputId }}" class="focus:border-blue-500 block w-full placeholder-gray-300 border-gray-300 rounded" @if ($placeholder) placeholder="{{ $placeholder }}"@endif @if ($desc) aria-describedby="{{ $inputId }}-description"@endif @if ($wireId) wire:model.lazy="{{ $wireId }}"@endif>
    </div>
    @if ($desc)
        <div class="mt-1 ml-px">
            <p class="text-muted text-xs" id="{{ $inputId }}-description">{{ $desc }}</p>
        </div>
    @endif
</div>
