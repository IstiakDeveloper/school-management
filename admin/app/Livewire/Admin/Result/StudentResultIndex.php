<?php

namespace App\Livewire\Admin\Result;

use App\Models\StudentAdmission;
use App\Models\StudentResult;
use Livewire\Component;
use Livewire\WithPagination;

class StudentResultIndex extends Component
{
    public $students;

    public function mount()
    {
        $this->students = StudentAdmission::with('schoolClass')->get();
    }

    public function showResults($studentId)
    {
        // Redirect to the show results page for the selected student
        return redirect()->route('admin.result.show', $studentId);
    }

    public function render()
    {
        return view('livewire.admin.result.student-result-index');
    }
}
