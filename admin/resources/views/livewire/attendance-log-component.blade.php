<div class="p-4 bg-white shadow rounded-lg">
    <!-- Button to fetch logs from API -->
    <div class="flex justify-between items-center mb-4">
        <button wire:click="fetchLogsFromApi" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Fetch Logs from API
        </button>

        <!-- Filters -->
        <div class="flex space-x-4">
            <input type="text" wire:model.live="search" placeholder="Search..." class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />

            <input type="date" wire:model.live="startDate" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />

            <input type="date" wire:model.live="endDate" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />

            <!-- Today Button -->
            <button wire:click="filterToday" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                Today
            </button>

            <!-- Type Dropdown -->
            <select wire:model.live="type" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <option value="">All</option>
                <option value="clock_in">Clock In</option>
                <option value="clock_out">Clock Out</option>
            </select>

            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" wire:click="exportPdf">Download PDF</button>
        </div>
    </div>

    <!-- Display logs -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">UID</th>
                    <th class="py-3 px-6 text-left">User ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Time</th>
                    <th class="py-3 px-6 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($logs as $log)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $log['uid'] }}</td>
                        <td class="py-3 px-6 text-left">{{ $log['user_id'] }}</td>
                        <td class="py-3 px-6 text-left">{{ $log['name'] ?? 'Unknown' }}</td>
                        <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($log['clock_in'] ?? $log['clock_out'])->format('Y-m-d') }}</td>
                        <td class="py-3 px-6 text-left bg-yellow-200 text-black">{{ \Carbon\Carbon::parse($log['clock_in'] ?? $log['clock_out'])->format('H:i:s') }}</td>
                        <td class="py-3 px-6 text-left">{{ $log['clock_in'] ? 'Clock In' : 'Clock Out' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
</div>
