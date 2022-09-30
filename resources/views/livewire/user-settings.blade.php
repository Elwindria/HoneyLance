<div>
    <div class="flex flex-col justify-center">
        <label for="fav_percent">Pourcentage Urssaf par défaut</label>
        <input type="number" min='0' max='100' step='0.01' id="fav_percent" wire:model.debounce.500ms='fav_percent' value="{{ ('fav_percent') }}">
        @error('fav_percent') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col justify-center">
        <label for="salary">Salaire</label>
        <input type="number" min='0' id="salary" wire:model.debounce.500ms='salary' value="{{ ('salary') }}">
        @error('salary') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col justify-center">
        <label for="date_start">date de début d'activité</label>
        <input type="date" id="date_start" wire:model.debounce.500ms='date_start' value="{{ ('date_start') }}">
        @error('date_start') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
    </div>
</div>
