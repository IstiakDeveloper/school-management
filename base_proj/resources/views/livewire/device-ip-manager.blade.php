<div>
    <input type="text" wire:model="ip_address" placeholder="Enter IP address">
    <button wire:click="addDeviceIp">Add IP</button>

    <ul>
        @foreach ($deviceIps as $deviceIp)
            <li>
                {{ $deviceIp->ip_address }}
                <button wire:click="deleteDeviceIp({{ $deviceIp->id }})">Delete</button>
            </li>
        @endforeach
    </ul>

    <div>
        <button wire:click="clearAttendanceLog">Clear Attendance Log</button>
    </div>
</div>
