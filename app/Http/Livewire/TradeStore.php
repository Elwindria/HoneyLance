<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserSetting;
use App\Models\UrssafSetting;
use App\Models\Trade;
use Usernotnull\Toast\Concerns\WireToast;
use Illuminate\Http\Request;

class TradeStore extends Component
{
    use WireToast;
    public $type, $type_trade, $name, $cost, $interval, $date, $urssaf_percent, $fav_percent, $urssaf_setting, $user_setting, $user_id, $trades, $summaryType, $trade_id;
    public $selected_tags = [];
    public $old_urssaf_percent = false;

    public function mount($trade_id)
    {
        //Si l'utilisateur veut créer un nouveau trade, on affiche la vue avec le formulaire + sessions, sinon on affiche formulaire en mode Edit
        if($trade_id === 'new'){

            $user_setting = UserSetting::find(auth()->user()->user_setting_id);
        
            //Si l'utilisateur n'a pas renseigner un percentUrssaf, alors message spéciale
            if($user_setting->urssaf_setting_id === null){
                $this->urssaf_percent = null;
            } else {
                //Sinon cherche si sont percentUrssaf existe encore, sinon msg spéciale
                $urssaf_setting = UrssafSetting::find($user_setting->urssaf_setting_id);

                if($urssaf_setting !== null){
                    $this->urssaf_percent = $urssaf_setting->percentage;
                } else {
                    $this->urssaf_percent = 'old';
                }
            }

            if(session()->exists('selected_tags')){
                $this->selected_tags = session('selected_tags');
            }

            //Affiche si il existe des sessions de l'utilisateur
            $this->name = session('name');
            $this->cost = session('cost');
            $this->date = session('date');
            $this->interval = session('interval');
            $this->type_trade = session('type');

            $this->trade_id = $trade_id;

        } elseif($trade_id !== 'new'){
            $this->trade_id = $trade_id;

            $trade = Trade::find($trade_id);
            $urssaf_setting_percentage = UrssafSetting::where('percentage', $trade->urssaf_percent)->get();

            //si le %urssaf n'existe plus dans la db (car trop vieux), alors on crée <option> avec l'ancienne valeur
            if($urssaf_setting_percentage->isEmpty()){
                $this->urssaf_percent = $trade->urssaf_percent;
                $this->old_urssaf_percent = true;
            } else {
                $this->urssaf_percent = $trade->urssaf_percent;
            }

            $this->edit($trade);
        }
    }

    public function render()
    {        
        $urssaf_settings = UrssafSetting::orderBy('percentage')->get();

        //compact permet de faire passer des variable (ici : urssaf_settings) dans la vue. Vaut mieux faire ça car dans mount(), refresh à chaque changement... Pas ouf niveau opti
        return view('livewire.trade-store', compact('urssaf_settings'))->layout('layouts.app');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->cost = '';
        $this->date = '';
        $this->interval = '';
        $this->selected_tags = [];

        session()->forget(['name', 'cost', 'interval', 'date', 'type', 'selected_tags']);
        // session(['selected_tags' => []]);
    }

    public function switchType($type)
    {
        $this->type_trade = $type;
        session(['type' => $this->type_trade]);
    }

    public function store()
    {

        $dataValide = $this->validate([
            'cost' => ['required', 'numeric', 'Min:0'],
            'name' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        $merged = array_merge($dataValide, ['user_id' => auth()->user()->id], ['type' => $this->type_trade]);

        if($this->type_trade == 'in'){
            $dataValide = $this->validate([
                'urssaf_percent' => ['required', 'numeric']
            ]);

            $merged = array_merge($merged, $dataValide);

        }elseif($this->type_trade == 'fixed'){
            $dataValide = $this->validate([
                'interval' => ['required', 'numeric', 'Min:0'],
            ]);
            $merged = array_merge($merged, $dataValide);
        }

        //Créer un new trade
        $create_trade = Trade::updateOrCreate(['id' => $this->trade_id],$merged);
        //Créer le lien entre trades et tags (table pivot)
        $create_trade->tags()->sync($this->selected_tags);

        $this->resetInputFields();

        if($this->trade_id === 'new'){
            toast()
            ->success("Nouvelle transaction ajoutée avec succès.")
            ->push();
        } else {
            toast()
            ->success("Transaction modifiée avec succès.")
            ->pushOnNextPage();
        }

        //On a fini l'edit, on retourne à la vue de résumé
        return redirect()->route('trades-list');
    }

    public function updated($name, $value)
    {
        if($this->trade_id === 'new'){
            session([$name => $value]);
        }
    }

    public function edit($trade)
    {
        //Ajout des valeurs des inputs pour edit
        $this->type_trade = $trade->type;
        $this->name = $trade->name;
        $this->cost = $trade->cost;
        $this->date = $trade->date;
        $this->interval = $trade->interval;
        $this->selected_tags = $trade->tags->pluck('id')->toArray();
    }

    public function delete()
    {
        Trade::find($this->trade_id)->delete();

        $this->type_trade = null;

        $this->resetInputFields();

        toast()
        ->success("Transaction supprimée avec succès.")
        ->push();
    }
}
