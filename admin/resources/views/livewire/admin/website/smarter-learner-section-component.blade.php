<div class="container mx-auto p-8 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Manage Smarter Learner Section</h2>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="storeSection" class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Main Title -->
        <div class="col-span-2">
            <label for="main_title" class="block text-sm font-medium text-gray-700">Main Title</label>
            <input type="text" wire:model="main_title" id="main_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('main_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Description -->
        <div class="col-span-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea wire:model="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Background Image -->
        <div class="col-span-2">
            <label for="background_image" class="block text-sm font-medium text-gray-700">Background Image</label>
            <input type="file" wire:model="background_image" id="background_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($background_image)
                <img src="{{ $background_image->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif ($background_image_path)
                <img src="{{ Storage::disk('public')->url($background_image_path) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('background_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Video URL -->
        <div class="col-span-2">
            <label for="video_url" class="block text-sm font-medium text-gray-700">Video URL</label>
            <input type="text" wire:model="video_url" id="video_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('video_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 1 Title -->
        <div>
            <label for="item1_title" class="block text-sm font-medium text-gray-700">Item 1 Title</label>
            <input type="text" wire:model="item1_title" id="item1_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item1_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 1 Number -->
        <div>
            <label for="item1_number" class="block text-sm font-medium text-gray-700">Item 1 Number</label>
            <input type="number" wire:model="item1_number" id="item1_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item1_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 2 Title -->
        <div>
            <label for="item2_title" class="block text-sm font-medium text-gray-700">Item 2 Title</label>
            <input type="text" wire:model="item2_title" id="item2_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item2_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 2 Number -->
        <div>
            <label for="item2_number" class="block text-sm font-medium text-gray-700">Item 2 Number</label>
            <input type="number" wire:model="item2_number" id="item2_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item2_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 3 Title -->
        <div>
            <label for="item3_title" class="block text-sm font-medium text-gray-700">Item 3 Title</label>
            <input type="text" wire:model="item3_title" id="item3_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item3_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 3 Number -->
        <div>
            <label for="item3_number" class="block text-sm font-medium text-gray-700">Item 3 Number</label>
            <input type="number" wire:model="item3_number" id="item3_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item3_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 4 Title -->
        <div>
            <label for="item4_title" class="block text-sm font-medium text-gray-700">Item 4 Title</label>
            <input type="text" wire:model="item4_title" id="item4_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item4_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Item 4 Number -->
        <div>
            <label for="item4_number" class="block text-sm font-medium text-gray-700">Item 4 Number</label>
            <input type="number" wire:model="item4_number" id="item4_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('item4_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Submit Button -->
        <div class="col-span-2">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                Save Smarter Learner Section
            </button>
        </div>
    </form>
</div>
