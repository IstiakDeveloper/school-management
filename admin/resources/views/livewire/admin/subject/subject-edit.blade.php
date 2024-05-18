<div class="mx-auto p-8 bg-white rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Edit Subject</h2>

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input wire:model="name" type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea wire:model="description" id="description" name="description" rows="3" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="school_class_id" class="block text-sm font-medium text-gray-700">School Class:</label>
            <select wire:model="school_class_id" id="school_class_id" name="school_class_id" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <option value="">Select School Class</option>
                @foreach ($schoolClasses as $schoolClass)
                    <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                @endforeach
            </select>
            @error('school_class_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mt-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update Subject
            </button>
        </div>
    </form>
</div>
