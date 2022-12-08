<div class="max-h-screen md:max-w-7xl md:mx-auto">

    @livewire('app.counts')

    <div class="relative min-h-full bg-white rounded-t-3xl md:rounded-b-3xl">
        <div class="mt-2">
            <div class="flex justify-around md:px-8 px-4 py-6 gap-4">
                <button wire:click="switchType('in')" class="{{ $this->type_trade === 'in' ? 'text-white border-blue-700 shadow bg-king-light hover:bg-blue-700' : 'hover:text-king/30 text-king/50 border-transparent' }} transition duration-200 placeholder:leading-6 text-lg border-2 w-full md:px-3 md:py-2 px-2 py-1 font-extrabold rounded">Entrée</button>
                <button wire:click="switchType('out')" class="{{ $this->type_trade === 'out' ? 'text-white border-blue-700 shadow bg-king-light hover:bg-blue-700' : 'hover:text-king/30 text-king/50 border-transparent' }} transition duration-200 placeholder:leading-6 text-lg border-2 w-full md:px-3 md:py-2 px-2 py-1 font-extrabold rounded">Sortie</button>
                <button wire:click="switchType('fixed')" class="{{ $this->type_trade === 'fixed' ? 'text-white border-blue-700 shadow bg-king-light hover:bg-blue-700' : 'hover:text-king/30 text-king/50 border-transparent' }} transition duration-200 placeholder:leading-6 text-lg border-2 w-full md:px-3 md:py-2 px-2 py-1 font-extrabold rounded">Frais Fixe</button>
            </div>
        </div>

        <div class="flex-col px-4 sm:px-8 space-y-4">
            @if($this->type_trade !== null)
            <div class="flex flex-col justify-center">
                {{-- <label for="name" class="text-king text-lg font-semibold indent-4">Nom</label> --}}
                {{-- <input type="text" id="name" wire:model='name' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring-transparent focus:border-honey transition duration-200"> --}}
                <x-jet-label for="email" value="Nom" plus="" />
                <x-jet-input id="name" wire:model='name' type="text" name="name" autofocus />
                @error('name') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            <div class="flex flex-col justify-center">
                {{-- <label for="cost" class="text-king text-lg font-semibold indent-4">Montant <span class="text-xs text-king/50">en euro</span></label> --}}
                {{-- <input type="number" min="0" id="cost" wire:model='cost' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring-transparent focus:border-honey transition duration-200"> --}}
                <x-jet-label for="cost" value="Montant" plus="en euro" />
                <x-jet-input id="cost" wire:model='cost' type="number" min="0" name="cost" />
                @error('cost') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            <div class="flex flex-col justify-center">
                @if($this->type_trade == 'fixed')
                {{-- <label for="date" class="text-king text-lg font-semibold indent-4">Date <span class="text-xs text-king/50">prochaine facturation</span></label> --}}
                {{-- <input type="date" id="date" min="{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" wire:model='date' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring-transparent focus:border-honey transition duration-200"> --}}
                <x-jet-label for="date" value="Date" plus="prochaine facturation" />
                <x-jet-input type="date" id="date" min="{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" wire:model='date' />
                @else
                {{-- <label for="date" class="text-king text-lg font-semibold indent-4">Date</label> --}}
                {{-- <input type="date" id="date" wire:model='date' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring-transparent focus:border-honey transition duration-200"> --}}
                <x-jet-label for="date" value="Date" plus="" />
                <x-jet-input type="date" id="date" wire:model='date' />
                @endif
                @error('date') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            @if($this->type_trade === 'in')
            <div class="flex items-center pt-2">
                <button type="button" wire:click='switchTaxable' wire:model='taxable' class="{{ $this->taxable === true ? 'bg-king-light' : 'bg-gray-300' }} border-king shadow-sm relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-king-light focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="contribution-urssaf">
                    <span aria-hidden="true" class="{{ $this->taxable === true ? 'translate-x-5' : 'translate-x-0' }} pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white ring-0 transition duration-200 ease-in-out"></span>
                </button>
                <span class="ml-2" id="contribution-urssaf">
                    <span class="font-extrabold">Soumis à la cotisation Urssaf ?</span>
                </span>
            </div>
            @if($this->taxable === true)
            <div class="flex flex-col justify-center">
                <x-jet-label for="date" value="Urssaf" plus="" />
                <select name="urssaf_percent" id="urssaf_percent" wire:model='urssaf_percent' class="inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-king bg-white shadow border-2 border-king rounded">
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
            @endif
            @elseif($this->type_trade === 'fixed')
            <div class="flex flex-col justify-center">
                <div class="flex">
                    <x-jet-label for="interval" value="Période" plus="en jours" />
                    <div class="group cursor-pointer relative inline-block text-center">
                        <svg width="32" height="32" viewBox="0 0 20 20" class="h-4 mt-1 text-king-light">
                            <path fill="currentColor" d="M10 .4C4.697.4.399 4.698.399 10A9.6 9.6 0 0 0 10 19.601c5.301 0 9.6-4.298 9.6-9.601c0-5.302-4.299-9.6-9.6-9.6zm.896 3.466c.936 0 1.211.543 1.211 1.164c0 .775-.62 1.492-1.679 1.492c-.886 0-1.308-.445-1.282-1.182c0-.621.519-1.474 1.75-1.474zM8.498 15.75c-.64 0-1.107-.389-.66-2.094l.733-3.025c.127-.484.148-.678 0-.678c-.191 0-1.022.334-1.512.664l-.319-.523c1.555-1.299 3.343-2.061 4.108-2.061c.64 0 .746.756.427 1.92l-.84 3.18c-.149.562-.085.756.064.756c.192 0 .82-.232 1.438-.719l.362.486c-1.513 1.512-3.162 2.094-3.801 2.094z" />
                        </svg>
                        <div class="opacity-0 w-36 bg-black text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full -left-1/2 -ml-10 px-3 pointer-events-none">
                            30 = 1 mois plein
                            <svg class="absolute text-black h-2 w-full left-0 top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                            </svg>
                        </div>
                    </div>
                </div>
                <x-jet-input type="number" step="1" min="1" id="interval" wire:model='interval' />
                @error('interval') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            @endif
            <div class="flex flex-col justify-center">
                <x-jet-label for="date" value="Tags" plus="" />
                <div class="flex-col">
                    <div class="flex flex-wrap gap-2 p-4 border-2 border-king rounded shadow">
                        @foreach(auth()->user()->tags as $tag)
                        <div class="">
                            <input type="checkbox" wire:model='selected_tags' id="{{ $tag->id }}" value="{{ $tag->id }}" class="hidden peer" required="">
                            <label for="{{ $tag->id }}" class="transition duration-200 inline-flex h-6 first-line:justify-center text-xs items-center font-extrabold px-2 whitespace-nowrap text-king/50 rounded cursor-pointer bg-gray-50 shadow-sm peer-checked:bg-honey-light/60 peer-checked:text-honey-dark ">
                                <div class="block">
                                    <div class="text-sm font-semibold">{{ $tag->name_tag }}</div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex items-end justify-end mt-4">
                        <a href="{{ route('user-settings') }}" class="flex items-center gap-1 text-sm text-king-light py-1 px-2 border-king-light border-2 rounded-3xl shadow-sm">
                            Gérer les tags
                            <svg width="22" height="22" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m21.41 11.58l-9-9C12.04 2.21 11.53 2 11 2H4a2 2 0 0 0-2 2v7c0 .53.21 1.04.59 1.41l.41.4c.9-.54 1.94-.81 3-.81a6 6 0 0 1 6 6c0 1.06-.28 2.09-.82 3l.4.4c.37.38.89.6 1.42.6c.53 0 1.04-.21 1.41-.59l7-7c.38-.37.59-.88.59-1.41c0-.53-.21-1.04-.59-1.42M5.5 7A1.5 1.5 0 0 1 4 5.5A1.5 1.5 0 0 1 5.5 4A1.5 1.5 0 0 1 7 5.5A1.5 1.5 0 0 1 5.5 7M10 19H7v3H5v-3H2v-2h3v-3h2v3h3v2Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-3">
                <button wire:click='store' class="bg-green-600 hover:bg-green-800 transition duration-200 border-2 border-green-800 text-white text-xl font-semibold rounded-lg py-4 flex justify-center gap-2 shadow">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Zm0-2q3.35 0 5.675-2.325Q20 15.35 20 12q0-3.35-2.325-5.675Q15.35 4 12 4Q8.65 4 6.325 6.325Q4 8.65 4 12q0 3.35 2.325 5.675Q8.65 20 12 20Zm0-8Z" />
                    </svg>
                    Valider
                </button>
                @if($this->trade_id != null)
                @if($this->confirm_delete == false)
                <button wire:click='confirmDelete' class="bg-white text-red-600 rounded-md mb-12 flex justify-center gap-2 items-center">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 5.99L19.53 19H4.47L12 5.99M2.74 18c-.77 1.33.19 3 1.73 3h15.06c1.54 0 2.5-1.67 1.73-3L13.73 4.99c-.77-1.33-2.69-1.33-3.46 0L2.74 18zM11 11v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zm0 5h2v2h-2z" />
                    </svg>
                    Supprimer
                </button>
                @else
                <button wire:click='delete' class="bg-white text-red-600 rounded-md mb-12 flex justify-center gap-2 items-center">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 5.99L19.53 19H4.47L12 5.99M2.74 18c-.77 1.33.19 3 1.73 3h15.06c1.54 0 2.5-1.67 1.73-3L13.73 4.99c-.77-1.33-2.69-1.33-3.46 0L2.74 18zM11 11v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zm0 5h2v2h-2z" />
                    </svg>
                    Confirmer votre choix
                </button>
                @endif
                @else
                <button wire:click='resetInputFields' class="bg-white text-red-600 rounded-md mb-12">Tout effacer</button>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
