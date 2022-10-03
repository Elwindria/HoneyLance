<div class='flex flex-col gap-6 w-4/12 m-auto mt-10'>
    <div class="flex flex-col justify-center">
        <label for="type">Type</label>
        <select name="type" id="type" wire:model.debounce.500ms='type' value="{{ ('type') }}">
            <option value="">--SVP Choissisez une option--</option>
            <option value="dog">Entrée</option>
            <option value="cat">Sortie</option>
            <option value="hamster">Frais Fixe</option>
        </select>
        @error('type') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col justify-center">
        <label for="cost">Montant</label>
        <input type="number" id="cost" wire:model.debounce.500ms='cost' value="{{ ('cost') }}">
        @error('cost') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col justify-center">
        <label for="name">Nom</label>
        <input type="text" id="name" wire:model.debounce.500ms='name' value="{{ ('name') }}">
        @error('name') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col justify-center">
        <label for="date">Date</label>
        <input type="date" id="date" wire:model.debounce.500ms='date' value="{{ ('date') }}">
        @error('date') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col justify-center">
        <label for="percent_urssaf">Urssaf</label>
        <input type="number" id="percent_urssaf" wire:model.debounce.500ms='percent_urssaf' value="{{ ('percent_urssaf') }}">
        @error('percent_urssaf') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col justify-center">
        <label for="interval">Période</label>
        <input type="number" id="" wire:model.debounce.500ms='interval' value="{{ ('interval') }}">
        @error('interval') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
</div>
