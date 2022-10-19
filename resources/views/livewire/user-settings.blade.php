<div class="flex flex-col gap-8 mt-2 py-6 mx-auto max-w-3xl px-4 sm:px-8">
    @if($this->message_user_setting === null)
        <div class="flex flex-col justify-center gap-1.5">
            <label for="urssaf_setting_id" class="text-king-600 text-lg font-semibold indent-4">Pourcentage Urssaf par défaut</label>
            <select name="urssaf_setting_id" id="urssaf_setting_id" wire:model.debounce.500ms='urssaf_setting_id' class="rounded-3xl border-king-600 border-2 h-11 bg-white text-king-600">
                <option value="">--SVP Choissisez une option--</option>
                @foreach($this->urssaf_settings as $urssaf_setting)
                    <option value="{{ $urssaf_setting->id }}">{{ $urssaf_setting->percentage }}% - {{ $urssaf_setting->description }}</option>
                @endforeach
            </select>
            @error('urssaf_setting_id') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </div>
        <div class="flex flex-col justify-center gap-1.5">
            <label for="salary" class="text-king-600 text-lg font-semibold indent-4">Salaire</label>
            <input type="number" min='0' id="salary" wire:model.debounce.500ms='salary' value="{{ ('salary') }}" class="rounded-3xl border-king-600 border-2 h-11 bg-white text-king-600">
            @error('salary') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </div>
        <div class="flex flex-col justify-center gap-1.5">
            <label for="date_start" class="text-king-600 text-lg font-semibold indent-4">Date de début d'activité</label>
            <input type="date" id="date_start" wire:model.debounce.500ms='date_start' value="{{ ('date_start') }}" class="rounded-3xl border-king-600 border-2 h-11 bg-white text-king-600">
            @error('date_start') <span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </div>
        <livewire:tags>
    @else
        <p>{{ $this->message_user_setting }}</p>
    @endif
</div>
