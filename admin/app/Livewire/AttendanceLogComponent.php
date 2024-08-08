<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AttendanceLog;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class AttendanceLogComponent extends Component
{
    public $logs = [];
    public $search = '';
    public $startDate;
    public $endDate;
    public $type;

    protected $queryString = ['startDate', 'endDate', 'type'];

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
                ->orWhere('user_id', 'like', '%' . $this->search . '%')->orWhere('name', 'like', '%' . $this->search . '%');
        }

        // Apply date range filter
        $query->whereBetween('timestamp', [$this->startDate, $this->endDate]);

        // Apply type filter
        if ($this->type !== '') {
            if ($this->type == 'clock_in') {
                $query->whereNotNull('clock_in');
            } elseif ($this->type == 'clock_out') {
                $query->whereNotNull('clock_out');
            }
        }

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

    // Livewire listener for type filter
    public function updatedType()
    {
        $this->fetchLogs(); // Re-fetch logs when type changes
    }

    // Method to filter logs for today
    public function filterToday()
    {
        $this->startDate = Carbon::today()->format('Y-m-d 00:00:00');
        $this->endDate = Carbon::today()->format('Y-m-d 23:59:59');
        $this->fetchLogs();
    }

    // Method to fetch logs from API and store in the database
    // public function fetchLogsFromApi()
    // {
    //     try {
    //         $response = Http::get('https://natural-hookworm-similarly.ngrok-free.app/api/attendance-logs'); // Replace with your actual API URL
    //         if ($response->successful()) {
    //             $logs = $response->json();

    
    //             // Store logs in the database
    //             foreach ($logs as $log) {
    //                 // Determine whether to set clock_in or clock_out based on the type
    //                 $clockIn = $log['type'] == 0 ? $log['timestamp'] : null;
    //                 $clockOut = $log['type'] == 1 ? $log['timestamp'] : null;
    
    //                 AttendanceLog::updateOrCreate(
    //                     ['uid' => $log['uid'], 'timestamp' => $log['timestamp']],
    //                     [
    //                         'user_id' => $log['id'],
    //                         'name' => $log['name'] ?? 'Unknown',
    //                         'state' => $log['state'],
    //                         'clock_in' => $clockIn,
    //                         'clock_out' => $clockOut
    //                     ]
    //                 );
    //             }
    
    //             // Refresh the logs in the component
    //             $this->fetchLogs();
    //             sweetalert()->success('Fetch data successfully');
    //         } else {
    //             sweetalert()->error('Failed to fetch logs from API');
    //         }
    //     } catch (\Exception $e) {
    //         sweetalert()->error('Error: ' . $e->getMessage());
    //     }
    // }

    public function fetchLogsFromApi()
    {
        try {
            $response = Http::get('https://natural-hookworm-similarly.ngrok-free.app/api/attendance-logs'); // Replace with your actual API URL
            if ($response->successful()) {
                $logs = $response->json();
    
                // Group logs by user and date
                $groupedLogs = [];
    
                foreach ($logs as $log) {
                    $userId = $log['id'];
                    $date = Carbon::parse($log['timestamp'])->toDateString();
                    $timestamp = $log['timestamp'];
                    $logEntry = ['timestamp' => $timestamp, 'log' => $log];
    
                    if (!isset($groupedLogs[$userId])) {
                        $groupedLogs[$userId] = [];
                    }
    
                    if (!isset($groupedLogs[$userId][$date])) {
                        $groupedLogs[$userId][$date] = [];
                    }
    
                    $groupedLogs[$userId][$date][] = $logEntry;
                }
    
                // Process each group
                foreach ($groupedLogs as $userId => $dateLogs) {
                    foreach ($dateLogs as $date => $logs) {
                        // Sort logs by timestamp
                        usort($logs, function ($a, $b) {
                            return strcmp($a['timestamp'], $b['timestamp']);
                        });
    
                        // Process logs
                        foreach ($logs as $index => $logEntry) {
                            $log = $logEntry['log'];
                            $timestamp = $log['timestamp'];
                            $uid = $log['uid'];
                            $state = $log['state'];
                            $name = $log['name'] ?? 'Unknown';
    
                            if ($index == 0) {
                                // First entry of the day - clock_in
                                AttendanceLog::updateOrCreate(
                                    ['uid' => $uid, 'user_id' => $userId, 'timestamp' => $timestamp],
                                    [
                                        'name' => $name,
                                        'state' => $state,
                                        'clock_in' => $timestamp,
                                        'clock_out' => null,
                                    ]
                                );
                            } else {
                                // Subsequent entries of the day
                                $existingLog = AttendanceLog::where('uid', $uid)
                                    ->where('user_id', $userId)
                                    ->whereDate('timestamp', $date)
                                    ->whereNull('clock_out')
                                    ->first();
    
                                if ($existingLog) {
                                    $existingLog->update([
                                        'clock_out' => $timestamp,
                                        'state' => $state
                                    ]);
                                } else {
                                    // If there was no clock_in for the day, create a new entry with clock_in as null
                                    AttendanceLog::create([
                                        'uid' => $uid,
                                        'user_id' => $userId,
                                        'name' => $name,
                                        'state' => $state,
                                        'timestamp' => $timestamp,
                                        'clock_in' => null,
                                        'clock_out' => $timestamp,
                                    ]);
                                }
                            }
                        }
                    }
                }
    
                // Refresh the logs in the component
                $this->fetchLogs();
                sweetalert()->success('Fetch data successfully');
            } else {
                sweetalert()->error('Failed to fetch logs from API');
            }
        } catch (\Exception $e) {
            sweetalert()->error('Error: ' . $e->getMessage());
        }
    }



    public function exportPdf()
    {
        try {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
    
            $pdf = new Dompdf($options);
    
            // HTML content for PDF
            $html = view('livewire.attendance-log-pdf', [
                'logs' => $this->logs,
            ])->render();
    
            // Load HTML into Dompdf
            $pdf->loadHtml($html);
    
            // Set paper size and orientation
            $pdf->setPaper('A4', 'portrait');
    
            // Render PDF (important for downloading)
            $pdf->render();
    
            // Generate a unique filename for the PDF
            $filename = 'attendance_logs_' . time() . '.pdf';
            
            // Store the PDF file in storage (public disk)
           $test =  Storage::disk('public')->put('pdf/' . $filename, $pdf->output());

            // Provide a download link for the user
            return redirect()->route('download-pdf', $filename);
    
        } catch (\Exception $e) {
            // Handle any exceptions during PDF generation
            return back()->withError('Error generating PDF: ' . $e->getMessage());
        }
    }
    
}
