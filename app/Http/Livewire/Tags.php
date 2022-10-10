<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Tags extends Component
{
    use WireToast;
    public $name_tag, $tag_id;
    public $isOpen = 0;
    public $selected_tags = [];

    public function render()
    {
        $all_tag = Tag::get();
        return view('livewire.tags', compact('all_tag'));
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name_tag = '';
    }

    public function new()
    {
        $this->openModal();
    }

    public function store()
    {
        $dataValid = $this->validate([
            'name_tag' =>'required'
        ]);

        Tag::updateOrCreate(['name_tag' => $this->name_tag], $dataValid);

        $this->closeModal();
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->closeModal();
    }
}
