<div>
    @if($isOpen)
    <div>
        <label for="name_tag">Nom</label>
        <input type="text" id="name_tag" wire:model="name_tag">
        @error('name_tag') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click="cancel()" class="btn btn-danger btn-sm">Annuler</button>
    <button wire:click="store()" class="btn btn-primary btn-sm">Valider</button>
    @else 
    <div>
        @if($all_tag)
            @foreach($all_tag as $tag)
            <input type=checkbox name="name" wire:model='selected_tags' value="{{ $tag->name_tag }}">
            <label for="name">{{ $tag->name_tag }}</label>
            @endforeach
        @endif
    </div>
    <button wire:click="new()" class="btn btn-primary btn-sm">Nouveau</button>
    <button wire:click="edit()" class="btn btn-primary btn-sm">Modifier</button>
    <button wire:click="delete()" class="btn btn-danger btn-sm">Suprimmer</button>
    @endif
</div>
