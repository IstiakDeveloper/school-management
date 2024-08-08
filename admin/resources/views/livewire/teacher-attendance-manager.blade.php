<div class="mx-auto p-4">
    <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700">Select Date</label>
        <input type="date" id="date" wire:model="date" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="flex justify-between items-center mb-4">
        <button wire:click="generateTeacherAttendance" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Generate Attendance</button>
        <button wire:click="exportPDF" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to PDF</button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/4 py-2">Teacher ID</th>
                    <th class="w-1/4 py-2">Date</th>
                    <th class="w-1/4 py-2">Clock In</th>
                    <th class="w-1/4 py-2">Clock Out</th>
                    <th class="w-1/4 py-2">Absent</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teacherAttendance as $attendance)
                    <tr class="whitespace-nowrap border-b">
                        <td class="px-6 py-4">{{ $attendance->teacher->id }}</td>
                        <td class="px-6 py-4">{{ $attendance->date }}</td>
                        <td class="px-6 py-4">{{ $attendance->clock_in ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $attendance->clock_out ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $attendance->absent ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
