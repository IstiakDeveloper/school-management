<div>
    <div class="mb-4">
        <label for="search" class="sr-only">Search</label>
        <input wire:model.live="search" type="text" id="search" placeholder="Search..." class="form-input rounded-md shadow-sm w-full">
    </div>

    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
            <label for="start_date" class="sr-only">Start Date</label>
            <input wire:model.live="startDate" type="date" id="start_date" class="form-input rounded-md shadow-sm">
        </div>
        <div>
            <label for="end_date" class="sr-only">End Date</label>
            <input wire:model.live="endDate" type="date" id="end_date" class="form-input rounded-md shadow-sm">
        </div>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">UID</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">State</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($logs as $log)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $log['uid'] }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $log['user_id'] }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $log['state'] }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $log['timestamp'] }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $log['type'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
