<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Tags extends Component
{
    use WireToast;
    public $name, $tag_id;
    public $isOpen = 0;

    public function render()
    {
        $this->allTag = Tag::all();
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
        $this->name = '';
    }

    public function new()
    {
        $this->openModal();
    }

    public function store()
    {
        $dataValid = $this->validate([
            'name' =>'required'
        ]);

        Tag::updateOrCreate(['id' => $this->tag_id], $dataValid);

        toast()
        ->success('Ajout d\' un nouveau tag')
        ->push();

        $this->closeModal();
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->closeModal();
    }
}
