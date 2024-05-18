<?php

namespace App\Livewire\Admin\Subject;

use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;

class SubjectEdit extends Component
{
    public $subject;
    public $name;
    public $description;
    public $school_class_id;

    public function mount(Subject $subject)
    {
        $this->subject = $subject;
        $this->name = $subject->name;
        $this->description = $subject->description;
        $this->school_class_id = $subject->school_class_id;
    }

    public function render()
    {
        $schoolClasses = SchoolClass::all();
        return view('livewire.admin.subject.subject-edit', compact('schoolClasses'));
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'school_class_id' => 'required|exists:school_classes,id',
        ]);

        $this->subject->update([
            'name' => $this->name,
            'description' => $this->description,
            'school_class_id' => $this->school_class_id,
        ]);

        flash()->success('Subject updated successfully.');

        return redirect()->route('subjects.index');
    }

}
