<?php

namespace App\Livewire\Admin\Subject;

use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;

class SubjectIndex extends Component
{

    public $subjects;
    public $confirmingSubjectDeletion = false;
    public $subjectIdToDelete;

    public function mount()
    {
        $this->subjects = Subject::all();
    }

    public function render()
    {
        $schoolClasses = SchoolClass::all();
        return view('livewire.admin.subject.subject-index', compact('schoolClasses'));
    }


    public function confirmDelete($subjectId)
    {
        $this->confirmingSubjectDeletion = true;
        $this->subjectIdToDelete = $subjectId;
    }

    public function delete()
    {
        $subject = Subject::findOrFail($this->subjectIdToDelete);

        if ($subject) {
            $subject->delete();
            flash()->success('Subject deleted successfully.');
        } else {
            flash()->error('Subject not found.');
        }

        // Reset confirmation state
        $this->confirmingSubjectDeletion = false;
    }




}
