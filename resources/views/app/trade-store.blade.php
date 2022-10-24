<div class="">
    @include("app.counts")
    <div class="relative rounded-t-3xl min-h-full bg-white">
        <div class="mt-2">
            <div class="flex justify-around px-8 py-6">
                <button wire:click="switchType('in')" class="{{ $this->type_trade === 'in' ? 'text-king-light border-king-light' : 'text-king/50 border-transparent' }} w-24 border-b px-3 py-2 font-medium text-sm">Entrée</button>
                <button wire:click="switchType('out')" class="{{ $this->type_trade === 'out' ? 'text-king-light border-king-light' : 'text-king/50 border-transparent' }} w-24 border-b px-3 py-2 font-medium text-sm">Sortie</button>
                <button wire:click="switchType('fixed')" class="{{ $this->type_trade === 'fixed' ? 'text-king-light border-king-light' : 'text-king/50 border-transparent' }} w-24 border-b px-3 py-2 font-medium text-sm">Frais Fixe</button>
            </div>
        </div>

        <div class="flex-col px-4 space-y-4">
            @if($this->type_trade !== null)
            <div class="flex flex-col justify-center">
                <label for="name" class="text-king text-lg font-semibold indent-4">Nom</label>
                <input type="text" id="name" wire:model='name' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                @error('name') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            <div class="flex flex-col justify-center">
                <label for="cost" class="text-king text-lg font-semibold indent-4">Montant <span class="text-xs text-king/50">en euro</span></label>
                <input type="number" min="0" id="cost" wire:model='cost' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                @error('cost') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            <div class="flex flex-col justify-center">
                <label for="date" class="text-king text-lg font-semibold indent-4">Date</label>
                <input type="date" id="date" wire:model='date' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                @error('date') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            @if($this->type_trade === 'in')
            <div class="flex flex-col justify-center">
                <label for="urssaf_percent" class="text-king text-lg font-semibold indent-4">Urssaf</label>
                <select name="urssaf_percent" id="urssaf_percent" wire:model='urssaf_percent' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                    @if($this->urssaf_percent === null)
                    <option>Votre taux Urssaf par défaut n'existe pas. Vous pouvez en choisir un dans vos paramètres d'utilisateur.</option>
                    @elseif($this->urssaf_percent === 'old')
                    <option>Votre taux Urssaf par défaut n'existe plus et doit être mis à jour.</option>
                    @elseif($this->old_urssaf_percent)
                    <option value="{{ $this->urssaf_percent }}">{{ $this->urssaf_percent }}% - 🚩 Attention 🚩 Ancien taux Urssaf</option>
                    @else
                    <option>-- Choissisez une option SVP --</option>
                    @endif
                    @foreach( $urssaf_settings as $urssaf_setting)
                    <option value="{{ $urssaf_setting->percentage }}">{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                    @endforeach
                </select>
                @error('urssaf_percent') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            @elseif($this->type_trade === 'fixed')
            <div class="flex flex-col justify-center">
                <label for="interval" class="text-king text-lg font-semibold indent-4">Période <span class="text-xs text-king/50">en jours</span></label>
                <input type="number" step="1" min="1" id="interval" wire:model='interval' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                @error('interval') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            @endif
            <div class="flex flex-col justify-center">
                <label class="text-king text-lg font-semibold indent-4 border-b-2 border-king">Tags</label>
                <div class="flex-col gap-2">
                    <div class="flex flex-wrap gap-2 py-4">
                        @foreach(auth()->user()->tags as $tag)
                        <div class="">
                            <input type="checkbox" wire:model='selected_tags' id="{{ $tag->id }}" value="{{ $tag->id }}" class="hidden peer" required="">
                            <label for="{{ $tag->id }}" class="inline-flex justify-between items-center py-1 px-2 text-king/50 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-honey-light/60 peer-checked:text-honey-dark ">
                                <div class="block">
                                    <div class="text-sm font-semibold">{{ $tag->name_tag }}</div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex items-end justify-end">
                        <a href="{{ route('user-settings') }}" class="flex items-center gap-1 text-sm text-king-light py-1 px-2 border-king-light border-2 rounded-3xl">
                            Gérer les tags
                            <svg width="22" height="22" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m21.41 11.58l-9-9C12.04 2.21 11.53 2 11 2H4a2 2 0 0 0-2 2v7c0 .53.21 1.04.59 1.41l.41.4c.9-.54 1.94-.81 3-.81a6 6 0 0 1 6 6c0 1.06-.28 2.09-.82 3l.4.4c.37.38.89.6 1.42.6c.53 0 1.04-.21 1.41-.59l7-7c.38-.37.59-.88.59-1.41c0-.53-.21-1.04-.59-1.42M5.5 7A1.5 1.5 0 0 1 4 5.5A1.5 1.5 0 0 1 5.5 4A1.5 1.5 0 0 1 7 5.5A1.5 1.5 0 0 1 5.5 7M10 19H7v3H5v-3H2v-2h3v-3h2v3h3v2Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-3">
                <button wire:click='store' class="bg-green-600 text-white text-xl font-semibold rounded-lg py-4 flex justify-center gap-2">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Zm0-2q3.35 0 5.675-2.325Q20 15.35 20 12q0-3.35-2.325-5.675Q15.35 4 12 4Q8.65 4 6.325 6.325Q4 8.65 4 12q0 3.35 2.325 5.675Q8.65 20 12 20Zm0-8Z" />
                    </svg>
                    Valider
                </button>
                @if($this->trade_id != null)
                <button wire:click='delete' class="bg-white text-red-600 rounded-md mb-12">Supprimer</button>
                @else
                <button wire:click='resetInputFields' class="bg-white text-red-600 rounded-md mb-12">Tout effacer</button>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
