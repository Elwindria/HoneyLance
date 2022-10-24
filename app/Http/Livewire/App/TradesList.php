<?php

namespace App\Http\Livewire\App;

use App\Models\Trade;
use Livewire\Component;

class TradesList extends Component
{

    public $url;

    public function mount()
    {
        $this->url = url()->current();
    }

    public function render()
    {
        $this->trades = Trade::where('user_id', auth()->user()->id)->get();
        return view('app.trades-list')->layout('layouts.app');
    }
}
