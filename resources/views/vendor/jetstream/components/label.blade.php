@props(['value'])

<label {{ $attributes->merge(['class' => 'text-king text-lg font-semibold indent-4']) }}>
    {{ $value ?? $slot }}
</label>
