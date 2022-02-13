<div {{ $attributes->merge(['class' => '']) }}>
    <button type="{{ $type }}" class="focus:ring-0 w-full border-transparent border font-semibold text-sm leading-6 rounded-md py-2 px-3 mb-px {{ $buttonClass }}">{{ $slot }}</button>
</div>
