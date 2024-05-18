<?php

namespace App\Livewire\Admin\Attendance;

use App\Models\SchoolClass;
use App\Models\StudentAdmission;
use App\Models\StudentAttendance;
use Livewire\Component;

class StudentAttendanceComponent extends Component
{
    public $students;
    public $attendance = [];
    public $classFilter = '';

    public function mount()
    {
        $this->students = StudentAdmission::with('schoolClass')->get();
    }

    public function markAttendance()
    {
        // Get the current date
        $currentDate = now()->toDateString();

        // Iterate through all students
        foreach ($this->students as $student) {
            // Determine the status for the current student
            $status = $this->attendance[$student->id] ?? false;

            // Check if an attendance record already exists for the student on the current date
            $existingAttendance = StudentAttendance::where('student_admission_id', $student->id)
                ->whereDate('date', $currentDate)
                ->first();

            // If no attendance record exists and the student is not marked present, create an absent record
            if (!$existingAttendance && !$status) {
                StudentAttendance::create([
                    'student_admission_id' => $student->id,
                    'date' => $currentDate,
                    'status' => 'absent',
                ]);
            }

            // If the student is marked present, create or update the attendance record
            if ($status) {
                if ($existingAttendance) {
                    // Update the existing attendance record if it exists
                    $existingAttendance->update(['status' => 'present']);
                } else {
                    // Create a new attendance record if it doesn't exist
                    StudentAttendance::create([
                        'student_admission_id' => $student->id,
                        'date' => $currentDate,
                        'status' => 'present',
                    ]);
                }
            }
        }

        // Reset the attendance array after marking attendance
        $this->reset('attendance');
        session()->flash('success', 'Attendance marked successfully.');
    }


    public function render()
    {
        $schoolClasses = SchoolClass::all();

        // Filter students by class if a class filter is selected
        $filteredStudents = $this->classFilter
            ? StudentAdmission::whereHas('schoolClass', function ($query) {
                $query->where('id', $this->classFilter);
            })->get()
            : $this->students;

        return view('livewire.admin.attendance.student-attendance-component', [
            'filteredStudents' => $filteredStudents,
            'schoolClasses' => $schoolClasses,
        ]);
    }
}
