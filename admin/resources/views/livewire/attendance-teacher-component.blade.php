<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <!-- Title and Filter Controls -->
    <div class="px-6 py-4 border-b flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Attendance Report</h2>
        
        <!-- Filter Dropdown -->
        <div class="flex items-center space-x-4 ">
            <select wire:model.live="filter" class="form-select p-2">
                <option value="today">Today</option>
                <option value="last7days">Last 7 Days</option>
                <option value="month">This Month</option>
                <option value="custom">Custom Range</option>
            </select>

            <!-- Custom Date Range Inputs -->
            @if ($filter === 'custom')
                <div class="flex items-center space-x-2">
                    <input type="date" wire:model.live="customStartDate" class="form-input" />
                    <input type="date" wire:model.live="customEndDate" class="form-input" />
                </div>
            @endif
        </div>
    </div>

    <!-- Attendance Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clock In</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clock Out</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">State</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($attendanceData as $data)
                    @php
                        // Determine row background color based on the state
                        $rowColor = match($data['state']) {
                            'Incomplete' => 'bg-gray-100',
                            'Late and Early Leave' => 'bg-yellow-100',
                            'Late' => 'bg-red-100',
                            'Early Leave' => 'bg-orange-100',
                            'On Time' => 'bg-green-100',
                            default => 'bg-white',
                        };
                    @endphp
                    <tr class="{{ $rowColor }}">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $data['date'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $data['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $data['clock_in'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $data['clock_out'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $data['state'] ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No attendance data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
