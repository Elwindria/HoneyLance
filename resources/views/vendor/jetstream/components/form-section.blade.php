@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="px-4 py-5 bg-white sm:p-6 md:border-king md:border-t-2 md:border-x-2 {{ isset($actions) ? 'rounded-t-3xl' : 'rounded-3xl' }}">
                <div class="space-y-4">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-5 bg-white text-right sm:px-6 rounded-b-3xl md:border-king md:border-b-2 md:border-x-2">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
