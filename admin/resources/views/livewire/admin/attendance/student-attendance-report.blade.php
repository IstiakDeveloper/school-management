<div class="bg-white p-8 shadow-lg rounded-lg">
    <div class="flex items-center space-x-4 mb-4">
        <div>
            <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date:</label>
            <input type="date" wire:model="startDate" wire:change='$refresh' id="startDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>
        <div>
            <label for="endDate" class="block text-sm font-medium text-gray-700">End Date:</label>
            <input type="date" wire:model="endDate" id="endDate" wire:change='$refresh' class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>
        <div>
            <label for="classFilter" class="block text-sm font-medium text-gray-700">Class:</label>
            <select wire:model="classFilter" id="classFilter" wire:change='$refresh' class="mt-1 block py-2 px-4 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="">All Classes</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Attendance table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <!-- Table headers -->
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <!-- Table data -->
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($attendances as $attendance)
                <tr @if($attendance->status == 'absent') class="bg-red-200" @endif>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->studentAdmission->name_en }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->studentAdmission->student_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination links -->
    <div class="mt-4">
        {{ $attendances->links() }}
    </div>


    <div>
        <button wire:click="export" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Export CSV</button>
    </div>
</div>
