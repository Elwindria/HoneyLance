<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Tags extends Component
{
    public $nameTag, $tag_id;
    public $isOpen = 0;

    public function render()
    {
        $this->posts = Tag::all();
        return view('livewire.tags');
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
        $this->nameTag = '';
    }

    public function new()
    {
        $this->openModal();
    }

    public function store()
    {
        $dataValid = $this->validate([
            'nameTag' =>'required'
        ]);

        Tag::updateOrCreate(['id' => $this->tag_id], $dataValid);

        toast()
        ->success('Ajout d\' un nouveau post')
        ->push();
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->closeModal();
    }
}
