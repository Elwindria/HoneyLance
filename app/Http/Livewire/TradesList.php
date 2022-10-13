<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trade;

class TradesList extends Component
{
    public function render()
    {
        $this->trades = Trade::where('user_id', auth()->user()->id)->get();
        return view('livewire.trades-list')->layout('layouts.app');
    }
}
