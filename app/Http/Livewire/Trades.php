<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Trades extends Component
{
    use WireToast;
    

    public function render()
    {
        return view('livewire.trade')->layout('layouts.app');
    }
}
