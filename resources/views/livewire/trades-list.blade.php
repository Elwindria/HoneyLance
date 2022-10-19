<div class="h-full">
    @include("livewire.counts")
    <div class="relative bg-darkHoney rounded-t-lg pb-8">
        <div class="flex flex-col gap-6 mt-2 py-6 mx-auto max-w-7xl px-4 sm:px-8">
            <div class="flex justify-center">
                <input type="text" class="rounded-3xl border-king-600 border-2 h-8 bg-white text-king-600">
            </div>
            <div class="flex justify-center gap-10">
                <button wire:click="switchSummaryType('all')" class="text-white hover:text-king-900  px-3 py-2 font-medium text-sm rounded-md">Tout</button>
                <button wire:click="switchSummaryType('in')" class="text-white hover:text-king-900  px-3 py-2 font-medium text-sm rounded-md">Entrée</button>
                <button wire:click="switchSummaryType('out')" class="text-white hover:text-king-900  px-3 py-2 font-medium text-sm rounded-md">Sortie</button>
                <button wire:click="switchSummaryType('fixed')" class="text-white hover:text-king-900  px-3 py-2 font-medium text-sm rounded-md">Frais Fixe</button>
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-8">
            <div class="flex flex-col justify-center gap-5">
                @foreach($this->trades as $trade)
                    <a href="{{ route('trade-store', ['trade_id' => $trade->id]) }}" class="flex justify-between">
                        <div class="flex gap-3">
                            @if($trade->type === "in")
                                <svg class="text-emerald-600" width="45" height="45" viewBox="0 0 24 24"><path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z"/></svg>
                            @else
                            <svg class="text-red-600 rotate-180" width="45" height="45" viewBox="0 0 24 24"><path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z"/></svg>
                            @endif
                            <div>
                                <p class="text-king-600 font-bold capitalize text-base">{{ $trade->name }}</p>
                                <p class="text-king-600 font-medium text-sm">({{ $trade->date }})</p>
                            </div>
                        </div>
                        <div class='flex flex-col items-end'>
                            <p class="text-king-600 font-medium text-sm">{{ $trade->cost }}€</p>
                            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="1.41431" width="10" height="2" rx="1" transform="rotate(45 1.41431 0)" fill="#151850"/><rect y="13.071" width="10" height="2" rx="1" transform="rotate(-45 0 13.071)" fill="#151850"/></svg>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
