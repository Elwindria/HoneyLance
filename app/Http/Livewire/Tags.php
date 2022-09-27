<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tags extends Component
{

    public $isOpen = 0;

    public function render()
    {
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

    private function validateInput()
    {
        $this->validate([
            'nameTag' =>'required'
        ]);
    }

    public function new()
    {
        $this->openModal();
    }

    public function store()
    {
        $this->validateInput();
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->closeModal();
    }
}
