<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Illuminate\Http\Request;

class IndexTradeList extends Component
{

    public $search;

    public function render()
    {
        return view('app.trades.list.index');
    }
}
