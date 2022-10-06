<div class="flex flex-col gap-6 w-4/12 m-auto mt-10">
    @if($this->message_user_setting === null)
        <div class="flex flex-col justify-center">
            <label for="fav_percent">Pourcentage Urssaf par défaut</label>
            <select name="fav_percent" id="fav_percent" wire:model.debounce.500ms='fav_percent'>
                <option value="">--SVP Choissisez une option--</option>
                @foreach($this->urssaf_settings as $urssaf_setting)
                    <option value="{{ $urssaf_setting->percentage }}">{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                @endforeach
            </select>
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
    @else
        <p>{{ $this->message_user_setting }}</p>
    @endif
</div>
