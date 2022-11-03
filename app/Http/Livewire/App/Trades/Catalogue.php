<?php

namespace App\Http\Livewire\App\Trades;

use App\Models\Trade;
use Livewire\Component;

class Catalogue extends Component
{

    public $perPage;
    public $page;
    public $loadMore = false;
    public $search = '', $type = 'all';

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'type' => ['except' => 'all', 'as' => 't'],
    ];

    public function mount($page = null, $perPage = null)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 10;
    }

    public function render()
    {
        if ($this->type === 'all') {
            $search_type = ['in', 'out'];
        } else {
            $search_type = [$this->type];
        }

        $trades = Trade::where('user_id', auth()->user()->id)->where('name', 'like', '%'.$this->search.'%')->whereIn('type', $search_type)->latest('date');

        if ($trades->count() <= $this->perPage) {
            $trades = $trades->paginate($this->perPage, ['*'], null, 1);
            return view('app.trades.list.load-trades', compact('trades'));
        } else {
            if (!$this->loadMore) {
                return view('app.trades.list.load-more-trades');
            } else {
                $trades = $trades->paginate($this->perPage, ['*'], null, $this->page - 1);
                return view('app.trades.list.load-trades', compact('trades'));
            }
        }
    }

    public function loadMore()
    {
        $this->page++;
        $this->loadMore = true;
    }
}
