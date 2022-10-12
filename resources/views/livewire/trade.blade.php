<div class='flex flex-col gap-6 w-4/12 m-auto mt-10'>
    @if($this->display === 'new')
        <div class="hidden sm:block">
            <div class="flex justify-center gap-10">
                <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
                <button wire:click="switchType('in')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Entrée</button>
                <button wire:click="switchType('out')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Sortie</button>
                <button wire:click="switchType('fixed')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Frais Fixe</button>
            </div>
        </div>
    @elseif($this->display === 'summary')
        <div class="flex justify-center gap-10">
            <button wire:click="switchSummaryType('all')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Tout</button>
            <button wire:click="switchSummaryType('in')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Entrée</button>
            <button wire:click="switchSummaryType('out')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Sortie</button>
            <button wire:click="switchSummaryType('fixed')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Frais Fixe</button>
        </div>
        @if($this->edit === false)
            <div class="flex flex-col justify-center">
                @foreach($this->trades as $trade)
                    <div wire:click="edit({{ $trade->id }})">
                        <p>{{ $trade->name }}</p>
                        <p>{{ $trade->date }}</p>
                        <p>{{ $trade->cost }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
    @if($this->type_trade !== null)
        <div class="flex flex-col justify-center">
            <label for="name">Nom</label>
            <input type="text" id="name" wire:model='name'>
            @error('name') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </div>
        <div class="flex flex-col justify-center">
            <label for="cost">Montant (en euro)</label>
            <input type="number" id="cost" wire:model='cost'>
            @error('cost') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </div>
        <div class="flex flex-col justify-center">
            <label for="date">Date</label>
            <input type="date" id="date" wire:model='date'>
            @error('date') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </div>
        @if($this->type_trade === 'in')
            <div class="flex flex-col justify-center">
                <label for="urssaf_percent">Urssaf</label>
                <select name="urssaf_percent" id="urssaf_percent" wire:model='urssaf_percent'>
                    <option>-- Choissisez une option SVP --</option>
                    @foreach( $urssaf_settings as $urssaf_setting)
                            <option value="{{ $urssaf_setting->id }}">{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                    @endforeach
                </select>
                @error('urssaf_percent') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
        @elseif($this->type_trade === 'fixed')
            <div class="flex flex-col justify-center">
                <label for="interval">Période (en jours)</label>
                <input type="number" id="interval" wire:model='interval'>
                @error('interval') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
        @endif
        <div class="flex justify-center">
            <div>
                @foreach(auth()->user()->tags as $tag)
                <input type=checkbox name="name" wire:model='selected_tags' value="{{ $tag->id }}">
                <label for="name">{{ $tag->name_tag }}</label>
                @endforeach
                <a href="{{ route('tags') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Gérer les tags</a>
            </div>
        </div>
        <div class="flex flex-col justify-center gap-2">
            <button wire:click='store()' class="bg-indigo-100 text-indigo-700 rounded-md">Valider</button>
            <button wire:click='resetAllInput()' class="bg-indigo-100 text-indigo-700 rounded-md">Tout effacer</button>
            @if($this->display === 'summary')
                <button wire:click='delete()' class="bg-indigo-100 text-indigo-700 rounded-md">Supprimer</button>
            @endif
        </div>
    @endif
</div>
