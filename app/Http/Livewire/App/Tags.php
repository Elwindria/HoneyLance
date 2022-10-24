<?php

namespace App\Http\Livewire\App;

use App\Models\Tag;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Tags extends Component
{
    use WireToast;
    public $name_tag, $tag_id, $selected_tag;
    public $isOpen = 0;
    public $selected_tags = [];

    public function render()
    {
        return view('app.tags')->layout('layouts.app');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name_tag = '';
        $this->selected_tag = '';
    }

    function new () {
        $this->openModal();
        $this->selected_tag = null;
    }

    public function store()
    {
        $dataValide = $this->validate([
            'name_tag' => 'required',
        ]);

        $merged = array_merge($dataValide, ['user_id' => auth()->user()->id]);

        Tag::updateOrCreate(['id' => $this->selected_tag], $merged);

        $this->closeModal();
        $this->resetInputFields();

        if ($this->selected_tag == null) {
            toast()
                ->success("Nouveau tag ajouté avec succès.")
                ->push();
        } else {
            toast()
                ->success("Tag modifié avec succès.")
                ->push();
        }
    }

    public function edit()
    {
        $dataValide = $this->validate([
            'selected_tag' => 'required',
        ]);

        $this->name_tag = Tag::find($this->selected_tag)->name_tag;
        $this->openModal();
    }

    public function delete()
    {
        $dataValide = $this->validate([
            'selected_tag' => 'required',
        ]);

        Tag::find($this->selected_tag)->delete();
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->closeModal();
    }
}
