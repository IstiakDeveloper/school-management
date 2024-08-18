<div>
    <div class="flex justify-between items-center mb-4">
        <div class="md:w-1/3">
            <!-- Search Input -->
            <form wire:submit.prevent="search" class="flex items-center">
                <input wire:model.lazy="search" type="text"
                    class="w-full border border-gray-300 rounded-l-lg py-2 px-3 focus:outline-none focus:border-blue-500"
                    placeholder="Search" required>
                <button type="submit"
                    class="py-2 px-4 bg-blue-500 text-white rounded-r-lg  hover:bg-blue-600 focus:outline-none focus:bg-blue-600"><x-lucide-search
                        class="h-6 w-6" /></button>
            </form>
        </div>
        <div>
            <a href="{{ route('admission-create') }}"
                class="ml-4 py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 flex"><x-lucide-plus
                    class="h-6 w-6" /></a>
        </div>
    </div>


    <!-- Student Admission Table -->
    <div class="overflow-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th wire:click="sortBy('student_id')"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">Student
                        ID</th>
                    <th wire:click="sortBy('name_en')"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">Name
                        (English)</th>
                    <th wire:click="sortBy('class_id')"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">Class
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($studentAdmissions as $studentAdmission)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $studentAdmission->student_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $studentAdmission->name_en }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $schoolClass = \App\Models\SchoolClass::find($studentAdmission->school_class_id);
                            @endphp
                            {{ $schoolClass ? $schoolClass->name : 'Class not found' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($studentAdmission->photo)
                                <img src="{{ asset('storage/' . $studentAdmission->photo) }}" alt="Student Photo"
                                    class="h-10 w-10 rounded-full">
                            @else
                                <span class="text-gray-400">No photo</span>
                            @endif
                        </td>
                        <td class="flex items-center px-6 py-4 whitespace-nowrap space-x-4">
                            <a href="{{ route('student-admissions.edit', $studentAdmission->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="{{ route('admin.students.show', $studentAdmission->id) }}"
                                class="text-green-600 hover:text-green-900"><x-lucide-eye class="h-6 w-6" /></a>
                            <button wire:click="confirmDelete({{ $studentAdmission->id }})"
                                class="text-red-600 hover:text-red-900"><x-lucide-trash-2 class="h-6 w-6" /></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('components.student-admission-confirm-delete')


    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $studentAdmissions->links() }}
    </div>
</div>
