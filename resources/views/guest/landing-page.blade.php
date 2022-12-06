<x-guest-layout>

    {{-- <nav class="sticky top-0 z-50 rounded-b-3xl bg-white md:max-w-7xl md:mx-auto">
        <div class="mx-auto max-w-7xl px-2 sm:px-3 lg:px-4 relative z-50 flex justify-between py-2 sm:py-3 lg:py-4">
            <div class="relative z-50 flex items-center">
                <a href="{{ route('trades-list')}}" class="flex items-center gap-1">
                    <img class="h-8 w-8 rounded-md shadow-sm" src="{{ asset('appImages/maskable/maskable_icon_x72.png')}}" alt="logo d'HoneyLance, une ruche dans un carré blanc, lui même dans un carré orange">
                    <p class='text-honey-dark font-bold text-xl'>Honey<span class="text-honey">lance</span></p>
                </a>
            </div>
            <div class="lg:flex hidden items-center gap-4">
                <a href="{{ route('login') }}" class="inline-flex uppercase justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-honey text-gray-700 hover:border-darkHoney active:bg-darkHoney active:text-darkHoney lg:block">Se connecter</a>
                <a href="{{ route('register') }}" class="inline-flex uppercase justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-honey text-white lg:block">inscription</a>
            </div>
            <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="lg:hidden relative inline-block text-left">
                <div>
                    <button @click="open = !open" type="button" aria-label="menu" class="relative group flex p-1 items-center rounded-full text-king hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-honey focus:ring-offset-2 focus:ring-offset-honey">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-50 mt-2 origin-top-right rounded-3xl bg-white shadow-lg focus:outline-none">
                    <div class="py-1 z-50" role="none">
                        <a href="{{ route('login') }}" class="flex items-center py-3 px-4 text-king text-lg font-semibold whitespace-nowrap" @click="open = false">
                            <svg width="32" height="32" class="h-4 w-4 mr-2" viewBox="0 0 24 24">
                                <path d="M12 3c-4.625 0-8.442 3.507-8.941 8.001H10v-3l5 4l-5 4v-3H3.06C3.56 17.494 7.376 21 12 21c4.963 0 9-4.037 9-9s-4.037-9-9-9z" fill="currentColor" />
                            </svg>
                            Se connecter
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center py-3 px-4 text-king text-lg font-semibold whitespace-nowrap" @click="open = false">
                            <svg width="32" height="32" class="h-4 w-4 mr-2" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 14q-.425 0-.712-.288Q18 13.425 18 13v-2h-2q-.425 0-.712-.288Q15 10.425 15 10t.288-.713Q15.575 9 16 9h2V7q0-.425.288-.713Q18.575 6 19 6t.712.287Q20 6.575 20 7v2h2q.425 0 .712.287Q23 9.575 23 10t-.288.712Q22.425 11 22 11h-2v2q0 .425-.288.712Q19.425 14 19 14ZM9 12q-1.65 0-2.825-1.175Q5 9.65 5 8q0-1.65 1.175-2.825Q7.35 4 9 4q1.65 0 2.825 1.175Q13 6.35 13 8q0 1.65-1.175 2.825Q10.65 12 9 12Zm-7 8q-.425 0-.712-.288Q1 19.425 1 19v-1.8q0-.85.438-1.563q.437-.712 1.162-1.087q1.55-.775 3.15-1.163Q7.35 13 9 13t3.25.387q1.6.388 3.15 1.163q.725.375 1.162 1.087Q17 16.35 17 17.2V19q0 .425-.288.712Q16.425 20 16 20Z" />
                            </svg>
                            S'inscrire
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav> --}}

    <div class="">

        <section>
            <nav class="flex justify-between items-center bg-white py-6 md:px-10 px-4 relative">
                <a href="{{ route('index')}}" class="flex items-center gap-2">
                    <img class="lg:h-12 h-9 rounded-md shadow-sm" src="{{ asset('appImages/maskable/maskable_icon_x72.png')}}" alt="logo d'HoneyLance, une ruche dans un carré blanc, lui même dans un carré orange">
                    <p class='text-honey-dark font-bold lg:text-3xl text-xl'>Honey<span class="text-honey">lance</span></p>
                </a>
                <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="lg:hidden relative inline-block text-left">
                    <div>
                        <button @click="open = !open" type="button" aria-label="menu" class="relative group flex p-1 border-2 border-king/50 shadow-sm items-center rounded text-king hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-honey focus:ring-offset-2 focus:ring-offset-honey">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-50 mt-2 origin-top-right border-2 border-king/50 rounded-xl bg-white shadow focus:outline-none">
                        <div class="py-1 z-50" role="none">
                            <a href="{{ route('login') }}" class="flex items-center py-3 px-4 text-king text-lg font-semibold whitespace-nowrap" @click="open = false">
                                <svg width="32" height="32" class="h-6 w-6 mr-2" viewBox="0 0 24 24">
                                    <path d="M12 3c-4.625 0-8.442 3.507-8.941 8.001H10v-3l5 4l-5 4v-3H3.06C3.56 17.494 7.376 21 12 21c4.963 0 9-4.037 9-9s-4.037-9-9-9z" fill="currentColor" />
                                </svg>
                                Se connecter
                            </a>
                            <a href="{{ route('register') }}" class="flex items-center py-3 px-4 text-king text-lg font-semibold whitespace-nowrap" @click="open = false">
                                <svg width="32" height="32" class="h-6 w-6 mr-2" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19 14q-.425 0-.712-.288Q18 13.425 18 13v-2h-2q-.425 0-.712-.288Q15 10.425 15 10t.288-.713Q15.575 9 16 9h2V7q0-.425.288-.713Q18.575 6 19 6t.712.287Q20 6.575 20 7v2h2q.425 0 .712.287Q23 9.575 23 10t-.288.712Q22.425 11 22 11h-2v2q0 .425-.288.712Q19.425 14 19 14ZM9 12q-1.65 0-2.825-1.175Q5 9.65 5 8q0-1.65 1.175-2.825Q7.35 4 9 4q1.65 0 2.825 1.175Q13 6.35 13 8q0 1.65-1.175 2.825Q10.65 12 9 12Zm-7 8q-.425 0-.712-.288Q1 19.425 1 19v-1.8q0-.85.438-1.563q.437-.712 1.162-1.087q1.55-.775 3.15-1.163Q7.35 13 9 13t3.25.387q1.6.388 3.15 1.163q.725.375 1.162 1.087Q17 16.35 17 17.2V19q0 .425-.288.712Q16.425 20 16 20Z" />
                                </svg>
                                S'inscrire
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="hidden xl:flex absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <li><a class="text-lg mr-10 2xl:mr-16 font-extrabold hover:text-king/80" href="#">Accueil</a></li>
                    <li><a class="text-lg mr-10 2xl:mr-16 font-extrabold hover:text-king/80" href="#">Fonctionnalités</a></li>
                    <li><a class="text-lg mr-10 2xl:mr-16 font-extrabold hover:text-king/80" href="#">Tarif</a></li>
                </ul>
                <div class="hidden xl:flex items-center">
                    <a class="inline-block mr-6 text-lg font-extrabold hover:text-king/80" href="{{ route('login') }}">Se Connecter</a>
                    <a class="inline-block py-4 px-6 text-center leading-6 text-lg text-white font-extrabold bg-honey hover:bg-king border-3 border-king shadow rounded transition duration-200" href="{{ route('register') }}">S'inscrire</a>
                </div>
            </nav>
        </section>

        <section class="py-26 bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full lg:w-1/2 px-4 mb-14 lg:mb-0">
                        <div class="max-w-xl mx-auto">
                            <h1 class="text-3xl md:text-4xl font-extrabold font-heading">Gérer ton <span class="inline-block px-2 py-1 relative bg-honey text-white" style="border-radius: 91% 9% 90% 10% / 29% 82% 18% 71%">salaire</span> <br> de freelance</h1>
                            <h1 class="text-2xl font-extrabold tracking-tight">n'aura jamais été aussi facile 💖</h1>
                            <p class="text-xl font-extrabold leading-7 mt-8 mb-6">Ne te laisse plus submerger par ta compta ! <br> Avec <strong>Honeylance</strong>, tu sais exactement où tu en est dans tes comptes et ce que tu peux te <strong>verser comme salaire</strong> ce mois-ci 😀</p>
                            <div class="lg:flex">
                                <a class="inline-block mr-4" href="#">
                                    <img src="{{ asset('nigodo-assets/apps/appstore.svg') }}" alt="">
                                </a>
                                <a class="inline-block" href="#">
                                    <img src="{{ asset('nigodo-assets/apps/google.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 px-4">
                        <img class="block mx-auto" src="{{ asset('nigodo-assets/apps/two-phones.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-26 bg-orange-200">
            <div class="container px-4 mx-auto relative">
                <div class="max-w-5xl mx-auto mb-16 text-center">
                    <span class="text-lg font-extrabold text-orange-500">Fonctionnalités</span>
                    <h1 class="text-3xl md:text-4xl font-extrabold font-heading mt-4 mb-6">Gain more insight into how people use your</h1>
                    <p class="text-xl font-extrabold leading-8">With our integrated CRM, project management, collaboration and invoicing capabilities, you can manage every aspect of your business in one secure platform.</p>
                </div>
                <div class="flex flex-wrap -mx-4 -mb-12">
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                        <div class="h-full py-12 px-8 bg-white border-3 border-king shadow-md rounded-2xl text-center">
                            <img class="block mx-auto mb-4" src="{{ asset('nigodo-assets/features/icon-message.svg') }}" alt="">
                            <h4 class="text-2xl font-extrabold mb-4">Measure your performance</h4>
                            <p class="text-lg font-extrabold leading-7">Stay connected with your team and make quick decisions wherever you are.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                        <div class="h-full py-12 px-8 bg-white border-3 border-king shadow-md rounded-2xl text-center">
                            <img class="block mx-auto mb-4" src="{{ asset('nigodo-assets/features/icon-bar.svg') }}" alt="">
                            <h4 class="text-2xl font-extrabold mb-4">Custom analytics</h4>
                            <p class="text-lg font-extrabold leading-7">Get a complete sales dashboard in the cloud. See activity, revenue and social metrics all in one place.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                        <div class="h-full py-12 px-8 bg-white border-3 border-king shadow-md rounded-2xl text-center">
                            <img class="block mx-auto mb-4" src="{{ asset('nigodo-assets/features/icon-people.svg') }}" alt="">
                            <h4 class="text-2xl font-extrabold mb-4">Team Management</h4>
                            <p class="text-lg font-extrabold leading-7">Our calendar lets you know what is happening with customer and projects so you.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                        <div class="h-full py-12 px-8 bg-white border-3 border-king shadow-md rounded-2xl text-center">
                            <img class="block mx-auto mb-4" src="{{ asset('nigodo-assets/features/icon-write.svg') }}" alt="">
                            <h4 class="text-2xl font-extrabold mb-4">Build your website</h4>
                            <p class="text-lg font-extrabold leading-7">A tool that lets you build a dream website even if you know nothing about web design or programming.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                        <div class="h-full py-12 px-8 bg-white border-3 border-king shadow-md rounded-2xl text-center">
                            <img class="block mx-auto mb-4" src="{{ asset('nigodo-assets/features/icon-box.svg') }}" alt="">
                            <h4 class="text-2xl font-extrabold mb-4">Connect multiple apps</h4>
                            <p class="text-lg font-extrabold leading-7">The first business platform to bring together all of your products from one place.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                        <div class="h-full py-12 px-8 bg-white border-3 border-king shadow-md rounded-2xl text-center">
                            <img class="block mx-auto mb-4" src="{{ asset('nigodo-assets/features/icon-settings.svg') }}" alt="">
                            <h4 class="text-2xl font-extrabold mb-4">Easy setup</h4>
                            <p class="text-lg font-extrabold leading-7">End to End Business Platform, Sales Management, Marketing Automation, Help Desk</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-26 bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap -mx-4 items-center">
                    <div class="w-full lg:w-3/5 px-4 mb-8 lg:mb-0">
                        <span class="text-lg font-extrabold text-indigo-500">Section label</span>
                        <h1 class="text-3xl md:text-4xl font-extrabold font-heading mt-4 mb-4">The fastest way from idea to live site. Period.</h1>
                        <p class="text-xl font-extrabold leading-8">Nigodo is a Small SaaS Business. Flex isn’t a traditional company.</p>
                    </div>
                    <div class="w-full lg:w-2/5 px-4">
                        <div class="flex flex-wrap items-center lg:justify-end"><a class="inline-block w-full xl:w-auto py-4 px-6 mb-4 xl:mb-0 xl:mr-4 text-center leading-6 text-lg text-white font-extrabold bg-king/80 hover:bg-king border-3 border-king shadow rounded transition duration-200" href="#">Request a demo</a><a class="inline-block w-full xl:w-auto py-4 px-6 text-center leading-6 text-lg text-king hover:text-white font-extrabold bg-white hover:bg-king/80 border-3 border-king shadow rounded transition duration-200" href="#">Learn More</a></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-26 bg-orange-200">
            <div class="container px-4 mx-auto">
                <div class="text-center mb-14">
                    <span class="text-lg font-extrabold text-orange-500">Section label</span>
                    <h1 class="text-3xl md:text-4xl font-extrabold font-heading mt-4 mb-6">Flexible pricing plan for your startup</h1>
                    <div class="flex items-center justify-center">
                        <span class="sm:text-xl font-extrabold">Billed Monthly</span>
                        <div class="inline-flex w-16 h-10 mx-4 px-px items-center bg-white border-3 border-king rounded-full shadow">
                            <button class="w-7 h-7 border-3 border-king bg-green-200 rounded-full"></button>
                            <button class="w-7 h-7 rounded-full focus:outline-none"></button>
                        </div>
                        <span class="sm:text-xl font-extrabold">Billed Annually</span>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-1/2 px-4 mb-12 lg:mb-0">
                        <div class="flex flex-col h-full bg-white border-3 border-king rounded-2xl shadow-md">
                            <div class="flex flex-wrap justify-between items-center px-6 lg:px-12 py-12 border-b-3 border-king">
                                <div class="mb-4 w-full sm:w-1/2 sm:mb-0">
                                    <h2 class="text-2xl font-extrabold">Basic plan</h2>
                                    <p class="text-lg font-extrabold leading-7">For bigger teams</p>
                                </div>
                                <div class="flex w-full sm:w-auto items-start">
                                    <span class="pr-1 text-lg font-extrabold">$</span>
                                    <span class="text-4xl md:text-5xl font-extrabold">89</span>
                                    <span class="pl-1 text-lg font-extrabold self-end">/mo</span>
                                </div>
                            </div>
                            <div class="mb-auto py-12 px-6 lg:px-12">
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">Access to all features</span>
                                </div>
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">Assisted onboarding support</span>
                                </div>
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">CPM Overage: Unlimited</span>
                                </div>
                                <div class="flex items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">Program reviews 1x a month</span>
                                </div>
                            </div>
                            <div class="py-10 px-6 lg:px-12 border-t-3 border-king"><a class="inline-block w-full py-4 px-6 text-center leading-6 text-lg text-white font-extrabold bg-king/80 hover:bg-king border-3 border-king shadow rounded transition duration-200" href="#">Get Started</a></div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 px-4">
                        <div class="flex flex-col h-full bg-white border-3 border-king rounded-2xl shadow-md">
                            <div class="flex flex-wrap justify-between items-center px-6 lg:px-12 py-12 border-b-3 border-king">
                                <div class="mb-4 w-full sm:w-1/2 sm:mb-0">
                                    <h2 class="text-2xl font-extrabold">Basic plan</h2>
                                    <p class="text-lg font-extrabold leading-7">For bigger teams</p>
                                </div>
                                <div class="flex w-full sm:w-auto items-start">
                                    <span class="pr-1 text-lg font-extrabold">$</span>
                                    <span class="text-4xl md:text-5xl font-extrabold">189</span>
                                    <span class="pl-1 text-lg font-extrabold self-end">/mo</span>
                                </div>
                            </div>
                            <div class="mb-auto py-12 px-6 lg:px-12">
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">Access to all features</span>
                                </div>
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">Assisted onboarding support</span>
                                </div>
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">CPM Overage: Unlimited</span>
                                </div>
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">Access to all features</span>
                                </div>
                                <div class="flex mb-4 items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">CPM Overage: Unlimited</span>
                                </div>
                                <div class="flex items-center">
                                    <img class="block w-6 h-6 mr-2 object-contain" src="{{ asset('nigodo-assets/circle-icon-green.svg') }}" alt="">
                                    <span class="text-lg font-extrabold">Program reviews 1x a month</span>
                                </div>
                            </div>
                            <div class="py-10 px-6 lg:px-12 border-t-3 border-king"><a class="inline-block w-full py-4 px-6 text-center leading-6 text-lg text-white font-extrabold bg-king/80 hover:bg-king border-3 border-king shadow rounded transition duration-200" href="#">Get Started</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="pt-26 border-3 border-l-0 border-r-0 border-king">
                <div class="pb-16 border-b-3 border-king">
                    <div class="container px-4 mx-auto">
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="w-full md:w-1/3 mb-12">
                                <a class="inline-block mx-auto mb-8" href="#">
                                    <img class="h-12" src="{{ asset('nigodo-assets/logo-nigodo.svg') }}" alt="">
                                </a>
                                <p class="max-w-xs text-lg font-extrabold leading-8">Launch your own Software as a Service Application with Nigodo Solutions.</p>
                            </div>
                            <div class="w-full md:w-1/3 mb-12 md:text-right">
                                <div class="mb-4">
                                    <a class="inline-block w-auto" href="#">
                                        <img src="{{ asset('nigodo-assets/footers/google-play.svg') }}" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a class="inline-block w-auto" href="#">
                                        <img src="{{ asset('nigodo-assets/footers/app-store.svg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex flex-wrap items-center -mb-6"><a class="inline-block mr-4 sm:mr-8 lg:mr-16 mb-6 text-lg font-extrabold hover:text-king/80" href="#">Product</a><a class="inline-block mr-4 sm:mr-8 lg:mr-16 mb-6 text-lg font-extrabold hover:text-king/80" href="#">Features</a><a class="inline-block mr-4 sm:mr-8 lg:mr-16 mb-6 text-lg font-extrabold hover:text-king/80" href="#">Pricing</a><a class="inline-block mr-4 sm:mr-8 lg:mr-16 mb-6 text-lg font-extrabold hover:text-king/80" href="#">Resources</a><a class="inline-block mr-4 sm:mr-8 lg:mr-16 mb-6 text-lg font-extrabold hover:text-king/80" href="#">Carrers</a><a class="inline-block mr-4 sm:mr-8 lg:mr-16 mb-6 text-lg font-extrabold hover:text-king/80" href="#">Help</a><a class="inline-block mb-6 text-lg font-extrabold hover:text-king/80" href="#">Privacy</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container px-4 pt-16 pb-24 mx-auto">
                    <div class="flex flex-wrap justify-between">
                        <div class="w-full lg:w-auto mb-12 lg:mb-0">
                            <p class="text-center text-lg font-extrabold">© 2022 Nigodo. All rights reserved.</p>
                        </div>
                        <div class="w-full lg:w-auto flex items-center justify-center">
                            <a class="inline-block text-king hover:text-king/80 mr-8" href="#">
                                <svg width="17" height="30" viewbox="0 0 17 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7247 29.5454V16.2767H15.2637L15.9446 11.1041H10.7247V7.80212C10.7247 6.305 11.1469 5.28473 13.3381 5.28473L16.1284 5.28361V0.657045C15.6458 0.59554 13.9895 0.454529 12.0616 0.454529C8.03601 0.454529 5.28 2.86466 5.28 7.28983V11.1041H0.727295V16.2767H5.28V29.5454H10.7247Z" fill="currentColor"></path>
                                </svg>
                            </a>
                            <a class="inline-block text-king hover:text-king/80 mr-8" href="#">
                                <svg width="32" height="26" viewbox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M31.3636 3.24326C30.2259 3.74735 29.0053 4.08922 27.7228 4.24185C29.0323 3.45765 30.0347 2.21382 30.5098 0.73624C29.2814 1.46245 27.9255 1.98978 26.4808 2.27563C25.3239 1.04144 23.6783 0.272705 21.853 0.272705C18.3513 0.272705 15.5121 3.11195 15.5121 6.61175C15.5121 7.10811 15.5681 7.59291 15.6762 8.05649C10.4073 7.79185 5.73508 5.26745 2.60806 1.43154C2.06145 2.36639 1.75049 3.45569 1.75049 4.61846C1.75049 6.81841 2.87074 8.75952 4.57044 9.89518C3.5313 9.86043 2.55397 9.57457 1.69837 9.09942V9.17862C1.69837 12.2496 3.88478 14.8127 6.78387 15.396C6.25271 15.5389 5.69261 15.6181 5.11317 15.6181C4.70372 15.6181 4.30776 15.5776 3.91953 15.5003C4.72685 18.0208 7.06781 19.8538 9.8414 19.904C7.67236 21.6037 4.93741 22.6139 1.96685 22.6139C1.45503 22.6139 0.950892 22.583 0.454529 22.5269C3.26094 24.329 6.59271 25.3797 10.1736 25.3797C21.8377 25.3797 28.2134 15.7186 28.2134 7.33993L28.1922 6.51907C29.4379 5.63053 30.5156 4.51417 31.3636 3.24326Z" fill="currentColor"></path>
                                </svg>
                            </a>
                            <a class="inline-block text-king hover:text-king/80" href="#">
                                <svg width="34" height="34" viewbox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.6677 0.636353H24.3319C29.3122 0.636353 33.3638 4.68801 33.3636 9.6679V24.3321C33.3636 29.312 29.3122 33.3636 24.3319 33.3636H9.6677C4.68782 33.3636 0.636353 29.3122 0.636353 24.3321V9.6679C0.636353 4.68801 4.68782 0.636353 9.6677 0.636353ZM24.3321 30.4599C27.711 30.4599 30.4601 27.711 30.4601 24.3321H30.4599V9.6679C30.4599 6.28913 27.7109 3.54007 24.3319 3.54007H9.6677C6.28893 3.54007 3.54007 6.28913 3.54007 9.6679V24.3321C3.54007 27.711 6.28893 30.4601 9.6677 30.4599H24.3321ZM8.42856 17.0002C8.42856 12.2737 12.2736 8.42856 17 8.42856C21.7263 8.42856 25.5714 12.2737 25.5714 17.0002C25.5714 21.7265 21.7263 25.5714 17 25.5714C12.2736 25.5714 8.42856 21.7265 8.42856 17.0002ZM11.38 17C11.38 20.0988 13.9012 22.6198 17 22.6198C20.0988 22.6198 22.62 20.0988 22.62 17C22.62 13.901 20.099 11.3798 17 11.3798C13.901 11.3798 11.38 13.901 11.38 17Z" fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</x-guest-layout>
