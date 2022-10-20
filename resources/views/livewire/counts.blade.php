<div class="flex flex-col mx-auto max-w-5xl pt-6 px-4 sm:px-8 gap-4">
    <div class="flex justify-between">
        <div class="flex flex-col items-center">
            <h2 class="text-honey text-lg font-bold">Recette</h2>
            <div class="flex flex-col items-center">
                <p class="text-red-600 font-medium"> -500€</p>
                <p class="text-honey-dark font-thin text-xs -mt-2">mois en cours</p>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <h2 class="text-honey text-lg font-bold">Salaire</h2>
            <p class="text-emerald-600 font-medium">1500€</p>
        </div>
        <div class="flex flex-col items-center">
            <h2 class="text-honey text-lg font-bold">Epargne</h2>
            <div class="flex flex-col items-center">
                <p class="text-emerald-600 font-medium">2500€</p>
                <p class="text-honey-dark font-thin text-xs -mt-2">mois en cours</p>
            </div>
        </div>
    </div>
    <div class="flex justify-around">
        <a href="{{ route('trades-list') }}" class="{{ request()->routeIs('trades-list') ? 'border-honey-dark hover:border-honey-light' : 'border-transparent' }} border-b-2 relative px-3 py-2 text-honey-dark hover:text-honey-light">
            <svg width="36" height="36" viewBox="0 0 20 20">
                <path fill="currentColor" stroke-width="0.5" stroke="currentColor" d="M7.354 13.854L9 12.207a.5.5 0 1 0-.707-.707l-.793.793V6.5a.5.5 0 0 0-1 0v5.793l-.793-.793a.5.5 0 1 0-.707.707l1.646 1.647a.5.5 0 0 0 .708 0ZM15 7.793l-1.646-1.647a.5.5 0 0 0-.708 0L11 7.793a.5.5 0 1 0 .707.707l.793-.793V13.5a.5.5 0 1 0 1 0V7.707l.793.793A.5.5 0 1 0 15 7.793ZM18 10a8 8 0 1 1-16 0a8 8 0 0 1 16 0Zm-8 7a7 7 0 1 0 0-14a7 7 0 0 0 0 14Z"/>
            </svg>
        </a>
        <a href="{{ route('trade-store', ['trade_id' => null]) }}" class="{{ Str::contains($this->url, 'trade/') || Str::endsWith($this->url, 'trade') ? 'border-honey-dark hover:border-honey-light' : 'border-transparent' }} border-b-2 relative px-3 py-2 text-honey-dark hover:text-honey-light">
            <svg width="36" height="36" viewBox="0 0 24 24">
                <g fill="none">
                <path d="M0 0h24v24H0z"/>
                <path fill="currentColor" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm0 2a8 8 0 1 0 0 16a8 8 0 0 0 0-16Zm0 3a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 0 1 1-1Z"/>
                </g>
            </svg>
        </a>
        <a href="#" class="relative px-3 py-2 text-honey-dark hover:text-honey-light">
            <svg width="36" height="36" viewBox="0 0 256 256">
                <path fill="currentColor" d="M128 20a108 108 0 1 0 108 108A108.1 108.1 0 0 0 128 20Zm0 192a84 84 0 1 1 84-84a84.1 84.1 0 0 1-84 84Zm20-36a12 12 0 0 1-12 12h-8a12 12 0 0 1-12-12v-40.7a11.9 11.9 0 0 1-8-11.3a12 12 0 0 1 12-12h8a12 12 0 0 1 12 12v40.7a11.9 11.9 0 0 1 8 11.3Zm-38-92a16 16 0 1 1 16 16a16 16 0 0 1-16-16Z"/>
            </svg>
        </a>
    </div>
</div>
