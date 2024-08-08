<div class="mx-auto p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Manage Blog</h2>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Main Title and Description Form -->
    <form wire:submit.prevent="storeSection" class="grid grid-cols-1 gap-6 mb-8">
        <!-- Main Title -->
        <div class="col-span-1">
            <label for="main_title" class="block text-sm font-medium ">Main Title</label>
            <input type="text" wire:model="main_title" id="main_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('main_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="col-span-1">
            <label for="description" class="block text-sm font-medium ">Description</label>
            <textarea wire:model="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Background Image -->
        <div class="col-span-1">
            <label for="background_image" class="block text-sm font-medium ">Background Image</label>
            <input type="file" wire:model="background_image" id="background_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($background_image)
                <img src="{{ $background_image->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif ($background_image_path)
                <img src="{{ asset('storage/' . $background_image_path) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('background_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-span-1">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                Save Section
            </button>
        </div>
    </form>

    <!-- Blog Form -->
    <form wire:submit.prevent="{{ $blogId ? 'updateBlog' : 'storeBlog' }}" class="grid grid-cols-1 gap-6 mb-8">
        <div>
            <label for="title" class="block text-sm font-medium ">Title</label>
            <input type="text" wire:model="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Content -->
        <div>
            <label for="content" class="block text-sm font-medium ">Content</label>
            <textarea wire:model="content" id="content" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Thumbnail -->
        <div>
            <label for="thumbnail" class="block text-sm font-medium ">Thumbnail</label>
            <input type="file" wire:model="thumbnail" id="thumbnail" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($thumbnail)
                <img src="{{ $thumbnail->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif($thumbnail_path)
                <img src="{{ asset('storage/' . $thumbnail_path) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('thumbnail') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                {{ $blogId ? 'Update Blog' : 'Add Blog' }}
            </button>
        </div>
    </form>

    <!-- List of Blogs -->
    <div class="mt-8">
        <h3 class="text-xl font-bold mb-4">Blogs</h3>
        <ul>
            @foreach ($blogs as $blog)
                <li class="flex items-center justify-between mb-4 p-4 border rounded-lg">
                    <div>
                        <h4 class="text-lg font-semibold">{{ $blog['title'] }}</h4>
                        <p class="text-sm ">{{ $blog['content'] }}</p>
                        @if($blog['thumbnail'])
                            <img src="{{ asset('storage/' . $blog['thumbnail']) }}" class="mt-2 w-32 h-32 object-cover">

                        @endif
                    </div>
                    <div>
                        <button wire:click="editBlog({{ $blog['id'] }})" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-400 transition">
                            Edit
                        </button>
                        <button wire:click="deleteBlog({{ $blog['id'] }})" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-400 transition">
                            Delete
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
