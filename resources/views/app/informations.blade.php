<div>

    @livewire('app.counts')

    <div class="flex flex-col gap-4">

        @if(auth()->user()->setting->date_start == null)
        <div class="flex flex-col max-w-3xl px-4 sm:px-8 mt-4">
            <p class="text-king text-lg font-semibold flex items-center gap-1">
                <svg width="32" height="32" class="h-6 w-6 mr-2 text-red-600" viewBox="0 0 24 24">
                    <g fill="currentColor">
                        <path d="M12 6a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0V7a1 1 0 0 1 1-1Zm0 10a1 1 0 1 0 0 2a1 1 0 0 0 0-2Z" />
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM4 12a8 8 0 1 0 16 0a8 8 0 0 0-16 0Z" clip-rule="evenodd" />
                    </g>
                </svg>
                Date de création entreprise inconnu
            </p>
            <p class="text-xs text-king/50 indent-8">renseignez là dans vos paramètres</p>
        </div>
        @endif

        <div class="mx-auto max-w-5xl pt-10 px-4 sm:px-8 flex justify-center">
            <h2 class="text-honey-dark text-xl font-bold flex items-center gap-1">
                <svg width="32" height="32" class="h-6 w-6 mr-2" viewBox="0 0 2048 2048">
                    <path fill="currentColor" stroke-width="2" stroke="currentColor" d="M576 768q26 0 45 19t19 45q0 26-19 45t-45 19q-26 0-45-19t-19-45q0-26 19-45t45-19zm1102-324q84 39 152 99t117 137t75 163t26 181q0 79-18 154t-51 144t-80 130t-107 113v163q0 40-15 75t-41 61t-61 41t-75 15h-128q-30 0-58-9t-53-26t-42-40t-28-53h-278q-10 29-28 52t-42 41t-52 26t-59 9H704q-40 0-75-15t-61-41t-41-61t-15-75v-80q-68-18-128-53t-109-84t-82-109t-51-129q-32-8-58-26t-44-42t-29-55t-11-62V960q0-34 11-65t33-57t49-43t63-24q74-104 162-194t194-162V57l399 199h123q14-56 45-103t74-81t96-53t111-19q69 0 130 26t107 72t72 107t27 131q0 56-18 108zm-318-316q-43 0-81 16t-66 45t-44 66t-17 81q0 35 10 65l342 85q30-29 47-68t17-82q0-43-16-81t-45-66t-66-44t-81-17zm304 1378q57-46 104-99t81-113t52-127t19-143q0-76-22-147t-62-133t-96-109t-126-80q-17 21-37 38t-44 32l-462-115q-15-31-27-61t-17-65H881L640 264v218q-70 47-126 91t-104 93t-92 104t-92 126q-17 0-34 1t-32 8t-23 19t-9 36v128q0 26 19 45t45 19h64q0 80 30 149t82 122t122 83t150 30v192q0 26 19 45t45 19h128q26 0 45-19t19-45v-64h512v40q0 22 4 42t18 33t42 13h128q26 0 45-19t19-45v-222z" />
                </svg>
                Epargne
            </h2>
        </div>

        <div class="flex flex-col rounded-3xl bg-white gap-4 py-6 max-w-3xl px-4 sm:px-8">
            <div class="flex justify-between items-center">
                <p class="text-king text-lg font-semibold indent-4">Epargne actuelle</p>
                @if ($this->last_saving != null)
                <p class="{{ ($this->last_saving->count > 0) ? 'text-emerald-600' : 'text-red-600' }} font-medium">{{ number_format($this->last_saving->count, 0, ',', ' ') }} €</p>
                @else
                <p class="text-red-600 font-medium">Pas assez de données</p>
                @endif
            </div>
            <div class="flex justify-between items-center">
                <p class="text-king text-lg font-semibold indent-4">Prévision <span class="text-xs text-king/50">pour la fin du mois</span></p>
                <p class="{{ ($this->saving > 0) ? 'text-emerald-600' : 'text-red-600' }} font-medium">{{ number_format($this->saving, 0, ',', ' ') }} €</p>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-king text-lg font-semibold indent-4">Epargne moyenne gagnée <span class="text-xs text-king/50">par mois</span></p>
                @if($this->avg_saving === 'too few data')
                <svg width="32" height="32" class="h-6 w-6 text-red-600" viewBox="0 0 24 24">
                    <g fill="currentColor">
                        <path d="M12 6a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0V7a1 1 0 0 1 1-1Zm0 10a1 1 0 1 0 0 2a1 1 0 0 0 0-2Z" />
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM4 12a8 8 0 1 0 16 0a8 8 0 0 0-16 0Z" clip-rule="evenodd" />
                    </g>
                </svg>
                @else
                <p class="{{ ($this->avg_saving >= 0) ? 'text-emerald-600' : 'text-red-600' }} font-medium">{{ number_format($this->avg_saving, 0, ',', ' ') }} €</p>
                @endif
            </div>

        </div>

        <div class="mx-auto max-w-5xl pt-10 px-4 sm:px-8 flex justify-center">
            <h2 class="text-honey-dark text-xl font-bold flex items-center gap-1">
                <svg width="32" height="32" class="h-6 w-6 mr-2" viewBox="0 0 2048 2048">
                    <path fill="currentColor" stroke-width="2" stroke="currentColor" d="M576 768q26 0 45 19t19 45q0 26-19 45t-45 19q-26 0-45-19t-19-45q0-26 19-45t45-19zm1102-324q84 39 152 99t117 137t75 163t26 181q0 79-18 154t-51 144t-80 130t-107 113v163q0 40-15 75t-41 61t-61 41t-75 15h-128q-30 0-58-9t-53-26t-42-40t-28-53h-278q-10 29-28 52t-42 41t-52 26t-59 9H704q-40 0-75-15t-61-41t-41-61t-15-75v-80q-68-18-128-53t-109-84t-82-109t-51-129q-32-8-58-26t-44-42t-29-55t-11-62V960q0-34 11-65t33-57t49-43t63-24q74-104 162-194t194-162V57l399 199h123q14-56 45-103t74-81t96-53t111-19q69 0 130 26t107 72t72 107t27 131q0 56-18 108zm-318-316q-43 0-81 16t-66 45t-44 66t-17 81q0 35 10 65l342 85q30-29 47-68t17-82q0-43-16-81t-45-66t-66-44t-81-17zm304 1378q57-46 104-99t81-113t52-127t19-143q0-76-22-147t-62-133t-96-109t-126-80q-17 21-37 38t-44 32l-462-115q-15-31-27-61t-17-65H881L640 264v218q-70 47-126 91t-104 93t-92 104t-92 126q-17 0-34 1t-32 8t-23 19t-9 36v128q0 26 19 45t45 19h64q0 80 30 149t82 122t122 83t150 30v192q0 26 19 45t45 19h128q26 0 45-19t19-45v-64h512v40q0 22 4 42t18 33t42 13h128q26 0 45-19t19-45v-222z" />
                </svg>
                Epargne de précaution
            </h2>
        </div>

        <div class="flex flex-col rounded-3xl bg-white gap-4 py-6 max-w-3xl px-4 sm:px-8">
            <div class="flex justify-between">
                <p class="text-king text-lg font-semibold indent-4">Objectif <span class="text-xs text-king/50">6mois de salaire</span></p>
                {{-- abs retourne la valeur absolut (on enlève le signe -) --}}
                <p class="text-king font-medium">{{ number_format($this->objective_saving, 0, ',', ' ') }} €</p>
            </div>
            @if($this->still_need_objective_saving > 0)
            <div class="flex justify-between items-center">
                <p class="text-king text-lg font-semibold indent-4">Encore</p>
                <p class="text-red-600 font-medium">{{ number_format($this->still_need_objective_saving, 0, ',', ' ') }} €</p>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-king text-lg font-semibold indent-4">Estimation de temps <span class="text-xs text-king/50">en nombre de mois</span></p>
                @if($this->month_need_objective_saving === 'negative')
                <p class="text-king font-medium">---</p>
                @elseif($this->month_need_objective_saving === 'too few data')
                <svg width="32" height="32" class="h-6 w-6 text-red-600" viewBox="0 0 24 24">
                    <g fill="currentColor">
                        <path d="M12 6a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0V7a1 1 0 0 1 1-1Zm0 10a1 1 0 1 0 0 2a1 1 0 0 0 0-2Z" />
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM4 12a8 8 0 1 0 16 0a8 8 0 0 0-16 0Z" clip-rule="evenodd" />
                    </g>
                </svg>
                @else
                <p class="text-king font-medium">{{ ceil($this->month_need_objective_saving) }}</p>
                @endif
            </div>
            @else
            <div class="flex justify-between items-center">
                <p class="text-king text-lg font-semibold indent-4">Objectif atteint - Bonus</p>
                <p class="text-emerald-600 font-medium">{{ number_format(abs($this->still_need_objective_saving), 0, ',', ' ') }} €</p>
            </div>
            @endif
        </div>

    </div>

</div>
