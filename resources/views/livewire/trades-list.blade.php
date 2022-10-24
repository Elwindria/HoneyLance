<div class="h-screen">
    @include("livewire.counts")
    <div class="relative rounded-t-3xl min-h-full bg-white">
        <div class="flex flex-col gap-4 mt-2 py-6 mx-auto max-w-7xl px-4 sm:px-8">
            <div class="flex justify-center">
                {{-- <input type="text" placeholder="rechercher..." class="rounded-3xl pt-1 pb-2 border-honey border-2 h-8 bg-white focus:ring focus:ring-honey-light/50 focus:border-transparent text-king"> --}}
                <div class="relative">
                    <input
                    {{-- class="block w-full appearance-none bg-transparent py-4 pl-4 pr-12 text-base text-slate-900 placeholder:text-slate-600 focus:outline-none sm:text-sm sm:leading-6" --}}
                    class="block w-full appearance-none rounded-3xl pt-1 pb-2 border-honey border-2 h-8 bg-white focus:ring focus:ring-honey-light/50 focus:border-transparent text-king"
                    placeholder="rechercher..." type="text" style="caret-color: rgb(107, 114, 128);" tabindex="0">
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
        <div class="mx-auto max-w-7xl px-4 sm:px-8">
            <div class="flex flex-col justify-center gap-2">
                @foreach($this->trades as $trade)
                <a href="{{ route('trade-store', ['trade_id' => $trade->id]) }}" class="flex items-center justify-between bg-white p-2 border-king hover:border-honey hover:bg-gray-100 rounded-3xl border-2">
                    <div class="flex items-center gap-3">
                        @if($trade->type === "in")
                        <svg class="text-emerald-600" width="35" height="35" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z" />
                        </svg>
                        @else
                        <svg class="text-red-600 rotate-180" width="35" height="35" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z" />
                        </svg>
                        @endif
                        <div>
                            <p class="text-king font-bold capitalize text-base">{{ $trade->name }}</p>
                            {{-- <p class="text-honey font-medium text-xs">{{ Carbon\Carbon::parse($trade->date)->format('d/m/Y') }}</p> --}}
                            <div class="flex gap-1">
                                @foreach ($trade->tags as $tag)
                                <div class="bg-honey-light/60 text-xs text-honey-dark py-0.5 px-1.5 rounded-md">{{ $tag->name_tag }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class='flex items-center gap-4'>
                        <p class="text-king-light text-lg font-bold">{{ $trade->cost }}€</p>
                        <div class="text-king">
                            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.41431" width="10" height="2" rx="1" transform="rotate(45 1.41431 0)" fill="currentColor" />
                                <rect y="13.071" width="10" height="2" rx="1" transform="rotate(-45 0 13.071)" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
