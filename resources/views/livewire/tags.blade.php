<div class='flex flex-col gap-6 w-4/12 m-auto mt-10'>
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
            @foreach(auth()->user()->tags as $tag)
            <input type=radio name="name" wire:model='selected_tag' value="{{ $tag->id }}">
            <label for="name">{{ $tag->name_tag }}</label>
            @endforeach
            @error('selected_tag') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class='mt-3'>
            <button wire:click="new()" class="btn btn-primary btn-sm">Nouveau</button>
            <button wire:click="edit()" class="btn btn-primary btn-sm">Modifier</button>
            <button wire:click="delete()" class="btn btn-danger btn-sm">Suprimmer</button>
        </div>
    @endif
</div>
