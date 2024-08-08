<?php

namespace App\Livewire;

use App\Models\AttendanceLog;
use App\Models\Teacher;
use App\Models\TeacherAttendance;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Rats\Zkteco\Lib\Helper\Attendance;

class TeacherAttendanceManager extends Component
{
    public $teachers;
    public $date;
    public $clock_in_time;
    public $clock_out_time;

    public function mount()
    {
        $this->teachers = Teacher::all();
        $this->date = now()->toDateString();
        $this->clock_in_time = '08:00:00';
        $this->clock_out_time = '14:00:00';
    }

    public function generateTeacherAttendance()
    {
        foreach ($this->teachers as $teacher) {
            $this->createOrUpdateAttendance($teacher);
        }
    }

    private function createOrUpdateAttendance($teacher)
    {
        $attendanceLogs = AttendanceLog::where('user_id', $teacher->id) // Changed to match Teacher id with user_id in AttendanceLog
            ->whereDate('timestamp', $this->date)
            ->orderBy('timestamp')
            ->get();
    
        $clockIn = null;
        $clockOut = null;
    
        // Loop through the attendance logs to determine the clock-in and clock-out times
        foreach ($attendanceLogs as $log) {
            if (is_null($clockIn) && $log->clock_in) {
                $clockIn = $log->clock_in;
            }
    
            if ($log->clock_out) {
                $clockOut = $log->clock_out;
            }
        }
    
        // If no clock_in or clock_out is found, mark as absent
        $absent = is_null($clockIn) && is_null($clockOut);
    
        // Update or create the teacher's attendance record
        TeacherAttendance::updateOrCreate(
            [
                'teacher_id' => $teacher->id,
                'date' => $this->date,
            ],
            [
                'clock_in' => $clockIn,
                'clock_out' => $clockOut,
                'absent' => $absent,
            ]
        );
    }

    public function exportPDF()
    {
        $teacherAttendance = TeacherAttendance::with('teacher')
            ->whereDate('date', $this->date)
            ->get();

        $pdf = Pdf::loadView('pdf.teacher-attendance-pdf', compact('teacherAttendance'));
        return $pdf->download('teacher_attendance_' . $this->date . '.pdf');
    }
    
    public function render()
    {
        return view('livewire.teacher-attendance-manager', [
            'teacherAttendance' => TeacherAttendance::with('teacher')->whereDate('date', $this->date)->get(),
        ]);
    }
}
