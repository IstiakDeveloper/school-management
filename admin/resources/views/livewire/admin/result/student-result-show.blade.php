<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach($results->groupBy('semester') as $semester => $semesterResults)
        <div class="p-4 rounded-lg">
            <h2 class="text-lg font-bold mb-4">{{ $semester }} Results</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="border-y">
                            <th class="px-4 py-2">Subjects</th>
                            <th class="px-4 py-2">Exam Year</th>
                            <th class="px-4 py-2">Exam Type</th>
                            <th class="px-4 py-2">Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($semesterResults as $result)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2">{{ $result->subject->name }}</td>
                                <td class="px-4 py-2">{{ $result->exam_year }}</td>
                                <td class="px-4 py-2">{{ $result->exam_type }}</td>
                                <td class="px-4 py-2">{{ $result->marks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
