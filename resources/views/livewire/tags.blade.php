<div>
    @if($isOpen)
    <div class="">
        <label for="name">Nom</label>
        <input type="text" id="name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click="cancel()" class="btn btn-danger btn-sm">Annuler</button>
    <button wire:click="store()" class="btn btn-primary btn-sm">Valider</button>
    @else 
    <div>
        @foreach($allTag as $value)
        <input type=checkbox name="name" value="{{ $value->id }}">
        <label for="name">{{ $value->name }}</label>
        @endforeach
    </div>
    <button wire:click="new()" class="btn btn-primary btn-sm">Nouveau</button>
    <button wire:click="edit()" class="btn btn-primary btn-sm">Modifier</button>
    <button wire:click="delete()" class="btn btn-danger btn-sm">Suprimmer</button>
    @endif
</div>
