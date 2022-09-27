<div>
    Tags !
    @if($isOpen)
    <div class="">
        <label for="nameTag">Nom</label>
        <input type="text" id="nameTag" wire:model="nameTag">
        @error('nameTag') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click="cancel()" class="btn btn-primary btn-sm">Annuler</button>
    <button wire:click="store()" class="btn btn-primary btn-sm">Valider</button>
    @else 
    <button wire:click="new()" class="btn btn-primary btn-sm">Nouveau</button>
    @endif
</div>
