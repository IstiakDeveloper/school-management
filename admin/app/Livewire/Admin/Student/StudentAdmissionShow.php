<?php

namespace App\Livewire\Admin\Student;

use App\Models\StudentAdmission;
use Livewire\Component;

class StudentAdmissionShow extends Component
{
    public $studentAdmission;

    public function mount($id)
    {
        $this->studentAdmission = StudentAdmission::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.student.student-admission-show', [
            'studentAdmission' => $this->studentAdmission
        ]);
    }
}
