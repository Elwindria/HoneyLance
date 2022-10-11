<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserSetting;
use App\Models\UrssafSetting;
use App\Models\Trade;
use Usernotnull\Toast\Concerns\WireToast;
use Illuminate\Http\Request;

class Trades extends Component
{
    use WireToast;
    public $type, $type_trade, $name, $cost, $interval, $date, $urssaf_percent, $fav_percent, $urssaf_setting, $user_setting, $user_id;
    public $selected_tags = [];

    public function mount()
    {
        $this->name = session('name');
        $this->cost = session('cost');
        $this->date = session('date');
        $this->interval = session('interval');
        $this->type_trade = session('type');
        $this->selected_tags = session('selected_tags');

        $user_setting = UserSetting::find(auth()->user()->user_setting_id);
        $this->urssaf_percent = $user_setting->urssaf_setting_id;
    }

    public function render()
    {
        $urssaf_settings = UrssafSetting::orderBy('percentage')->get();
        //compact permet de faire passer des variable (ici : urssaf_settings) dans la vue. Vaut mieux faire ça car dans mount(), refresh à chaque changement... Pas ouf niveau opti
        return view('livewire.trade', compact('urssaf_settings'))->layout('layouts.app');
    }

    private function resetImputFields()
    {
        $this->name = '';
        $this->cost = '';
        $this->date = '';
        $this->interval = '';
        $this->selected_tags = '';
    }

    public function switchType($type)
    {
        $this->type_trade = $type;
        session(['type' => $this->type_trade]);
    }

    public function newTrade()
    {

        $dataValide = $this->validate([
            'cost' => ['required', 'numeric', 'Min:0'],
            'name' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        $merged = array_merge($dataValide, ['user_id' => auth()->user()->id], ['type' => $this->type_trade]);

        if($this->type_trade == 'in'){
            $dataValide = $this->validate([
                'urssaf_percent' => ['required']
            ]);

            // on récupère l'id dans form. Donc faut chercher dans UrsssafSetting le percentage lié à cet id
            $percentage = UrssafSetting::find($dataValide['urssaf_percent'])->percentage;

            $dataValide['urssaf_percent'] = $percentage;
            $merged = array_merge($merged, $dataValide);

        }elseif($this->type_trade == 'fixed'){
            $dataValide = $this->validate([
                'interval' => ['required', 'numeric', 'Min:0'],
            ]);
            $merged = array_merge($merged, $dataValide);
        }

        //Créer un new trade
        $create_trade = Trade::create($merged);
        //Créer le lien entre trades et tags (table pivot)
        $create_trade->tags()->attach($this->selected_tags);

        $this->resetImputFields();
        session()->forget(['name', 'cost', 'interval', 'date', 'type', 'selected_tags']);

        toast()
        ->success("Nouvelle transaction ajoutée avec succès.")
        ->push();
    }

    public function updating($name, $value)
    {
        session([$name => $value]);
    }
}
