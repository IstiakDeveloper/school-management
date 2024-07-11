<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AttendanceLog;
use Carbon\Carbon;

class AttendanceLogComponent extends Component
{

    public $logs = [];
    public $search = '';
    public $startDate;
    public $endDate;

    protected $queryString = ['startDate', 'endDate'];

    public function mount()
    {

        $this->startDate = Carbon::today()->subDays(7)->format('Y-m-d');
        $this->endDate = Carbon::today()->format('Y-m-d');
        
        $this->fetchLogs();
    }

    public function render()
    {
        return view('livewire.attendance-log-component', [
            'logs' => $this->logs,
        ]);
    }

    // Method to fetch logs based on search and date filters
    public function fetchLogs()
    {
        $query = AttendanceLog::query();

        // Apply search filter
        if (!empty($this->search)) {
            $query->where('uid', 'like', '%' . $this->search . '%')
                ->orWhere('user_id', 'like', '%' . $this->search . '%');
        }

        // Apply date range filter
        $query->whereBetween('timestamp', [$this->startDate, $this->endDate]);

        // Fetch logs and assign to $logs property
        $this->logs = $query->get()->toArray();
    }

    // Livewire listener for search input
    public function updatedSearch()
    {
        $this->fetchLogs(); // Re-fetch logs when search input changes
    }

    // Livewire listener for date filters
    public function updatedStartDate()
    {
        $this->fetchLogs(); // Re-fetch logs when start date changes
    }

    public function updatedEndDate()
    {
        $this->fetchLogs(); // Re-fetch logs when end date changes
    }

}
