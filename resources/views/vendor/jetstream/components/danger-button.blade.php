<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-block w-full py-4 px-6 text-center text-lg leading-6 text-white font-extrabold bg-red-700 hover:bg-red-800 border-3 border-red-800 shadow rounded transition duration-200']) }}>
    {{ $slot }}
</button>
