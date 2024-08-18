<?php

namespace App\Livewire\Admin\Home;

use App\Models\AttendanceTeacher;
use Livewire\Component;
use App\Models\Teacher;
use App\Models\StudentAdmission;
use Carbon\Carbon;

class AdminHome extends Component
{

    
    public $totalTeachers;
    public $totalStudents;
    public $startDate;
    public $endDate;
    public $attendanceData;
    public $attendanceDataChart = [];
    public $attendanceStateCounts = [];
    public $teacherNamesByState = [];
    public $showLateAndEarlyLeave = false;
    public $showLate = false;
    public $showEarlyLeave = false;
    public $showOnTime = false;

    public function mount()
    {
        $this->totalTeachers = Teacher::count();
        $this->totalStudents = StudentAdmission::count();
        $this->startDate = Carbon::now()->startOfMonth()->toDateString();
        $this->endDate = Carbon::now()->endOfMonth()->toDateString();
        $this->loadAttendanceData();
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'startDate' || $propertyName === 'endDate') {
            $this->loadAttendanceData(); // Reload data when dates change
        }
    }

    public function loadAttendanceData()
    {
        $this->attendanceData = AttendanceTeacher::with('teacher')
            ->whereBetween('timestamp', [$this->startDate, $this->endDate])
            ->get()
            ->groupBy(function($entry) {
                // Format the timestamp to 'Y-m-d'
                return Carbon::parse($entry->timestamp)->format('Y-m-d');
            })
            ->map(function ($dayData) {
                return $dayData->map(function ($entry) {
                    return [
                        'teacher' => $entry->teacher->name_en,
                        'clock_in' => $entry->clock_in,
                        'clock_out' => $entry->clock_out,
                        'state' => $entry->state,
                    ];
                });
            });

        $today = Carbon::now()->format('Y-m-d');
        $attendanceToday = AttendanceTeacher::whereDate('created_at', $today)
            ->get()
            ->groupBy('state')
            ->map(function ($group) {
                return [
                    'count' => $group->count(),
                    'teachers' => $group->pluck('teacher.name_en')->unique()->toArray(),
                ];
            });

        $this->attendanceStateCounts = [
            'Late and Early Leave' => $attendanceToday->get('Late and Early Leave')['count'] ?? 0,
            'Late' => $attendanceToday->get('Late')['count'] ?? 0,
            'Early Leave' => $attendanceToday->get('Early Leave')['count'] ?? 0,
            'On Time' => $attendanceToday->get('On Time')['count'] ?? 0,
        ];

        $this->teacherNamesByState = [
            'Late and Early Leave' => $attendanceToday->get('Late and Early Leave')['teachers'] ?? [],
            'Late' => $attendanceToday->get('Late')['teachers'] ?? [],
            'Early Leave' => $attendanceToday->get('Early Leave')['teachers'] ?? [],
            'On Time' => $attendanceToday->get('On Time')['teachers'] ?? [],
        ];

        $this->attendanceDataChart = AttendanceTeacher::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function ($entries) {
                return [
                    'date' => $entries->first()->created_at->format('Y-m-d'),
                    'count' => $entries->count(),
                ];
            })->values()->toArray();

        $this->dispatch('updateChart', $this->attendanceDataChart);
    }

    public function toggleSection($status)
    {
        $property = 'show' . str_replace(' ', '', $status);
        
        // Check if property exists before trying to toggle
        if (property_exists($this, $property)) {
            $this->$property = !$this->$property;
        }
    }

    public function render()
    {
        return view('livewire.admin.home.admin-home');
    }
}
