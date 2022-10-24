<x-guest-layout>

    <div class="relative z-10 flex items-center gap-16">
        <a href="{{ route('trades-list')}}">
            <img class="h-14 w-auto" src="{{ url('images/logo.png')}}">
        </a>
    </div>
    <div class="flex items-center gap-6">
        <a href="{{ route('login') }}" class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-honey text-gray-700 hover:border-darkHoney active:bg-darkHoney active:text-darkHoney lg:block">Log in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-darkHoney text-white hover:bg-darkHoney-900 active:bg-darkHoney active:text-white/80 lg:block">Register</a>
        @endif
    </div>
    
    <div class="flex flex-col gap-4 mt-2 py-6 mx-auto max-w-7xl px-4 sm:px-8 justify-center bg-cover bg-[url('https://management.dev/images/background-phone.png')] sm:bg-[url('https://management.dev/images/background-desktop.png')]">
        <div class="flex items-center justify-center gap-1 sm:gap-8">
            <p class="text-2xl text-honey-dark font-bold text-center">L'application de comptabilité pour les freelances !</p>
            <img src="{{ url('images/description-1.png') }}">
        </div>
        <div class="flex items-center h-[40rem] justify-center">
            <div class="flex flex-col gap-2 z-10 text-2xl text-honey-dark font-bold text-center border-honey-dark border-2 rounded-xl w-52">
                <p>Consultez</p>
                <p>Modifiez</p>
                <p>Ajoutez</p>
                <p>Triez</p>
                <p>toutes vos opérations monétaires</p>
            </div>
            <div class="overflow-hidden absolute w-full">
                <img class="w-[40rem] max-w-none" src="{{ url('images/description-2.png') }}">
            </div>
        </div>
        <div class="flex items-center gap-1 sm:gap-8">
            <img class="w-2/3" src="{{ url('images/description-3.png') }}">
            <p class="text-2xl text-honey-dark font-bold text-center">Et retrouvez toutes les informations qu'il vous faut !</p>
        </div>
        <div class="flex flex-col gap-2">
            <p class="text-2xl text-honey-dark font-bold text-center">Alors n'attendez plus et rejoignez nous</p>
            <button class="p-1 w-4/6 bg-honey border-honey-dark border-2 text-white text-2xl rounded-xl font-bold justify-self-center">S'inscrire</button>
        </div>
    </div>

</x-guest-layout>
