<?php

namespace App\Livewire\Admin\Result;

use App\Models\SchoolClass;
use App\Models\StudentAdmission;
use App\Models\StudentResult;
use App\Models\Subject;
use Livewire\Component;

class StudentResultCreate extends Component
{
    public $examYear;
    public $semester;
    public $studentAdmissionId;
    public $schoolClassId;
    public $subjectId;
    public $examType;
    public $marks;
    public $selectedStudent;
    public $selectedSchoolClass;
    public $selectedSubject;
    public $students;
    public $schoolClasses;
    public $subjects;

    public function mount()
    {
        $this->students = StudentAdmission::all();
        $this->schoolClasses = SchoolClass::all();
    }

    public function render()
    {
        if ($this->selectedSchoolClass) {
            $this->subjects = Subject::where('school_class_id', $this->selectedSchoolClass)->get();
        }

        return view('livewire.admin.result.student-result-create');
    }

    public function updateSelectedStudent()
    {
        if ($this->selectedStudent) {
            $student = StudentAdmission::find($this->selectedStudent);
            $this->selectedSchoolClass = $student->school_class_id;
        } else {
            $this->selectedSchoolClass = null;
            $this->selectedSubject = null;
            $this->subjects = [];
        }
    }


    public function store()
    {
        $validatedData = $this->validate([
            'examYear' => 'required|integer',
            'semester' => 'required|string',
            'selectedStudent' => 'required|exists:student_admissions,id',
            'selectedSchoolClass' => 'required|exists:school_classes,id',
            'selectedSubject' => 'required|exists:subjects,id',
            'examType' => 'required|string',
            'marks' => 'required|numeric',
        ]);
        StudentResult::create([
            'exam_year' => $this->examYear,
            'semester' => $this->semester,
            'student_admission_id' => $this->selectedStudent,
            'school_class_id' => $this->selectedSchoolClass,
            'subject_id' => $this->selectedSubject,
            'exam_type' => $this->examType,
            'marks' => $this->marks,
        ]);

        flash()->success('Student result created successfully!');
        $this->reset('selectedStudent', 'selectedSchoolClass', 'selectedSubject', 'examYear', 'semester', 'examType', 'marks');
    }
}
