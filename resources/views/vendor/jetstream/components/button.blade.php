<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center text-base w-full px-4 py-2 bg-honey border border-transparent rounded-md font-semibold text-white uppercase hover:bg-honey-dark active:bg-honey-dark transition']) }}>
    {{ $slot }}
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
</button>
