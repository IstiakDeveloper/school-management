<div>
    <!-- Teacher Table -->
    <button wire:click="restartDevice" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        Restart Device
    </button>

    <div>
        <button wire:click="pushCustomUserToDevice">Push Custom User</button>
    </div>

    <button 
        wire:click="pushAllTeachersToDevice"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Push All Teachers to Device
    </button>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Teacher ID</th>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">PIN</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($teachers as $teacher)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $teacher->teacher_id }}</td>
                    <td class="py-3 px-6 text-left">{{ $teacher->name_en }}</td>
                    <td class="py-3 px-6 text-left">{{ $teacher->pin }}</td>
                    <td class="py-3 px-6 text-left">
                        <button 
                            wire:click="pushTeacherToDevice({{ $teacher->id }})"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Push to Device
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
