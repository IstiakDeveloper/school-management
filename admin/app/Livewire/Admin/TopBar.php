<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TopBar extends Component
{
    public function render()
    {
        return view('livewire.admin.top-bar', [
            'user' => Auth::user(),
        ]);
    }
}
