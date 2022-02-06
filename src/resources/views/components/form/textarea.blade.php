<label {{ $attributes->merge(['class' => 'block']) }} {{ $attributes }}>
    @if ($label)
        <span class="text-sm font-semibold capitalize @error($wireid) text-red-500 @enderror">{{ $label }}</span>
    @endif
    <textarea cols="{{ $cols }}" rows="{{ $rows }}" class="focus:border-gray-500 focus:bg-white focus:ring-0 block w-full mt-1 bg-muted-lightest border-transparent rounded-md @error($wireid) border-red-500 @enderror" @if ($placeholder) placeholder="{{ $placeholder }}" @endif @if ($wireid) wire:model.debounce.500ms="{{ $wireid }}" @endif></textarea>
    @if ($description || $errors->has($wireid))
        @if ($errors->has($wireid))
            <p class=" mt-1 text-xs leading-4 text-red-500">{{ $errors->first($wireid) }}</p>
        @else
            <p class="text-muted mt-1 text-xs leading-4">{!! $description !!}</p>
        @endif
    @endif
</label>
