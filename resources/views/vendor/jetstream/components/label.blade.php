@props(['value', 'plus'])

<label {{ $attributes->merge(['class' => 'block mb-1 font-extrabold']) }}>
    {{ $value ?? $slot }}
    @if ($plus)
    <span class="text-xs text-king/50">{{ $plus }}</span>
    @endif
</label>
