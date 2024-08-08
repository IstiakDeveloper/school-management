<div class="p-4">
    <div class="mb-4">
        <input type="text" wire:model="ip_address" placeholder="Enter IP address" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        @if ($editMode)
            <button wire:click="addOrUpdateDeviceIp" class="px-4 py-2 bg-yellow-500 text-white rounded-lg ml-2">Update IP</button>
        @else
            <button wire:click="addOrUpdateDeviceIp" class="px-4 py-2 bg-blue-500 text-white rounded-lg ml-2">Add IP</button>
        @endif
    </div>

    <ul class="list-disc pl-5">
        @foreach ($deviceIps as $deviceIp)
            <li class="flex justify-between items-center mb-2">
                <span>{{ $deviceIp->ip_address }}</span>
                <div>
                    <button wire:click="editDeviceIp({{ $deviceIp->id }})" class="px-4 py-2 bg-green-500 text-white rounded-lg mr-2">Edit</button>
                    <button wire:click="deleteDeviceIp({{ $deviceIp->id }})" class="px-4 py-2 bg-red-500 text-white rounded-lg">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
