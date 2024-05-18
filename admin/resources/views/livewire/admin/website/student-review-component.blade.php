<div class="container mx-auto p-8 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Manage Student Reviews Section</h2>
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

    <!-- Student Review Form -->
    <form wire:submit.prevent="storeReview" class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Review Stars -->
        <div>
            <label for="review_stars" class="block text-sm font-medium text-gray-700">Review Stars</label>
            <select wire:model="review_stars" id="review_stars" class="p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Select stars</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('review_stars') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Review Summary -->
        <div>
            <label for="review_summary" class="block text-sm font-medium text-gray-700">Review Summary</label>
            <input type="text" wire:model="review_summary" id="review_summary" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('review_summary') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Review Name -->
        <div>
            <label for="review_name" class="block text-sm font-medium text-gray-700">Review Name</label>
            <input type="text" wire:model="review_name" id="review_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('review_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Submit Button -->
        <div class="col-span-2">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                Add Review
            </button>
        </div>
    </form>

    <!-- List of Student Reviews -->
    <div class="mt-8">
        <h3 class="text-xl font-bold mb-4">Student Reviews</h3>
        <ul>
            @foreach ($reviews as $review)
                <li class="flex items-center justify-between mb-4 p-4 bg-gray-100 rounded-lg">
                    <div>
                        <p class="text-sm text-gray-700">Stars: {{ $review['stars'] }} - Summary: {{ $review['summary'] }} - Name: {{ $review['name'] }}</p>
                    </div>
                    <button wire:click="deleteReview({{ $review['id'] }})" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-400 transition">
                        Delete
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
