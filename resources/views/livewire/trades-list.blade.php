<div class="h-screen">
    @include("livewire.counts")
    <div class="relative bg-honey-300 rounded-t-3xl min-h-full bg-white">
        <div class="flex flex-col gap-6 mt-2 py-6 mx-auto max-w-7xl px-4 sm:px-8">
            <div class="flex justify-center">
                <input type="text" class="rounded-3xl border-honey border-2 h-8 bg-white font-semibold focus:ring focus:ring-honey-light/50 focus:border-transparent text-king">
            </div>
            <div class="flex justify-between">
                <button wire:click="switchSummaryType('all')" class="text-king-light border-b border-king-light hover:text-honey  px-3 py-2 font-medium text-sm">Tout</button>
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
                                <div class="bg-honey-light/60 text-xs text-king py-0.5 px-1.5 rounded-md">{{ $tag->name_tag }}</div>
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
