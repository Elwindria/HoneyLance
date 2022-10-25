<x-guest-layout>
<div class="bg-cover bg-[url('https://management.dev/images/background-phone.png')] sm:bg-[url('https://management.dev/images/background-desktop.png')]"> 
    <nav class="sticky top rounded-b-3xl bg-white shadow-lg">
        <div class="mx-auto max-w-7xl px-2 sm:px-3 lg:px-4 relative z-50 flex justify-between py-2 sm:py-3 lg:py-4">
            <div class="relative z-10 flex items-center">
                <a href="{{ route('index')}}" class="flex items-center gap-1">
                    <img class="h-10 w-auto" src="{{ url('images/logo.png')}}">
                    <p class='text-honey-dark font-bold text-2xl'>Honey<span class="text-honey">lance</span></p>
                </a>
            </div>
            <div class="lg:flex hidden items-center gap-6">
                <a href="{{ route('login') }}" class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-honey text-gray-700 hover:border-darkHoney active:bg-darkHoney active:text-darkHoney lg:block">Log in</a>
                <a href="{{ route('register') }}" class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-darkHoney text-white hover:bg-darkHoney-900 active:bg-darkHoney active:text-white/80 lg:block">Register</a>
            </div>
            <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="lg:hidden relative inline-block text-left">
                <div>
                    <button @click="open = !open" type="button" class="relative group flex p-2 items-center rounded-full text-king hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-honey-300 focus:ring-offset-2 focus:ring-offset-honey-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-50 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1" role="none">
                        <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-sm text-gray-700" @click="open = false">
                            <svg width="32" height="32" class="h-4 w-4 mr-2" viewBox="0 0 24 24">
                                <path d="M12 3c-4.625 0-8.442 3.507-8.941 8.001H10v-3l5 4l-5 4v-3H3.06C3.56 17.494 7.376 21 12 21c4.963 0 9-4.037 9-9s-4.037-9-9-9z" fill="currentColor"/>
                            </svg>
                            Se connecter
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center px-4 py-2 text-sm text-gray-700" @click="open = false">
                            <svg width="32" height="32" class="h-4 w-4 mr-2" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 14q-.425 0-.712-.288Q18 13.425 18 13v-2h-2q-.425 0-.712-.288Q15 10.425 15 10t.288-.713Q15.575 9 16 9h2V7q0-.425.288-.713Q18.575 6 19 6t.712.287Q20 6.575 20 7v2h2q.425 0 .712.287Q23 9.575 23 10t-.288.712Q22.425 11 22 11h-2v2q0 .425-.288.712Q19.425 14 19 14ZM9 12q-1.65 0-2.825-1.175Q5 9.65 5 8q0-1.65 1.175-2.825Q7.35 4 9 4q1.65 0 2.825 1.175Q13 6.35 13 8q0 1.65-1.175 2.825Q10.65 12 9 12Zm-7 8q-.425 0-.712-.288Q1 19.425 1 19v-1.8q0-.85.438-1.563q.437-.712 1.162-1.087q1.55-.775 3.15-1.163Q7.35 13 9 13t3.25.387q1.6.388 3.15 1.163q.725.375 1.162 1.087Q17 16.35 17 17.2V19q0 .425-.288.712Q16.425 20 16 20Z"/>
                            </svg>
                            S'inscrire
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex flex-col gap-12 mt-2 py-6 mx-auto max-w-7xl px-4 sm:px-8 justify-center">
        <div class="flex items-center justify-center gap-1 sm:gap-8">
            <p class="text-2xl text-honey-dark font-bold text-center">L'application de comptabilité pour les freelances !</p>
            <img src="{{ url('images/description-1.png') }}">
        </div>
        <div class="flex flex-col">
            <div class="flex flex-col gap-2 z-10 text-2xl text-honey-dark font-bold text-center">
                <p>Consultez, modifiez, ajoutez, triez,</p>
                <p>toutes vos opérations monétaires</p>
            </div>
            <img class="" src="{{ url('images/description-2.png') }}">
        </div>
        <div class="flex items-center">
            <img class="w-7/12" src="{{ url('images/description-3.png') }}">
            <p class="text-2xl text-honey-dark font-bold text-center">Et retrouvez toutes les informations qu'il vous faut !</p>
        </div>
        <div class="flex flex-col gap-2">
            <p class="text-2xl text-honey-dark font-bold text-center">Alors n'attendez plus et rejoignez nous</p>
            <a href="{{ route('register') }}" class="p-1 w-4/6 bg-honey border-honey-dark border-2 text-white text-2xl rounded-3xl text-center font-bold justify-self-center m-auto hover:bg-white hover:text-honey">S'inscrire</a>
        </div>
    </div>
</div> 
</x-guest-layout>
