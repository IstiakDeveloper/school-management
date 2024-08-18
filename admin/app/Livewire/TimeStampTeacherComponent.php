<?php

namespace App\Livewire;

use App\Models\Teacher;
use App\Models\TimeStampTeacher;
use Livewire\Component;

class TimeStampTeacherComponent extends Component
{
    
    public $teachers;
    public $timeStamps;
    public $selectedTeacher = null;
    public $clock_in;
    public $clock_out;

    public function mount()
    {
        $this->teachers = Teacher::all();
        $this->timeStamps = TimeStampTeacher::with('teacher')->get();
    }

    public function setTime()
    {
        if ($this->selectedTeacher) {
            // Set timestamp for a specific teacher
            TimeStampTeacher::updateOrCreate(
                ['teacher_id' => $this->selectedTeacher],
                ['clock_in' => $this->clock_in, 'clock_out' => $this->clock_out]
            );
        } else {
            // Set timestamp for all teachers
            foreach ($this->teachers as $teacher) {
                TimeStampTeacher::updateOrCreate(
                    ['teacher_id' => $teacher->id],
                    ['clock_in' => $this->clock_in, 'clock_out' => $this->clock_out]
                );
            }
        }

        session()->flash('message', 'Timestamps set successfully!');
        $this->timeStamps = TimeStampTeacher::with('teacher')->get(); // Refresh the list
    }

    public function render()
    {
        return view('livewire.time-stamp-teacher-component', [
            'timeStamps' => $this->timeStamps
        ]);
    }
}
