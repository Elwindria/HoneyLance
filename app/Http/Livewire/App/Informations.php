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
    public $cost_urssaf = 0;

    public function mount()
    {
        $salary = auth()->user()->setting->salary;
        $this->last_saving = Saving::where('user_id', auth()->user()->id)->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->first();

        $trades_in_taxable = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->whereNotNull('urssaf_percent')->get();

        $positive = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('cost');
        $negative = Trade::where('user_id', auth()->user()->id)->where('type', 'out')->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('cost');
        $this->recipe = $positive - $negative;

        $this->cost_urssaf = 0;

        //Total somme à donner à l'Urssaf
        foreach ($trades_in_taxable as $trade_in_taxable) {
            $this->cost_urssaf += ($trade_in_taxable->cost * $trade_in_taxable->urssaf_percent)/100;
        }

        //Total des sortie (Urssaf + out + salaire /!\ Salaire est déjà dans les trades out car calculer chaque début de mois avec la commands SalaryToTrade.php!)
        $this->total_out = $this->cost_urssaf + $negative;

        //épargne pour le mois en cours
        if($this->last_saving !== null){
            $this->saving = $this->last_saving->count + $this->recipe - $salary - $this->cost_urssaf;
        } else {
            $this->saving = $this->recipe - $salary - $this->cost_urssaf;
        }

        //Objectif épargne (soit 6 mois de salaire)
        $this->objective_saving = 6 * $salary;

        //Calcul de la somme qu'il faut encore pour atteindre cet objective_saving
        $this->still_need_objective_saving = $this->objective_saving - $this->saving;

        //calcul du nombre de mois pour atteindre cet objective_saving
        if(auth()->user()->setting->date_start !== null && $this->last_saving !== null){
            $month_since_start = Carbon::create(auth()->user()->setting->date_start)->diffInMonths(Carbon::now());

            if($month_since_start == 0){
                $month_since_start = 1;
            }

            $this->avg_saving = $this->last_saving->count / $month_since_start;

            if($this->avg_saving > 0){
                $this->month_need_objective_saving = $this->still_need_objective_saving / $this->avg_saving;
            } else {
                $this->month_need_objective_saving = 'negative';
            }
        } else {
            $this->month_need_objective_saving = 'too few data';
            $this->avg_saving = 'too few data';
        }
    }

    public function render()
    {
        return view('app.informations')->layout('layouts.app');
    }
}
