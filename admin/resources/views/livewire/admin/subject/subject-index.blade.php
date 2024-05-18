<div class="mx-auto p-8 bg-white rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Subjects by Class</h1>
        <div>
            <a href="{{ route('subjects.create') }}"
                class="ml-4 py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 flex"><x-lucide-plus
                    class="h-6 w-6" /></a>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    @forelse ($schoolClasses as $class)
        <div class="mb-8">
            <h2 class="text-lg font-semibold">{{ $class->name }}</h2>

            @php
                $subjects = \App\Models\Subject::where('school_class_id', $class->id)->get();
            @endphp

            @if ($subjects->isNotEmpty())
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $subject->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $subject->name }}</td>
                                <td class="px-6 py-4 flex justify-center items-center gap-4">
                                    <a href="{{ route('subjects.edit', $subject->id)}}" class="text-blue-600 hover:text-blue-900"><x-lucide-file-pen-line
                                        class="h-6 w-6" /></a>
                                    <button wire:click="confirmDelete({{ $subject->id }})" class="text-red-600 hover:text-red-900"><x-lucide-trash-2 class="h-6 w-6" /></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mt-4 text-gray-500">No subjects found for this class.</p>
            @endif
        </div>
    @empty
        <p class="text-gray-500">No classes found.</p>
    @endforelse
    @include('components.subject-confirm-delete')
</div>
