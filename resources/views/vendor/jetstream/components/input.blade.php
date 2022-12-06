@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-king bg-white shadow border-2 border-king rounded']) !!}>
