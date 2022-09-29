<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserSettings extends Component
{
    public $prefUrssaf;

    public function render()
    {
        return view('livewire.user-settings');
    }

    public function prefUrssaf()
    {
        $this->validate([
            'prefUrssaf' => 'required'
        ]);
   
        UserSettings::updateOrCreate(['id' => $this->post_id], [
            'prefUrssaf' => $this->prefUrssaf,
        ]);
    }
}
