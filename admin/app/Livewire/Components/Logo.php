<?php

namespace App\Livewire\Components;

use App\Models\Logo as ModelsLogo;
use Livewire\Component;

class Logo extends Component
{
    public $logo;

    public function mount()
    {
        $this->logo = ModelsLogo::first();
    }
    public function render()
    {
        return view('livewire.components.logo');
    }
}
