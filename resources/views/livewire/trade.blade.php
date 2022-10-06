<div class='flex flex-col gap-6 w-4/12 m-auto mt-10'>
    <div class="hidden sm:block">
          <div class="flex space-x-3">
            <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
            <button wire:click="type('in')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Entrée</button>
            <button wire:click="type('out')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Sortie</button>
            <button wire:click="type('fixed')" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Frais Fixe</button>
          </div>
    </div>
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
                    @foreach($this->urssaf_settings as $urssaf_setting)
                        @if($urssaf_setting->percentage == $this->fav_percent){
                            <option value="{{ $urssaf_setting->percentage }}" selected>{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                        }@else{
                            <option value="{{ $urssaf_setting->percentage }}">{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                        }
                        @endif
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
        <div class="flex flex-col justify-center">
            <button wire:click='newTrade()' class="bg-indigo-100 text-indigo-700 rounded-md">Valider</button>
        </div>
    @endif
</div>
