@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent']) !!}>
