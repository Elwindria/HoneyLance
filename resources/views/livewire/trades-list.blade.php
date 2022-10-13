<div>
    <div class="flex justify-center gap-10">
        <button wire:click="switchSummaryType('all')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Tout</button>
        <button wire:click="switchSummaryType('in')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Entrée</button>
        <button wire:click="switchSummaryType('out')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Sortie</button>
        <button wire:click="switchSummaryType('fixed')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Frais Fixe</button>
    </div>
    <div class="flex flex-col justify-center">
        @foreach($this->trades as $trade)
            <a href="{{ route('trade-store', ['trade_id' => $trade->id]) }}">
                <p>{{ $trade->name }}</p>
                <p>{{ $trade->date }}</p>
                <p>{{ $trade->cost }}</p>
            </a>
        @endforeach
    </div>
</div>
