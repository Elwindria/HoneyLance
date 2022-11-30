<?php

namespace App\Http\Livewire\App;

use App\Models\UrssafSetting;
use App\Models\UserSetting;
use App\Models\Saving;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

use Carbon\Carbon;

class UserSettings extends Component
{
    use WireToast;
    public $urssaf_setting_id, $user_setting, $salary, $date_start, $urssaf_settings_percent, $urssaf_settings_description, $urssaf_settings, $count, $saving;

    public function mount()
    {
        //Count le nombre de saving pour l'user actif, si $savings = 1 alors new user, sinon si >1 alors vieux)
        $count_savings = Saving::where('user_id', auth()->user()->id)->count();
        
        $user_setting = UserSetting::find(auth()->user()->user_setting_id);

        if ($user_setting !== null) {
            $this->urssaf_setting_id = $user_setting->urssaf_setting_id;
            $this->salary = $user_setting->salary;
            $this->date_start = $user_setting->date_start;

            //Diff all() et get() = get() tu peux ajouter des options à ta request SQL, alors que all() tu fais un select * puis ton serveur trie, mais tu n'utilises donc pas sql. Pas ouf niveau opti
            $this->urssaf_settings = UrssafSetting::orderBy('percentage')->get();
        } else {
            $user_setting = new UserSetting;
            $save_user_setting = $user_setting->save();

            if ($save_user_setting) {
                $user = User::find(auth()->user()->id);
                $user->user_setting_id = $user_setting->id;
                $user->save();
            }

            return back();
        }

        //Si user n'a pas de saving du tout (bug?), on créer un épargne de base à 0€, sinon affiche valeur
        if($count_savings != 0){
            $this->count_savings = $count_savings;
            $this->count = Saving::where('user_id', auth()->user()->id)->first()->count;
        } else {
            $saving = new Saving;
            $saving->date = Carbon::now();
            $saving->count = 0;
            $saving->user_id = auth()->user()->id;
            $saving->save();

            return back();
        }
    }

    public function render()
    {
        return view('app.user-settings')->layout('layouts.app');
    }

    public function updatedUrssafSettingId()
    {
        $dataValide = $this->validate([
            'urssaf_setting_id' => ['required'],
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->user_setting_id], $dataValide);

        toast()
            ->success("Le pourcentage Urssaf à utiliser par défaut à été modifié")
            ->push();
    }

    public function updatedSalary()
    {
        $dataValide = $this->validate([
            'salary' => ['required', 'numeric', 'Min:0'],
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->user_setting_id], $dataValide);

        toast()
            ->success("Salaire modifié")
            ->push();
    }

    public function updatedDateStart()
    {
        $dataValide = $this->validate([
            'date_start' => ['required', 'date'],
        ]);

        UserSetting::updateOrCreate(['id' => auth()->user()->user_setting_id], $dataValide);

        toast()
            ->success("Date de début d'activité changée")
            ->push();
    }

    public function updatedCount()
    {
        $dataValide = $this->validate([
            'count' => ['required', 'numeric', 'Min:0'],
        ]);
        
        //Modifie le premier saving (peut le faire que si il n'a qu'un seul saving, donc new user avec saving de base à 0€)
        $saving = Saving::where('user_id', auth()->user()->id)->first();
        $saving->count = $dataValide['count'];
        $saving->save();

        toast()
            ->success("Epargne de base changée")
            ->push();
    }
}
