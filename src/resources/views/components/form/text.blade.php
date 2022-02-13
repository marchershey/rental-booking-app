<label {{ $attributes->merge(['class' => 'block']) }}>
    @if ($label || $optional)
        <div class="flex items-end justify-between">
            @if ($label)
                <span class="text-sm font-semibold capitalize @error($wireid) text-red-500 @enderror">{{ $label }}</span>
            @endif
            @if ($optional)
                <span class="text-xs text-muted @error($wireid) text-red-500 @enderror">Optional</span>
            @endif
        </div>
    @endif
    <input autocomplete="off" type="{{ $inputtype }}" class="focus:border-gray-500 focus:bg-white focus:ring-0 block w-full mt-1 py-2 px-3 text-base bg-muted-lightest border-transparent rounded-md placeholder-muted-light @if ($inputclass) {{ $inputclass }} @endif @error($wireid) border-red-500 @enderror" @if ($placeholder) placeholder="{{ $placeholder }}" @endif @if ($wireid) wire:model.debounce.500ms="{{ $wireid }}" @endif @if ($inputid) id="{{ $inputid }}" @endif @if ($disabled) disabled @endif @if ($readonly) readonly @endif>
    @if ($description || $errors->has($wireid))
@if ($errors->has($wireid))
            <p class=" mt-1 text-xs leading-4 text-red-500">{{ $errors->first($wireid) }}</p>
@else
    <p class="text-muted mt-1 text-xs leading-4">{!! $description !!}</p>
    @endif
    @endif
</label>