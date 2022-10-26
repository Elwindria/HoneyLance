<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\Trade;
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
    }

    public function render()
    {
        return view('app.informations')->layout('layouts.app');
    }
}
