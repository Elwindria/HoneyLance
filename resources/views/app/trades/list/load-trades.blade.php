<div class="flex flex-col justify-center gap-3">

    @foreach($trades as $trade)
    <a href="{{ route('trade-store', ['trade_id' => $trade->id]) }}" class="flex items-center justify-between gap-4 bg-white p-2 border-king/80 hover:border-honey hover:bg-honey/40 rounded-lg border-2 shadow transition duration-200">
        <div class="flex-none">
            @switch($trade->type)
            @case('in')
            <svg class="text-green-600" width="35" height="35" viewBox="0 0 24 24">
                <path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z" />
            </svg>
            @break
            @case('out')
            <svg class="text-red-600 rotate-180" width="35" height="35" viewBox="0 0 24 24">
                <path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z" />
            </svg>
            @break
            @case('fixed')
            <svg class="text-white bg-honey rounded-full p-2" width="32" height="32" viewBox="0 0 16 16">
                <path fill="currentColor" d="M8 4H7v5h4V8H8z"/>
                <path fill="currentColor" d="M16 7V3l-1.1 1.1C13.6 1.6 11 0 8 0C3.6 0 0 3.6 0 8s3.6 8 8 8c2.4 0 4.6-1.1 6-2.8l-1.5-1.3C11.4 13.2 9.8 14 8 14c-3.3 0-6-2.7-6-6s2.7-6 6-6c2.4 0 4.5 1.5 5.5 3.5L12 7h4z"/>
            </svg>
            @break
            @endswitch
        </div>
        <div class="flex-1">
            <p class="text-king font-bold leading-4 mb-2 text-base">{{ $trade->name }}</p>
            @if($trade->type == 'fixed')
            <div class="text-king/50 text-sm mb-1 -mt-1 flex items-center gap-1">
                <div class="mt-1">
                    <svg class="w-3 h-3" width="32" height="32" viewBox="0 0 2048 2048">
                        <path fill="currentColor" d="M1792 993q60 41 107 93t81 114t50 131t18 141q0 119-45 224t-124 183t-183 123t-224 46q-91 0-176-27t-156-78t-126-122t-85-157H128V128h256V0h128v128h896V0h128v128h256v865zM256 256v256h1408V256h-128v128h-128V256H512v128H384V256H256zm643 1280q-3-31-3-64q0-119 45-224t124-183t183-123t224-46q100 0 192 33V640H256v896h643zm573 384q93 0 174-35t142-96t96-142t36-175q0-93-35-174t-96-142t-142-96t-175-36q-93 0-174 35t-142 96t-96 142t-36 175q0 93 35 174t96 142t142 96t175 36zm64-512h192v128h-320v-384h128v256z"/>
                    </svg>
                </div>
                <div class="">
                    {{ Carbon\carbon::parse($trade->date)->format('d/m/Y') }}
                </div>
            </div>
            @endif
            <div class="flex gap-1 flex-wrap">
                @foreach ($trade->tags as $tag)
                <div class="inline-flex h-6 items-center justify-center text-xs font-extrabold px-2 whitespace-nowrap text-honey-dark rounded bg-honey-light/60 shadow-sm">{{ $tag->name_tag }}</div>
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
