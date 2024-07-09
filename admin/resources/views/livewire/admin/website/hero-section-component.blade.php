<div class="mx-auto p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Manage Hero Section</h2>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="storeHeroSection" class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Small Title -->
        <div class="col-span-1 md:col-span-2">
            <label for="small_title" class="block text-sm font-medium text-gray-700">Small Title</label>
            <input type="text" wire:model="small_title" id="small_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('small_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Big Title -->
        <div class="col-span-1 md:col-span-2">
            <label for="big_title" class="block text-sm font-medium text-gray-700">Big Title</label>
            <input type="text" wire:model="big_title" id="big_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('big_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Link 1 Text -->
        <div>
            <label for="link1_text" class="block text-sm font-medium text-gray-700">Link 1 Text</label>
            <input type="text" wire:model="link1_text" id="link1_text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('link1_text') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Link 1 URL -->
        <div>
            <label for="link1_url" class="block text-sm font-medium text-gray-700">Link 1 URL</label>
            <input type="text" wire:model="link1_url" id="link1_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('link1_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Link 2 Text -->
        <div>
            <label for="link2_text" class="block text-sm font-medium text-gray-700">Link 2 Text</label>
            <input type="text" wire:model="link2_text" id="link2_text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('link2_text') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Link 2 URL -->
        <div>
            <label for="link2_url" class="block text-sm font-medium text-gray-700">Link 2 URL</label>
            <input type="text" wire:model="link2_url" id="link2_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('link2_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Service 1 Title -->
        <div>
            <label for="service1_title" class="block text-sm font-medium text-gray-700">Service 1 Title</label>
            <input type="text" wire:model="service1_title" id="service1_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('service1_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Service 1 Image -->
        <div>
            <label for="service1_image" class="block text-sm font-medium text-gray-700">Service 1 Image</label>
            <input type="file" wire:model="service1_image" id="service1_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($service1_image)
                <img src="{{ $service1_image->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif ($service1_image_path)
                <img src="{{ Storage::disk('public')->url($service1_image_path) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('service1_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Service 2 Title -->
        <div>
            <label for="service2_title" class="block text-sm font-medium text-gray-700">Service 2 Title</label>
            <input type="text" wire:model="service2_title" id="service2_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('service2_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Service 2 Image -->
        <div>
            <label for="service2_image" class="block text-sm font-medium text-gray-700">Service 2 Image</label>
            <input type="file" wire:model="service2_image" id="service2_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($service2_image)
                <img src="{{ $service2_image->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif ($service2_image_path)
                <img src="{{ Storage::disk('public')->url($service2_image_path) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('service2_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Service 3 Title -->
        <div>
            <label for="service3_title" class="block text-sm font-medium text-gray-700">Service 3 Title</label>
            <input type="text" wire:model="service3_title" id="service3_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('service3_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Service 3 Image -->
        <div>
            <label for="service3_image" class="block text-sm font-medium text-gray-700">Service 3 Image</label>
            <input type="file" wire:model="service3_image" id="service3_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($service3_image)
                <img src="{{ $service3_image->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif ($service3_image_path)
                <img src="{{ Storage::disk('public')->url($service3_image_path) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('service3_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Background Image -->
        <div class="col-span-1 md:col-span-2">
            <label for="background_image" class="block text-sm font-medium text-gray-700">Background Image</label>
            <input type="file" wire:model="background_image" id="background_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($background_image)
                <img src="{{ $background_image->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif ($background_image_path)
                <img src="{{ Storage::disk('public')->url($background_image_path) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('background_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Submit Button -->
        <div class="col-span-1 md:col-span-2 flex justify-center">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                Save Hero Section
            </button>
        </div>
    </form>
</div>
