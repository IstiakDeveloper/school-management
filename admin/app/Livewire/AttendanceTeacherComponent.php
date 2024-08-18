<?php

namespace App\Livewire;

use App\Models\AttendanceLog;
use App\Models\AttendanceTeacher;
use App\Models\TimeStampTeacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AttendanceTeacherComponent extends Component
{

    public $filter = 'today'; // Default filter value
    public $customStartDate;
    public $customEndDate;
    public $attendanceData = [];

    public function mount()
    {
        $this->attendanceData = $this->getAttendanceData();
        $this->storeAttendanceData(); // Automatically store data in AttendanceTeacher
        $this->updateAttendanceStates(); // Automatically store data in AttendanceTeacher
        $this->fetchFilteredAttendanceData();
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'filter' || $propertyName === 'customStartDate' || $propertyName === 'customEndDate') {
            $this->fetchFilteredAttendanceData(); // Fetch data when filter changes
        }
    }

    protected function getAttendanceData()
    {
        $query = AttendanceLog::with('teacher');
        
        // Get all data without filtering
        $logs = $query->get()->groupBy(function ($log) {
            return $log->user_id . '-' . optional($log->timestamp)->format('Y-m-d');
        });

        $attendanceData = [];

        foreach ($logs as $key => $logGroup) {
            $logData = [
                'teacher_id' => null,
                'user_id' => null,
                'date' => null,
                'name' => null,
                'clock_in' => null,
                'clock_out' => null,
                'state' => null,
            ];

            foreach ($logGroup as $log) {
                $teacher = $log->teacher;

                if (!$teacher) {
                    continue; // Skip if no teacher is found
                }

                $logData['teacher_id'] = $teacher->id;
                $logData['user_id'] = $log->user_id;
                $logData['date'] = optional($log->timestamp)->format('Y-m-d');
                $logData['name'] = $teacher->name_en;

                if ($log->clock_in) {
                    $logData['clock_in'] = optional($log->clock_in)->format('H:i:s');
                }
                if ($log->clock_out) {
                    $logData['clock_out'] = optional($log->clock_out)->format('H:i:s');
                }

                $timestamp = TimeStampTeacher::where('teacher_id', $teacher->id)->first();
                $logData['state'] = $this->determineState($log->clock_in, $log->clock_out, $timestamp);
            }

            $attendanceData[] = $logData;
        }

        return $attendanceData;
    }

    protected function determineState($clockIn, $clockOut, $timestamp)
    {
        if (!$timestamp) {
            return 'No Data';
        }

        if (is_null($clockIn) || is_null($clockOut)) {
            return 'Incomplete';
        }

        if ($clockIn > $timestamp->clock_in && $clockOut < $timestamp->clock_out) {
            return 'Late and Early Leave';
        } elseif ($clockIn > $timestamp->clock_in) {
            return 'Late';
        } elseif ($clockOut < $timestamp->clock_out) {
            return 'Early Leave';
        }

        return 'On Time';
    }

    protected function storeAttendanceData()
    {
        foreach ($this->attendanceData as $data) {
            if (!$data['date'] || !$data['teacher_id']) {
                Log::warning('Missing data for attendance storage:', $data);
                continue; // Skip this entry if essential data is missing
            }

            try {
                AttendanceTeacher::updateOrCreate(
                    [
                        'date' => $data['date'],
                        'teacher_id' => $data['teacher_id'], // Ensure unique key combination
                    ],
                    [
                        'uid' => $data['user_id'],
                        'name' => $data['name'],
                        'state' => $data['state'],
                        'timestamp' => Carbon::parse($data['date'])->format('Y-m-d H:i:s'), // Proper timestamp format
                        'clock_in' => $data['clock_in'], 
                        'clock_out' => $data['clock_out']
                    ]
                );
            } catch (\Exception $e) {
                // Log the error message for debugging purposes
                Log::error('Error storing attendance data: ' . $e->getMessage());
            }
        }
    }

    protected function updateAttendanceStates()
    {
        $attendanceRecords = AttendanceTeacher::all();

        foreach ($attendanceRecords as $record) {
            $timestamp = TimeStampTeacher::where('teacher_id', $record->teacher_id)->first();

            // Determine state based on clock-in and clock-out times
            $state = $this->determineState($record->clock_in, $record->clock_out, $timestamp);

            // Update the record with the determined state
            $record->update([
                'state' => $state,
            ]);
        }
    }


    protected function fetchFilteredAttendanceData()
    {
        $query = AttendanceTeacher::query();
    
        // Apply filters based on selected criteria
        if ($this->filter === 'today') {
            $query->whereDate('date', Carbon::today());
        } elseif ($this->filter === 'last7days') {
            $query->whereBetween('date', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()]);
        } elseif ($this->filter === 'month') {
            $query->whereMonth('date', Carbon::now()->month)
                  ->whereYear('date', Carbon::now()->year);
        } elseif ($this->filter === 'custom' && $this->customStartDate && $this->customEndDate) {
            $query->whereBetween('date', [$this->customStartDate, $this->customEndDate]);
        }
    
        // Get and format records
        $this->attendanceData = $query->get()->map(function ($record) {
            $date = Carbon::parse($record->date);
            return [
                'date' => $date->format('Y-m-d'),
                'name' => $record->name,
                'clock_in' => $record->clock_in,
                'clock_out' => $record->clock_out,
                'state' => $record->state,
            ];
        })->toArray();
    }



    public function render()
    {
        return view('livewire.attendance-teacher-component', ['attendanceData' => $this->attendanceData]);
    }
}
