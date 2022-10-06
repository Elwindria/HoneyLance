<?php

namespace App\Http\Livewire;

use App\Models\UserSetting;
use App\Models\UrssafSetting;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class UserSettings extends Component
{
    use WireToast;
    public $fav_percent, $user_setting, $salary, $date_start, $urssaf_settings_percent, $urssaf_settings_description, $urssaf_settings, $message_user_setting;

    public function mount()
    {
        $user_setting = UserSetting::find(auth()->user()->user_setting_id);
        
        if($user_setting !== null)
        {
            $this->fav_percent = $user_setting->fav_percent;
            $this->salary = $user_setting->salary;
            $this->date_start = $user_setting->date_start;

            $this->message_user_setting = null;
            //Diff all() et get() = get() tu peux ajouter des options à ta request SQL, alors que all() tu fais un select * puis ton serveur trie, mais tu n'utilises donc pas sql. Pas ouf niveau opti
            $this->urssaf_settings = UrssafSetting::orderBy('percentage')->get();
        } else {
            $this->message_user_setting = 'Une erreur est survenue. Nous n\'avons pas trouver vos paramètres par défaut';
        }
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

        UserSetting::updateOrCreate(['id' => auth()->user()->user_setting_id], $dataValide);

        toast()
        ->success("Le pourcentage Urssaf à utiliser par défaut à été modifié")
        ->push();
    }

    public function updatedSalary()
    {
        $dataValide = $this->validate([
            'salary' => ['required', 'numeric', 'Min:0']
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->user_setting_id], $dataValide);

        toast()
        ->success("Salaire modifié")
        ->push();
    }

    public function updatedDateStart()
    {
        $dataValide = $this->validate([
            'date_start' => ['required', 'date']
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->user_setting_id], $dataValide);

        toast()
        ->success("Date de début d'activité changée")
        ->push();
    }
}
