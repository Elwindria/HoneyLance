<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $isOpen = 0;

    public function render()
    {
        return view('livewire.index');
    }
}
