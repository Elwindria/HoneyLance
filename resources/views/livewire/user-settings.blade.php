<div class="flex flex-col gap-6 w-4/12 m-auto mt-10">
    @if($this->message_user_setting === null)
        <div class="flex flex-col justify-center">
            <label for="urssaf_setting_id">Pourcentage Urssaf par défaut</label>
            <select name="urssaf_setting_id" id="urssaf_setting_id" wire:model.debounce.500ms='urssaf_setting_id'>
                <option value="">--SVP Choissisez une option--</option>
                @foreach($this->urssaf_settings as $urssaf_setting)
                    <option value="{{ $urssaf_setting->id }}">{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                @endforeach
            </select>
            @error('urssaf_setting_id') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
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
        <livewire:tags>
    @else
        <p>{{ $this->message_user_setting }}</p>
    @endif
</div>
