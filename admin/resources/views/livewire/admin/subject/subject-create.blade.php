<div class="mx-auto p-8 bg-white rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">Create New Subject</h1>

    <form wire:submit.prevent="store" class="space-y-4">
        <div class="flex flex-col">
            <label for="name" class="text-sm font-medium text-gray-700">Subject Name</label>
            <input wire:model.defer="name" type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="school_class_id" class="text-sm font-medium text-gray-700">Associated Class</label>
            <select wire:model.defer="school_class_id" id="school_class_id" name="school_class_id" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <option value="">Select Class</option>
                @foreach ($schoolClasses as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            @error('school_class_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Create Subject</button>
        </div>
    </form>
</div>
