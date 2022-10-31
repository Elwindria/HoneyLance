<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\Trade;
use App\Models\User;
use App\Models\Saving;

use Carbon\Carbon;

class Informations extends Component
{
    public function mount()
    {
        $this->url = url()->current();

        $this->trades = Trade::where('user_id', auth()->user()->id)->whereIn('type', ['in', 'out'])->get();

        $positive = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $negative = Trade::where('user_id', auth()->user()->id)->where('type', 'out')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $this->recipe = $positive - $negative;

        $salary = auth()->user()->setting->salary;
        $saving = Saving::where('user_id', auth()->user()->id)->whereMonth('date', Carbon::now()->month)->first();
        $urssaf_percent_average = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->avg('urssaf_percent');

        //Total somme à donner à l'Urssaf
        $this->total_urssaf = ($positive * $urssaf_percent_average)/100;

        //épargne pour le mois en cours
        $this->saving = $saving->count + $this->recipe - $salary - $this->total_urssaf;

        //Objectif épargne (soit 6 mois de salaire)
        $this->objective_saving = 6 * $salary;
        
        //Calcul de combien il faut encore pour atteindre cet objective_saving
        $this->still_need_objective_saving = $this->objective_saving - $this->saving;

        //calcul du nombre de mois pour atteindre cet objective_saving
        $this->year_savings = Saving::where('user_id', auth()->user()->id)->whereYear('date', Carbon::now()->year)->sum('count');
        $this->year_saving_average = Saving::where('user_id', auth()->user()->id)->whereYear('date', Carbon::now()->year)->avg('count');

    }   

    public function render()
    {
        return view('app.informations')->layout('layouts.app');
    }
}
