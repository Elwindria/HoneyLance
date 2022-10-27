<?php

namespace App\Http\Livewire\App;

use App\Models\Trade;
use App\Models\UrssafSetting;
use Illuminate\Http\Request;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;
use Carbon\Carbon;

class TradeStore extends Component
{
    use WireToast;
    public $url, $type, $type_trade, $name, $cost, $interval, $date, $urssaf_percent, $fav_percent, $urssaf_setting, $user_setting, $user_id, $trades, $summaryType, $trade_id;
    public $selected_tags = [];
    public $old_urssaf_percent = false;

    public function mount()
    {
        $this->url = url()->current();
        $this->trade_id = request()->trade_id;
        $this->confirm_delete = false;

        $this->trades = Trade::where('user_id', auth()->user()->id)->get();

        $positive = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $negative = Trade::where('user_id', auth()->user()->id)->where('type', 'out')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $this->recipe = $positive - $negative;

        //Si l'utilisateur veut créer un nouveau trade, on affiche la vue avec le formulaire + sessions, sinon on affiche formulaire en mode Edit
        if ($this->trade_id === null) {
            $user_setting = auth()->user()->setting;
            //Si l'utilisateur n'a pas renseigner un percentUrssaf, alors message spéciale
            if ($user_setting->urssaf_setting_id == null) {
                $this->urssaf_percent = null;
            } else {
                //Sinon cherche si sont percentUrssaf existe encore, sinon msg spéciale
                if ($user_setting->urssaf != null) {
                    $this->urssaf_percent = $user_setting->urssaf->percentage;
                } else {
                    $this->urssaf_percent = 'old';
                }
            }

            if (session()->exists('selected_tags')) {
                $this->selected_tags = session('selected_tags');
            }

            //Si la session type 'exists' alors on l'affiche sinon on affiche par défaut la page trade 'in'
            if (session()->exists('type')) {
                $this->type_trade = session('type');
            } else {
                $this->type_trade = 'in';
            }

            //Affiche si il existe des sessions de l'utilisateur
            $this->name = session('name');
            $this->cost = session('cost');
            $this->date = session('date');
            $this->interval = session('interval');

        } else {

            $trade = Trade::find($this->trade_id);
            $urssaf_setting_percentage = UrssafSetting::where('percentage', $trade->urssaf_percent)->get();

            //si le %urssaf n'existe plus dans la db (car trop vieux), alors on crée <option> avec l'ancienne valeur
            if ($urssaf_setting_percentage->isEmpty()) {
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
        return view('app.trade-store', compact('urssaf_settings'))->layout('layouts.app');
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
            'cost' => ['required', 'numeric', 'min:0', 'max:999999999.99'],
            'name' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        $merged = array_merge($dataValide, ['user_id' => auth()->user()->id], ['type' => $this->type_trade]);

        //ToDo quand maj d'un trade d'un in à out, enlever le urssaf_percent
        if ($this->type_trade == 'in') {
            $dataValide = $this->validate([
                'urssaf_percent' => ['required', 'numeric'],
            ]);

            $merged = array_merge($merged, $dataValide);

        } elseif ($this->type_trade == 'fixed') {
            $dataValide = $this->validate([
                'interval' => ['required', 'numeric', 'Min:0'],
            ]);
            $merged = array_merge($merged, $dataValide);

            //Créer la prochaine date de facturation (utilisé par command trade:fixed)
            //Si la date renseigner est dans le futures, on l'utilise pour la prochaine date de facturation
            if($this->date > Carbon::now()->format('Y-m-d')){
                dd("yes");
                $next_facturation = Carbon::create($this->date)->format('Y-m-d');
            } else {
                $next_facturation = Carbon::create($this->date)->format('Y-m-d');

                //Sinon on augmente la date (de la valeur de la période/interval en jours) jusqu'à trouver la prochaine date de facturation
                while($next_facturation < Carbon::now()->format('Y-m-d')){
                    if($this->interval == 30){
                        $next_facturation = Carbon::create($next_facturation)->addMonth()->format('Y-m-d');
                    } else {
                        $next_facturation = Carbon::create($next_facturation)->addDays($this->interval)->format('Y-m-d');
                    }
                }
            }

            $array_next_facturation = ["next_facturation" => $next_facturation];
            $merged = array_merge($merged, $array_next_facturation);
        }

        //Créer un new trade
        $create_trade = Trade::updateOrCreate(['id' => $this->trade_id], $merged);
        //Créer le lien entre trades et tags (table pivot)
        $create_trade->tags()->sync($this->selected_tags);

        $this->resetInputFields();

        if ($this->trade_id === 'new') {
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
        if ($this->trade_id === 'new') {
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

    public function confirmDelete() {
        $this->confirm_delete = true;
    }

    public function delete()
    {
        Trade::find($this->trade_id)->delete();

        $this->resetInputFields();

        toast()
            ->success("Transaction supprimée avec succès.")
            ->pushOnNextPage();

        //On revient à la page trades-list
        return redirect()->route('trades-list');
    }
}
