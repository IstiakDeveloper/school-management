<div>
    <div class="flex justify-between items-center mb-4">
        <input type="text" wire:model.live="searchTerm" placeholder="Search..." class="border rounded p-2">

        <a href="{{ route('teachers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Teacher</a>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Name (Bangla)</th>
                <th class="border px-4 py-2">Name (English)</th>
                <th class="border px-4 py-2">Mobile Number</th>
                <th class="border px-4 py-2">Designation</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td class="border px-4 py-2">{{ $teacher->name_bn }}</td>
                    <td class="border px-4 py-2">{{ $teacher->name_en }}</td>
                    <td class="border px-4 py-2">{{ $teacher->mobile_number }}</td>
                    <td class="border px-4 py-2">{{ $teacher->designation }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <button wire:click="deleteTeacher({{ $teacher->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        <a href="{{ route('teachers.show', ['teacher' => $teacher->id]) }}" class="text-blue-500 hover:underline">View Profile</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $teachers->links() }}
</div>
