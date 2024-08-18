<div>
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        <form wire:submit.prevent="setTime">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Set Teacher Time</h2>
            
            <div class="mb-5">
                <label for="teacher" class="block text-gray-700 text-sm font-medium">Select Teacher</label>
                <select id="teacher" wire:model="selectedTeacher" class="block w-full mt-1 border-gray-300 p-3 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">All Teachers</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name_en }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-5">
                <label for="clock_in" class="block text-gray-700 text-sm font-medium">Clock In</label>
                <input id="clock_in" type="time" wire:model="clock_in" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
    
            <div class="mb-5">
                <label for="clock_out" class="block text-gray-700 text-sm font-medium">Clock Out</label>
                <input id="clock_out" type="time" wire:model="clock_out" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
    
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                Set Timestamps
            </button>
        </form>
    
        @if (session()->has('message'))
            <div class="mt-6 text-green-600 text-sm">
                {{ session('message') }}
            </div>
        @endif
    </div>
    
    <!-- Display List of Teacher Times -->
    <div class="mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Teacher Times</h3>
        
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b-2 text-left text-sm font-semibold text-gray-700">SL</th>
                    <th class="px-4 py-2 border-b-2 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="px-4 py-2 border-b-2 text-left text-sm font-semibold text-gray-700">Clock In</th>
                    <th class="px-4 py-2 border-b-2 text-left text-sm font-semibold text-gray-700">Clock Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timeStamps as $index => $timeStamp)
                    <tr>
                        <td class="px-4 py-2 border-b text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b text-sm text-gray-700">{{ $timeStamp->teacher->name_en }}</td>
                        <td class="px-4 py-2 border-b text-sm text-gray-700">{{ $timeStamp->clock_in }}</td>
                        <td class="px-4 py-2 border-b text-sm text-gray-700">{{ $timeStamp->clock_out }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>