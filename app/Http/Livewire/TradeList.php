<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trade;

class TradeList extends Component
{
    public function render()
    {
        $this->trades = Trade::where('user_id', auth()->user()->id)->get();
        return view('livewire.trade-list')->layout('layouts.app');
    }
}
