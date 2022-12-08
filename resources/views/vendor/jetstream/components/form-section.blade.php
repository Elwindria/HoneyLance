@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}" class="shadow rounded-3xl border-3 border-king/80 bg-white">
            <div class="px-4 py-5 sm:p-6 rounded-3xl">
                <div class="space-y-4">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-5  text-right sm:px-6 rounded-3xl">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>


