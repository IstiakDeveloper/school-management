<?php

namespace App\Livewire\Admin\Attendance;

use App\Models\SchoolClass;
use App\Models\StudentAttendance;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use League\Csv\Writer;
use League\Csv\CharsetConverter;

class StudentAttendanceReport extends Component
{
    use WithPagination;

    public $startDate;
    public $endDate;
    public $classFilter;
    public $perPage = 10;

    public function render()
    {
        $attendances = StudentAttendance::query()
            ->when($this->startDate, function ($query) {
                $query->whereDate('date', '>=', $this->startDate);
            })
            ->when($this->endDate, function ($query) {
                $query->whereDate('date', '<=', $this->endDate);
            })
            ->when($this->classFilter, function ($query) {
                $query->whereHas('studentAdmission', function ($query) {
                    $query->where('school_class_id', $this->classFilter);
                });
            })
            ->paginate($this->perPage);

        return view('livewire.admin.attendance.student-attendance-report', [
            'attendances' => $attendances,
            'classes' => SchoolClass::all(),
        ]);
    }

    public function export()
    {
        $attendances = StudentAttendance::query()
            ->when($this->startDate, function ($query) {
                $query->whereDate('date', '>=', $this->startDate);
            })
            ->when($this->endDate, function ($query) {
                $query->whereDate('date', '<=', $this->endDate);
            })
            ->when($this->classFilter, function ($query) {
                $query->whereHas('studentAdmission', function ($query) {
                    $query->where('school_class_id', $this->classFilter);
                });
            })
            ->get();

        $csvData = [];
        $csvData[] = ['Student Name', 'Student ID', 'Date', 'Status'];
        foreach ($attendances as $attendance) {
            $csvData[] = [
                $attendance->studentAdmission->name_en,
                $attendance->studentAdmission->student_id,
                $attendance->date,
                $attendance->status,
            ];
        }

        return Response::streamDownload(function () use ($csvData) {
            $output = fopen('php://output', 'w');
            foreach ($csvData as $row) {
                fputcsv($output, $row);
            }
            fclose($output);
        }, 'attendance.csv');

    }
}
