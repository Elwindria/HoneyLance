<?php

namespace App\Http\Livewire;

use App\Models\UserSetting;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class UserSettings extends Component
{
    use WireToast;
    public $fav_percent, $user_settings, $salary, $date_start;

    public function mount()
    {
        $user_settings = UserSetting::findOrFail(auth()->user()->id);
        $this->fav_percent = $user_settings->fav_percent;
        $this->salary = $user_settings->salary;
        $this->date_start = $user_settings->date_start;
    }

    public function render()
    {   
        return view('livewire.user-settings')->layout('layouts.app');
    }

    public function updatedFavPercent()
    {
        $dataValide = $this->validate([
            'fav_percent' => ['required', 'numeric', 'max:100', 'Min:0']
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->id], $dataValide);

        toast()
        ->success("Le pourcentage Urssaf à utiliser par défaut à été modifié")
        ->push();
    }

    public function updatedSalary()
    {
        $dataValide = $this->validate([
            'salary' => ['required', 'numeric', 'Min:0']
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->id], $dataValide);

        toast()
        ->success("Salaire modifié")
        ->push();
    }

    public function updatedDateStart()
    {
        $dataValide = $this->validate([
            'date_start' => ['required', 'date']
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->id], $dataValide);

        toast()
        ->success("Date de début d'activité changée")
        ->push();
    }
}
