<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $isOpen = 0, $url;

    public function mount()
    {
        $this->url = url()->current();
    }

    public function render()
    {
        return view('livewire.index');
    }
}
