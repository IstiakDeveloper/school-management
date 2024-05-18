<?php

namespace App\Livewire\Admin\Result;

use App\Models\StudentAdmission;
use App\Models\StudentResult;
use Livewire\Component;

class StudentResultShow extends Component
{
    public $student;
    public $results;

    public function mount($studentId)
    {
        $this->student = StudentAdmission::findOrFail($studentId);
        $this->results = StudentResult::where('student_admission_id', $studentId)->get();
    }

    public function render()
    {
        return view('livewire.admin.result.student-result-show');
    }
}
