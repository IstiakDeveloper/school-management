<div >
    <form wire:submit.prevent="store" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="examYear">
                Exam Year:
            </label>
            <input wire:model="examYear" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="examYear" type="text" placeholder="Enter Exam Year">
            @error('examYear') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="semester">
                Semester:
            </label>
            <input wire:model="semester" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="semester" type="text" placeholder="Enter Semester">
            @error('semester') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="mt-4">
            <label for="selectedStudent" class="block text-sm font-medium text-gray-700">Select Student:</label>
            <select wire:model="selectedStudent" wire:change="updateSelectedStudent" id="selectedStudent" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <option value="">Select Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name_en }}</option>
                @endforeach
            </select>
        </div>

        @if ($selectedStudent)
            <div class="mt-4">
                <label for="selectedSchoolClass" class="block text-sm font-medium text-gray-700">Select School Class:</label>
                <select id="selectedSchoolClass" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" disabled>
                    <option value="{{ $selectedSchoolClass }}">{{ $schoolClasses->where('id', $selectedSchoolClass)->first()->name }}</option>
                </select>
            </div>
            @if ($selectedSchoolClass && $subjects->isNotEmpty())
                <div class="mt-4">
                    <label for="selectedSubject" class="block text-sm font-medium text-gray-700">Select Subject:</label>
                    <select wire:model="selectedSubject" id="selectedSubject" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="examType">
                Exam Type:
            </label>
            <input wire:model="examType" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="examType" type="text" placeholder="Enter Exam Type">
            @error('examType') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="marks">
                Marks:
            </label>
            <input wire:model="marks" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="marks" type="text" placeholder="Enter Marks">
            @error('marks') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Save
            </button>
        </div>
    </form>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
