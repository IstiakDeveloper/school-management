<div class="overflow-x-auto p-4 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Students Results</h1>
        <div>
            <a href="{{ route('student-results.create') }}"
                class="ml-4 py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 flex"><x-lucide-plus
                    class="h-6 w-6" /></a>
        </div>
    </div>
    <table class="table-auto w-full">
        <thead>
            <tr class="">
                <th class="px-4 py-2">Student ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">phone</th>
                <th class="px-4 py-2">Class</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2">{{ $student->student_id }}</td>
                <td class="px-4 py-2">{{ $student->name_en }}</td>
                <td class="px-4 py-2">{{ $student->mother_mobile }}</td>
                <td class="px-4 py-2">
                    {{ $student->schoolClass->name }}
                </td>
                <td class="px-4 py-2">
                    <button wire:click="showResults({{ $student->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Show Results</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
