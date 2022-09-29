<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserSettings extends Component
{
    public $fav_percent;

    public function render()
    {
        return view('livewire.user-settings');
    }

    public function prefUrssaf()
    {
        $validate = $this->validate([
            'fav_percent' => 'required'
        ]);
   
        UserSettings::updateOrCreate(['id' => auth()->user()->id], $validate);
    }
}
