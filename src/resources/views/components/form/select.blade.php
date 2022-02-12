<label {{ $attributes->merge(['class' => 'block']) }}>
    @if ($label)
        <span class="text-sm font-semibold capitalize @error($wireid) text-red-500 @enderror">{{ $label }}</span>
    @endif
    <select class="focus:border-gray-500 focus:bg-white focus:ring-0 block w-full my-1 bg-muted-lightest border-transparent rounded-md first:text-muted @error($wireid) border-red-500 @enderror" @if ($wireid) wire:model="{{ $wireid }}" @endif>
        <option value="" hidden></option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    @if ($description || $errors->has($wireid))
        @if ($errors->has($wireid))
            <p class="mt-1 text-xs leading-4 text-red-500">{{ $errors->first($wireid) }}</p>
        @else
            <p class="text-muted mt-1 text-xs leading-4">{!! $description !!}</p>
        @endif
    @endif
</label>
