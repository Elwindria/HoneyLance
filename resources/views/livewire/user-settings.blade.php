<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @toastScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <livewire:toasts />
    <livewire:scripts />
    <livewire:styles />
    <div class="relative items-top min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
        <h1>Profil utilisateur</h1>
        <div class="mt-16">
            <div>
                <label for="prefUrssaf">Poucentage Urssaf préféré</label>
                <input type="text" id="prefUrssaf" wire:model="prefUrssaf">
                @error('prefUrssaf') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button wire:click="prefUrssaf" class="btn btn-primary btn-sm">valider</button>
        </div>
    </div>
</body>

