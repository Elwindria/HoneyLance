<?php

namespace App\Http\Livewire\App\Trades;

use Livewire\Component;
use Illuminate\Http\Request;

class Index extends Component
{

    public $search, $type;

    public function mount()
    {
        $this->type = 'all';
    }

    public function render()
    {
        return view('app.trades.list.index');
    }

    public function switchSummaryType($type)
    {
        $this->type = $type;
    }
}
