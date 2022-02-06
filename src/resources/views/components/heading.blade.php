<!-- This example requires Tailwind CSS v2.0+ -->
<div {{ $attributes->merge(['class' => 'border-b border-gray-200 pb-3 -mx-5 px-5']) }}>
    <h3 class="leading-2 text-xl font-semibold">
        {{ $heading }}
    </h3>
    @if ($description)
        <p class="text-muted text-sm">
            {{ $description }}
        </p>
    @endif
</div>
