<div class="p-6  shadow-md rounded-lg space-y-6">
    <!-- Dashboard Header -->
    <h1 class="text-3xl font-semibold text-gray-800 flex items-center space-x-2">
        <x-lucide-layout-dashboard class="w-6 h-6 text-gray-500" />
        <span>Admin Dashboard</span>
    </h1> 

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Teachers -->
        <div class="  p-6 border rounded-lg shadow-sm flex items-center space-x-4">
            <x-lucide-user class="w-8 h-8 text-blue-500" />
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Total Teachers</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalTeachers }}</p>
            </div>
        </div>

        <!-- Total Students -->
        <div class="  p-6 border rounded-lg shadow-sm flex items-center space-x-4">
            <x-lucide-users class="w-8 h-8 text-green-500" />
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Total Students</h2>
                <p class="text-3xl font-bold text-green-600">{{ $totalStudents }}</p>
            </div>
        </div>

        <!-- Total Attendance -->
        <div class="  p-6 border rounded-lg shadow-sm flex items-center space-x-4">
            <x-lucide-check-circle class="w-8 h-8 text-red-500" />
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Total Attendance</h2>
                <p class="text-3xl font-bold text-red-600">
                    {{ $attendanceData->flatten()->count() }}
                </p>
            </div>
        </div>
    </div>

    <!-- Date Range Picker -->
    <div class="flex items-center space-x-4 mb-6">
        <input type="date" wire:model.live="startDate" class="form-input w-32" />
        <input type="date" wire:model.live="endDate" class="form-input w-32" />
        <button wire:click="loadAttendanceData" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Filter</button>
    </div>

    <!-- Attendance Chart -->
    <div class="flex items-center gap-4">
        <div class="  p-6 border rounded-lg shadow-sm w-full">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Attendance Trends</h2>
            <div wire:ignore>
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>
    
        <!-- Today's Attendance Stats -->
        <div class="  p-6 border rounded-lg shadow-sm w-full">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Today's Attendance Status</h2>
            <div class="space-y-4">
                <div class="flex flex-col">
                    <button type="button" class="flex justify-between items-center w-full p-2 bg-gray-200 rounded-md text-gray-700 font-semibold hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500" wire:click="toggleSection('Late and Early Leave')">
                        <span>Late and Early Leave ({{ $attendanceStateCounts['Late and Early Leave'] }})</span>
                        <x-lucide-chevron-down class="w-4 h-4 transition-transform {{ $showLateAndEarlyLeave ? 'transform rotate-180' : '' }}" />
                    </button>
                    @if($showLateAndEarlyLeave)
                        <ul class="mt-2 space-y-1 pl-6">
                            @forelse($teacherNamesByState['Late and Early Leave'] as $teacherName)
                                <li class="text-gray-600">{{ $teacherName }}</li>
                            @empty
                                <li class="text-gray-500">No teachers</li>
                            @endforelse
                        </ul>
                    @endif
                </div>
                <div class="flex flex-col">
                    <button type="button" class="flex justify-between items-center w-full p-2 bg-gray-200 rounded-md text-gray-700 font-semibold hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500" wire:click="toggleSection('Late')">
                        <span>Late ({{ $attendanceStateCounts['Late'] }})</span>
                        <x-lucide-chevron-down class="w-4 h-4 transition-transform {{ $showLate ? 'transform rotate-180' : '' }}" />
                    </button>
                    @if($showLate)
                        <ul class="mt-2 space-y-1 pl-6">
                            @forelse($teacherNamesByState['Late'] as $teacherName)
                                <li class="text-gray-600">{{ $teacherName }}</li>
                            @empty
                                <li class="text-gray-500">No teachers</li>
                            @endforelse
                        </ul>
                    @endif
                </div>
                <div class="flex flex-col">
                    <button type="button" class="flex justify-between items-center w-full p-2 bg-gray-200 rounded-md text-gray-700 font-semibold hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500" wire:click="toggleSection('Early Leave')">
                        <span>Early Leave ({{ $attendanceStateCounts['Early Leave'] }})</span>
                        <x-lucide-chevron-down class="w-4 h-4 transition-transform {{ $showEarlyLeave ? 'transform rotate-180' : '' }}" />
                    </button>
                    @if($showEarlyLeave)
                        <ul class="mt-2 space-y-1 pl-6">
                            @forelse($teacherNamesByState['Early Leave'] as $teacherName)
                                <li class="text-gray-600">{{ $teacherName }}</li>
                            @empty
                                <li class="text-gray-500">No teachers</li>
                            @endforelse
                        </ul>
                    @endif
                </div>
                <div class="flex flex-col">
                    <button type="button" class="flex justify-between items-center w-full p-2 bg-gray-200 rounded-md text-gray-700 font-semibold hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500" wire:click="toggleSection('On Time')">
                        <span>On Time ({{ $attendanceStateCounts['On Time'] }})</span>
                        <x-lucide-chevron-down class="w-4 h-4 transition-transform {{ $showOnTime ? 'transform rotate-180' : '' }}" />
                    </button>
                    @if($showOnTime)
                        <ul class="mt-2 space-y-1 pl-6">
                            @forelse($teacherNamesByState['On Time'] as $teacherName)
                                <li class="text-gray-600">{{ $teacherName }}</li>
                            @empty
                                <li class="text-gray-500">No teachers</li>
                            @endforelse
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    

    <!-- Detailed Attendance Table -->
    <div class="  p-6 border rounded-lg shadow-sm">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Detailed Attendance</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full   divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teacher</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clock In</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clock Out</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="  divide-y divide-gray-200">
                    @forelse($attendanceData as $date => $entries)
                        @foreach($entries as $entry)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry['teacher'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry['clock_in'] ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry['clock_out'] ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry['state'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No attendance data available for the selected range</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function createChart(data) {
            var ctx = document.getElementById('attendanceChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(d => d.date),
                    datasets: [{
                        label: 'Attendance Count',
                        data: data.map(d => d.count),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }
                    }
                }
            });
        }

        // Initial chart creation with initial data
        createChart(@json($attendanceDataChart));

        // Listen for Livewire event to update chart
        Livewire.on('updateChart', (data) => {
            createChart(data);
        });
    });
</script>
