<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePublication extends Component
{

    public $selectedCategory;


    public function render()
    {
        return view('livewire.create-publication', ['selectedCategory' => $this->selectedCategory]);
    }
}
