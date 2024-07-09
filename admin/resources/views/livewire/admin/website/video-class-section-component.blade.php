<div class="mx-auto p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Manage Video Classes Section</h2>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Main Title and Description Form -->
    <form wire:submit.prevent="storeSection" class="grid grid-cols-1 gap-6 mb-8">
        <!-- Main Title -->
        <div class="col-span-1">
            <label for="main_title" class="block text-sm font-medium text-gray-700">Main Title</label>
            <input type="text" wire:model="main_title" id="main_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('main_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Description -->
        <div class="col-span-1">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea wire:model="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Submit Button -->
        <div class="col-span-1">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                Save Section
            </button>
        </div>
    </form>

    <!-- Video Class Form -->
    <form wire:submit.prevent="storeVideoClass" class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Video Class Title -->
        <div>
            <label for="video_class_title" class="block text-sm font-medium text-gray-700">Video Class Title</label>
            <input type="text" wire:model="video_class_title" id="video_class_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('video_class_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Video Class Subtitle -->
        <div>
            <label for="video_class_subtitle" class="block text-sm font-medium text-gray-700">Video Class Subtitle</label>
            <input type="text" wire:model="video_class_subtitle" id="video_class_subtitle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('video_class_subtitle') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Video Class URL -->
        <div>
            <label for="video_class_url" class="block text-sm font-medium text-gray-700">Video Class URL</label>
            <input type="text" wire:model="video_class_url" id="video_class_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('video_class_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Video Class Thumbnail -->
        <div>
            <label for="video_class_thumbnail" class="block text-sm font-medium text-gray-700">Video Class Thumbnail</label>
            <input type="file" wire:model="video_class_thumbnail" id="video_class_thumbnail" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($video_class_thumbnail)
                <img src="{{ $video_class_thumbnail->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('video_class_thumbnail') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Submit Button -->
        <div class="col-span-2">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                Add Video Class
            </button>
        </div>
    </form>

    <!-- List of Video Classes -->
    <div class="mt-8">
        <h3 class="text-xl font-bold mb-4">Video Classes</h3>
        <ul>
            @foreach ($classes as $class)
                <li class="flex items-center justify-between mb-4 p-4 border rounded-lg">
                    <div>
                        <h4 class="text-lg font-semibold">{{ $class['title'] }}</h4>
                        <p class="text-sm text-gray-700">{{ $class['subtitle'] }}</p>
                        <a href="{{ $class['url'] }}" class="text-indigo-500" target="_blank">{{ $class['url'] }}</a>
                    </div>
                    <button wire:click="deleteVideoClass({{ $class['id'] }})" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-400 transition">
                        Delete
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
