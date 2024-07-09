<?php

namespace App\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\Teacher;

class ShowComponent extends Component
{
    public $teacher;

    public function mount($teacher)
    {
        $this->teacher = Teacher::with(['trainings', 'educations'])->findOrFail($teacher);
    }

    public function render()
    {
        if (is_string($this->teacher->subjects_of_teaching)) {
            $this->teacher->subjects_of_teaching = json_decode($this->teacher->subjects_of_teaching);
        }

        if (is_null($this->teacher->educations)) {
            $this->teacher->educations = [];
        }
        if (is_null($this->teacher->trainings)) {
            $this->teacher->trainings = [];
        }
        return view('livewire.admin.teacher.show-component');
    }
}
