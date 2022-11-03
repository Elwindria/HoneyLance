<?php

namespace App\Http\Livewire\App;

use App\Models\Trade;
use Livewire\Component;

class TradeList extends Component
{

    public $perPage;
    public $page;
    public $loadMore = false;
    public $search;

    protected $queryString = ['search'];

    public function mount($page = null, $perPage = null, $search = null)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 10;
        $this->search = $search;
        
    }

    public function render()
    {
        $trades = Trade::where('user_id', auth()->user()->id)->where('name', 'like', '%'.$this->search.'%')->whereIn('type', ['in', 'out'])->limit(10)->latest('date')->get();
        

        // if ($trades->count() <= $this->perPage) {
        //     $trades = $trades->paginate($this->perPage, ['*'], null, 1);
        //     return view('app.trades.list.load-trades', compact('trades'));
        // } else {
        //     if (!$this->loadMore) {
        //         return view('app.trades.list.load-more-trades');
        //     } else {
        //         $trades = $trades->paginate($this->perPage, ['*'], null, $this->page - 1);
        //         return view('app.trades.list.load-trades', compact('trades'));
        //     }
        // }

        return view('app.trades.list.load-trades', compact('trades'));
    }

    public function loadMore()
    {
        $this->page++;
        $this->loadMore = true;
    }
}