<div class="max-h-screen">

    @livewire('app.counts')

    <div class="relative rounded-t-3xl min-h-full bg-white" x-data="{scrollBackTop: false}" x-cloak>

        <div class="flex flex-col gap-4 mt-2 pt-6 pb-2 mb-2 mx-auto max-w-7xl px-4 sm:px-8 sticky top-0 bg-white rounded-t-3xl z-40">
            <div class="flex justify-center">
                <div class="relative">
                    <input wire:model.debounce.500ms="search" class="block w-full appearance-none rounded-3xl pt-1 pb-2 border-honey border-2 h-8 bg-white focus:ring focus:ring-honey-light/50 focus:border-transparent text-king" placeholder="rechercher..." type="search" style="caret-color: rgb(107, 114, 128);" tabindex="0">
                </div>
            </div>
            <div class="flex justify-between">
                <button wire:click="switchSummaryType('all')" class="{{ $this->type === 'all' ? 'text-king-light border-king-light' : 'text-king/50 border-white' }} border-b hover:border-king-light hover:text-king-light px-3 py-2 font-medium text-sm">Tout</button>
                <button wire:click="switchSummaryType('in')" class="{{ $this->type === 'in' ? 'text-king-light border-king-light' : 'text-king/50 border-white' }} border-b hover:border-king-light hover:text-king-light px-3 py-2 font-medium text-sm">Entrée</button>
                <button wire:click="switchSummaryType('out')" class="{{ $this->type === 'out' ? 'text-king-light border-king-light' : 'text-king/50 border-white' }} border-b hover:border-king-light hover:text-king-light px-3 py-2 font-medium text-sm">Sortie</button>
                <button wire:click="switchSummaryType('fixed')" class="{{ $this->type === 'fixed' ? 'text-king-light border-king-light' : 'text-king/50 border-white' }} border-b hover:border-king-light hover:text-king-light px-3 py-2 font-medium text-sm">Frais Fixe</button>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-8 pb-12">

            <div class="">
                <livewire:app.trades.catalogue :page='1' :perPage='10' :search='$this->search' :type='$this->type' :wire:key="'trades-page-'.now()" />
            </div>

            <button class="fixed bottom-2 right-2 shadow-lg bg-honey-light p-2 rounded-lg text-honey-dark" x-show="scrollBackTop" x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false" @click.window="window.scrollTo({top: 0, behavior: 'smooth'})" x-transition.scale.origin.bottom aria-label="Back to top">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </button>
        </div>

    </div>

</div>
