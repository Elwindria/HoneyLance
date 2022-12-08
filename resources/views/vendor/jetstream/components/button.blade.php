<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block w-full py-4 px-6 text-center text-lg leading-6 text-white font-extrabold bg-king-light hover:bg-king/40 border-3 border-king/40 shadow rounded transition duration-200']) }}>
    {{ $slot }}
</button>
