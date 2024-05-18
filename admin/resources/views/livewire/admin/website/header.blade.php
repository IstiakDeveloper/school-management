<div class="container mx-auto p-8 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Manage Logo</h2>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Logo Form -->
    <form wire:submit.prevent="{{ $logoId ? 'updateLogo' : 'storeLogo' }}" class="grid grid-cols-1 gap-6 mb-8">
        <!-- Logo Text -->
        <div>
            <label for="logo_text" class="block text-sm font-medium text-gray-700">Logo Text</label>
            <input type="text" wire:model="logo_text" id="logo_text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('logo_text') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <!-- Logo -->
        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
            <input type="file" wire:model="logo" id="logo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($logo)
                <img src="{{ $logo->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover">
            @elseif($logo_path)
                <img src="{{ Storage::disk('public')->url($logo_path)}}" class="mt-2 w-32 h-32 object-cover">
            @endif
            @error('logo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                {{ $logoId ? 'Update Logo' : 'Add Logo' }}
            </button>
            @if ($logoId)
                <button wire:click.prevent="deleteLogo" class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 transition ml-4">
                    Delete Logo
                </button>
            @endif
        </div>
    </form>

</div>
