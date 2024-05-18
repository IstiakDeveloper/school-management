<?php

namespace App\Livewire\Admin\Subject;

use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;

class SubjectCreate extends Component
{
    public $name;
    public $description;
    public $school_class_id;

    public function render()
    {
        $schoolClasses = SchoolClass::all();
        return view('livewire.admin.subject.subject-create', compact('schoolClasses'));
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'school_class_id' => 'required|exists:school_classes,id',
        ]);

        Subject::create([
            'name' => $this->name,
            'description' => $this->description,
            'school_class_id' => $this->school_class_id,
        ]);

        flash()->success('Subject created successfully.');

        return redirect()->route('subjects.index');
    }
}
