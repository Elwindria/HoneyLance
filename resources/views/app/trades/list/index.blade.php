<x-app-layout>
    <div class="max-h-screen">

        @livewire('app.counts')

        <div class="relative rounded-t-3xl min-h-full bg-white" x-data="{scrollBackTop: false}" x-cloak>

            <div class="flex flex-col gap-4 mt-2 pt-6 pb-2 mb-2 mx-auto max-w-7xl px-4 sm:px-8 sticky top-0 bg-white rounded-t-3xl z-40">
                <div class="flex justify-center">
                    <div class="relative">
                        <input class="block w-full appearance-none rounded-3xl pt-1 pb-2 border-honey border-2 h-8 bg-white focus:ring focus:ring-honey-light/50 focus:border-transparent text-king" placeholder="rechercher..." type="text" style="caret-color: rgb(107, 114, 128);" tabindex="0">
                        <svg class="pointer-events-none absolute top-1 right-3 h-6 w-6 fill-slate-400" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.47 21.53a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-9.97-4.28a6.75 6.75 0 0 1-6.75-6.75h-1.5a8.25 8.25 0 0 0 8.25 8.25v-1.5ZM3.75 10.5a6.75 6.75 0 0 1 6.75-6.75v-1.5a8.25 8.25 0 0 0-8.25 8.25h1.5Zm6.75-6.75a6.75 6.75 0 0 1 6.75 6.75h1.5a8.25 8.25 0 0 0-8.25-8.25v1.5Zm11.03 16.72-5.196-5.197-1.061 1.06 5.197 5.197 1.06-1.06Zm-4.28-9.97c0 1.864-.755 3.55-1.977 4.773l1.06 1.06A8.226 8.226 0 0 0 18.75 10.5h-1.5Zm-1.977 4.773A6.727 6.727 0 0 1 10.5 17.25v1.5a8.226 8.226 0 0 0 5.834-2.416l-1.061-1.061Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button wire:click="switchSummaryType('all')" class="text-king-light border-b border-king-light hover:text-honey px-3 py-2 font-medium text-sm">Tout</button>
                    <button wire:click="switchSummaryType('in')" class="text-king/50 border-b border-white hover:text-honey px-3 py-2 font-medium text-sm">Entrée</button>
                    <button wire:click="switchSummaryType('out')" class="text-king/50 border-b border-white hover:text-honey px-3 py-2 font-medium text-sm">Sortie</button>
                    <button wire:click="switchSummaryType('fixed')" class="text-king/50 border-b border-white hover:text-honey px-3 py-2 font-medium text-sm whitespace-nowrap">Frais Fixe</button>
                </div>
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-8 pb-12">

                @livewire('app.trade-list', ['page' => 1, 'perPage' => 10, 'key' => 'trades-page-' . 1])

                <button class="fixed bottom-2 right-2 shadow-lg bg-honey-light p-2 rounded-lg text-honey-dark" x-show="scrollBackTop" x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false" @click.window="window.scrollTo({top: 0, behavior: 'smooth'})" x-transition.scale.origin.bottom aria-label="Back to top">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                </button>
            </div>

        </div>

    </div>
</x-app-layout>
