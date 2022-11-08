<div class="flex flex-col justify-center gap-2">

    @foreach($trades as $trade)
    <a href="{{ route('trade-store', ['trade_id' => $trade->id]) }}" class="flex items-center justify-between gap-3 bg-white p-2 border-king hover:border-honey hover:bg-gray-100 rounded-3xl border-2">
        <div class="flex-none">
            @if($trade->type === "in")
            <svg class="text-emerald-600" width="35" height="35" viewBox="0 0 24 24">
                <path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z" />
            </svg>
            @else
            <svg class="text-red-600 rotate-180" width="35" height="35" viewBox="0 0 24 24">
                <path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z" />
            </svg>
            @endif
        </div>
        <div class="flex-1">
            <p class="text-king font-bold capitalize text-base">{{ $trade->name }}</p>
            <div class="flex gap-1 flex-wrap">
                @foreach ($trade->tags as $tag)
                <div class="bg-honey-light/60 text-xs text-honey-dark py-0.5 px-1.5 rounded-md whitespace-nowrap">{{ $tag->name_tag }}</div>
                @endforeach
            </div>
        </div>
        <div class='shrink-0 flex justify-end items-center gap-4'>
            <p class="text-king-light text-lg font-bold">{{ number_format($trade->cost, 2, ',', ' ') }} €</p>
            <div class="text-king">
                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1.41431" width="10" height="2" rx="1" transform="rotate(45 1.41431 0)" fill="currentColor" />
                    <rect y="13.071" width="10" height="2" rx="1" transform="rotate(-45 0 13.071)" fill="currentColor" />
                </svg>
            </div>
        </div>
    </a>
    @endforeach

    @if($trades->hasMorePages())
    <livewire:app.trades.catalogue :page='$page' :perPage='$perPage' :search='$this->search' :type='$this->type' :wire:key="'trades-page-'.now()" />
    @endif

</div>
