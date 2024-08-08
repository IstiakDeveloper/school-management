<div>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Teacher ID</th>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">PIN</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($teachers as $teacher)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $teacher->teacher_id }}</td>
                    <td class="py-3 px-6 text-left">{{ $teacher->name_en }}</td>
                    <td class="py-3 px-6 text-left">{{ $teacher->pin_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
