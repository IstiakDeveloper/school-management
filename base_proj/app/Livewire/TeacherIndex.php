<?php

namespace App\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class TeacherIndex extends Component
{

    public $teachers = [];

    public function mount() {
        $this->teachers = Teacher::all();
    }
    public function render()
    {
        return view('livewire.teacher-index');
    }
}
