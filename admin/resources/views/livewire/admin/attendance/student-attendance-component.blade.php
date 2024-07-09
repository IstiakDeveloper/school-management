<div class="p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Student Attendance</h1>
        <a class="bg-blue-500 py-2 px-4 text-white font-semibold rounded-lg hover:bg-blue-600" href="{{route('attendance.report')}}">Report</a>
    </div>
    <p class="text-sm text-gray-600 mb-2">Date: {{ now()->format('l, F j, Y') }}</p>
    <p class="text-sm text-gray-600 mb-6">Time: {{ now()->format('h:i A') }}</p>

    <form wire:submit.prevent="markAttendance">
        <div class="mb-4">
            <label for="classFilter" class="block text-sm font-medium text-gray-700">Filter by Class:</label>
            <select id="classFilter" wire:model="classFilter" wire:change="$refresh" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <option value="">All Classes</option>
                @foreach($schoolClasses as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="">
                    <th class="border border-gray-300 px-4 py-2">Select</th>
                    <th class="border border-gray-300 px-4 py-2">Student Name</th>
                    <th class="border border-gray-300 px-4 py-2">Student ID</th>
                    <th class="border border-gray-300 px-4 py-2">Mother's Mobile</th>
                    <th class="border border-gray-300 px-4 py-2">Class</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filteredStudents as $student)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="checkbox" wire:model="attendance.{{ $student->id }}" id="student_{{ $student->id }}">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->name_en }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->student_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->mother_mobile }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->schoolClass->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">Mark Attendance</button>
    </form>
</div>
