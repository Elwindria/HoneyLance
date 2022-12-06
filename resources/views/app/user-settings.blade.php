<div class="max-h-screen md:max-w-7xl md:mx-auto flex flex-col gap-4">

    <div class="flex flex-col mx-auto max-w-5xl pt-10 px-4 sm:px-8 gap-4">
        <div class="flex justify-center">
            <h2 class="text-honey-dark text-xl font-bold flex items-center gap-1">
                <svg width="32" height="32" class="h-6 w-6 mr-2" viewBox="0 0 15 15">
                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" clip-rule="evenodd">
                        <path d="m5.944.5l-.086.437l-.329 1.598a5.52 5.52 0 0 0-1.434.823L2.487 2.82l-.432-.133l-.224.385L.724 4.923L.5 5.31l.328.287l1.244 1.058c-.045.277-.103.55-.103.841c0 .291.058.565.103.842L.828 9.395L.5 9.682l.224.386l1.107 1.85l.224.387l.432-.135l1.608-.537c.431.338.908.622 1.434.823l.329 1.598l.086.437h3.111l.087-.437l.328-1.598a5.524 5.524 0 0 0 1.434-.823l1.608.537l.432.135l.225-.386l1.106-1.851l.225-.386l-.329-.287l-1.244-1.058c.046-.277.103-.55.103-.842c0-.29-.057-.564-.103-.841l1.244-1.058l.329-.287l-.225-.386l-1.106-1.85l-.225-.386l-.432.134l-1.608.537a5.52 5.52 0 0 0-1.434-.823L9.142.937L9.055.5H5.944Z" />
                        <path d="M9.5 7.495a2 2 0 0 1-4 0a2 2 0 0 1 4 0Z" />
                    </g>
                </svg>
                Paramètres de l'application
            </h2>
        </div>
    </div>

    <div class="rounded-3xl bg-white md:border-king md:border-2">
        <div class="flex flex-col gap-4 py-6 mx-auto max-w-3xl px-4 sm:px-8">
            <div class="flex flex-col justify-center">
                <label for="urssaf_setting_id" class="text-king text-lg font-semibold indent-4">Pourcentage Urssaf <span class="text-xs text-king/50">par défaut</span></label>
                <select name="urssaf_setting_id" id="urssaf_setting_id" wire:model.debounce.500ms='urssaf_setting_id' class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                    <option value="">--SVP Choissisez une option--</option>
                    @foreach($this->urssaf_settings as $urssaf_setting)
                    <option value="{{ $urssaf_setting->id }}">{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                    @endforeach
                </select>
                @error('urssaf_setting_id') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            <div class="flex flex-col justify-center">
                <label for="salary" class="text-king text-lg font-semibold indent-4">Salaire <span class="text-xs text-king/50">en euro</span></label>
                <input type="number" min='0' id="salary" wire:model.debounce.500ms='salary' value="{{ ('salary') }}" class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                @error('salary') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            <div class="flex flex-col justify-center">
                <label for="date_start" class="text-king text-lg font-semibold indent-4">Date de début d'activité</label>
                <input type="date" id="date_start" wire:model.debounce.500ms='date_start' value="{{ ('date_start') }}" class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                @error('date_start') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
            </div>
            {{-- Si new user, on affiche la possibilité de mofifier Epargne de base --}}
            @if($this->count_savings === 1)
                <div class="flex flex-col justify-center">
                    <label for="saving" class="text-king text-lg font-semibold indent-4">Epargne de base</label>
                    <input type="number" id="saving" wire:model.debounce.500ms='count' value="{{ ('count') }}" class="text-center rounded-3xl border-king border-2 h-11 bg-white text-king focus:ring focus:ring-honey focus:border-transparent">
                    @error('count') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
                </div>
            @else
                <div class="flex flex-col justify-center">
                    <label for="saving" class="text-king text-lg font-semibold indent-4">Epargne de base</label>
                    <input type="texte" disabled id="saving" wire:model.debounce.500ms='count' value="{{ ('count') }}" class="text-center rounded-3xl border-gray-600 border-2 h-11 bg-gray-200 text-king focus:ring focus:ring-honey focus:border-transparent">
                    <span class="text-sm text-red-600">L'épargne de base est modifiable que le premier mois</span>
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-col mx-auto max-w-5xl pt-6 px-4 sm:px-8 gap-4">
        <div class="flex justify-center">
            <h2 class="text-honey-dark text-xl font-bold flex items-center gap-1">
                <svg width="32" height="32" viewBox="0 0 512 512">
                    <path d="M416 64H257.6L76.5 251.6c-8 8-12.3 18.5-12.5 29-.3 11.3 3.9 22.6 12.5 31.2l123.7 123.6c8 8 20.8 12.5 28.8 12.5s22.8-3.9 31.4-12.5L448 256V96l-32-32zm-30.7 102.7c-21.7 6.1-41.3-10-41.3-30.7 0-17.7 14.3-32 32-32 20.7 0 36.8 19.6 30.7 41.3-2.9 10.3-11.1 18.5-21.4 21.4z" fill="currentColor"/>
                </svg>
                Gestion des tags
            </h2>
        </div>
    </div>

    <div class="rounded-t-3xl md:rounded-b-3xl bg-white px-4 pt-2 pb-24 md:border-king md:border-2">
        <livewire:app.tags>
    </div>

</div>
