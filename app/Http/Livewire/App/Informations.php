<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\Trade;
use App\Models\User;
use App\Models\Saving;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Informations extends Component
{
    public $url;
    public $cost_urssaf = 0;

    public function mount()
    {
        $salary = auth()->user()->setting->salary;
        $saving = Saving::where('user_id', auth()->user()->id)->whereMonth('date', Carbon::now()->month)->first();

        $trades_in_taxable = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->whereNotNull('urssaf_percent')->get();

        $positive = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $negative = Trade::where('user_id', auth()->user()->id)->where('type', 'out')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $this->recipe = $positive - $negative;

        $this->cost_urssaf = 0;

        //Total somme à donner à l'Urssaf
        foreach ($trades_in_taxable as $trade_in_taxable) {
            $this->cost_urssaf += ($trade_in_taxable->cost * $trade_in_taxable->urssaf_percent)/100;
        }

        //épargne pour le mois en cours
        if($saving !== null){
            $this->saving = $saving->count + $this->recipe - $salary - $this->cost_urssaf;
        } else {
            $this->saving = $this->recipe - $salary - $this->cost_urssaf;
        }

        //Objectif épargne (soit 6 mois de salaire)
        $this->objective_saving = 6 * $salary;
        
        //Calcul de combien il faut encore pour atteindre cet objective_saving
        $this->still_need_objective_saving = $this->objective_saving - $this->saving;

        //calcul du nombre de mois pour atteindre cet objective_saving

        if(auth()->user()->setting->date_start !== null){
            $month_since_start = Carbon::create(auth()->user()->setting->date_start)->diffInMonths(Carbon::now());

            $avg_saving = $saving->count / $month_since_start;

            if($avg_saving > 0){
                $month_need_objective_saving = $this->still_need_objective_saving / $avg_saving;
            } else {
                $month_need_objective_saving = 'negative';
            }
        } else {
            $month_need_objective_saving = 'too few data';
        }
    }

    public function render()
    {
        return view('app.informations')->layout('layouts.app');
    }
}
