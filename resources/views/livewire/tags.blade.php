<div>
    @if($isOpen)
    <div class="">
        <label for="nameTag">Nom</label>
        <input type="text" id="nameTag" wire:model="nameTag">
        @error('nameTag') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click="cancel()">Annuler</button>
    <button wire:click="store()">Valider</button>
    @else 
    <div>
        @foreach($allTag as $value)
        <input type=checkbox name="nameTag" value="{{ $value->id }}">
        <label for="nameTag">{{ $value->nameTag }}</label>
        @endforeach
    </div>
    <button wire:click="new()">Nouveau</button>
    <button wire:click="edit()">Modifier</button>
    <button wire:click="delete()">Suprimmer</button>
    @endif
</div>
