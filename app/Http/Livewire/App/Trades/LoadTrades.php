<?php

namespace App\Http\Livewire\App\Trades;

use App\Models\Trade;
use Livewire\Component;

class LoadTrades extends Component
{

    public $perPage;
    public $page;

    public function mount($page = null, $perPage = null)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 10;
    }

    public function render()
    {
        $trades = Trade::where('user_id', auth()->user()->id)->whereIn('type', ['in', 'out'])->paginate($this->perPage, ['*'], null, $this->page);

        return view('app.trades.list.load-trades', compact('trades'));
    }
}
