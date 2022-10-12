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
    public $type, $type_trade, $name, $cost, $interval, $date, $urssaf_percent, $fav_percent, $urssaf_setting, $user_setting, $user_id, $display, $trades, $summaryType, $trade_id;
    public $selected_tags = null;
    public $edit = false;

    public function mount($display)
    {
        if($display === 'new'){
            $this->name = session('name');
            $this->cost = session('cost');
            $this->date = session('date');
            $this->interval = session('interval');
            $this->selected_tags = session('selected_tags');
            $this->type_trade = session('type');

            $user_setting = UserSetting::find(auth()->user()->user_setting_id);
            $this->urssaf_percent = $user_setting->urssaf_setting_id;

            $this->display = $display;
        } elseif($display === 'summary'){
            $this->display = $display;
        }
    }

    public function render()
    {        
        $this->trades = Trade::where('user_id', auth()->user()->id)->get();
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

    public function switchSummaryType($type)
    {
        $this->type_trade = null;

        if($type === 'all'){
            $this->trades = Trade::where('user_id', auth()->user()->id)->get();
        }else{
            $this->trades = Trade::where('user_id', auth()->user()->id)->where('type', $type)->get();
        }
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
        $create_trade = Trade::updateOrCreate(['id' => $this->trade_id],$merged);
        //Créer le lien entre trades et tags (table pivot)
        $create_trade->tags()->attach($this->selected_tags);

        $this->resetImputFields();
        session()->forget(['name', 'cost', 'interval', 'date', 'type', 'selected_tags']);

        if($this->display === 'new'){
            toast()
            ->success("Nouvelle transaction ajoutée avec succès.")
            ->push();
        } else {

            //On n'est plus en mode edit, on retourne au résumé de tous les trades
            $this->edit = false;
            $this->type_trade = null;

            toast()
            ->success("Transaction modifiée avec succès.")
            ->push();
        }
    }

    public function resetAllInput()
    {
        $this->resetImputFields();
        session()->forget(['name', 'cost', 'interval', 'date', 'selected_tags']);
    }

    public function updated($name, $value)
    {
        session([$name => $value]);
    }

    public function edit($trade_id)
    {
        $this->edit = true;
        $this->trade_id = $trade_id;

        //Trouve le trade sélectionné (grâce à son id) puis tous ses tags
        $trade = Trade::find($trade_id);
        $tags = $trade->tags;

        //trouve l'id du urssaf_percent du trade
        $urssaf_percent = UrssafSetting::where('percentage', $trade->urssaf_percent)->get();

        //si il y a au moins un tag alors array des id de ces tags, sinon vide
        if($tags->isNotEmpty()){
            foreach ($trade->tags as $tag) {
                $selected_tags[] = $tag->id;
            }
        }else{
            $selected_tags = "";
        }

        //si il y a un urssaf_percent (un trad in) alors cherche l'id, sinon vide
        if($urssaf_percent->isNotEmpty()){
            $urssaf_percent_id = $urssaf_percent[0]->id;
        } else {
            $urssaf_percent_id = '';
        }

        //Ajout des valeurs des inputs pour edit
        $this->type_trade = $trade->type;
        $this->name = $trade->name;
        $this->cost = $trade->cost;
        $this->date = $trade->date;
        $this->interval = $trade->interval;
        $this->selected_tags = $selected_tags;
        $this->urssaf_percent = $urssaf_percent_id;
    }

    public function delete()
    {
        Trade::find($this->trade_id)->delete();

        $this->edit = false;
        $this->type_trade = null;

        $this->resetImputFields();
        session()->forget(['name', 'cost', 'interval', 'date', 'type', 'selected_tags']);
    }

    public function session(){
        dd(session('selected_tags'));
    }
}
