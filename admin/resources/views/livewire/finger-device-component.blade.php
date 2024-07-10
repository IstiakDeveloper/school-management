<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.finger_device.title_singular') }}
    </div>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
        @endif

        <form wire:submit.prevent="store">
            @csrf

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.finger_device.fields.name') }}</label>
                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                <span class="help-block">{{ trans('cruds.finger_device.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="ip">{{ trans('cruds.finger_device.fields.ip') }}</label>
                <input wire:model="ip" class="form-control @error('ip') is-invalid @enderror" type="text" name="ip" id="ip" required>
                @error('ip') <span class="text-danger">{{ $message }}</span> @enderror
                <span class="help-block">{{ trans('cruds.finger_device.fields.ip_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>

        <div class="mt-4">
            <button wire:click="getDeviceName" class="btn btn-primary">Get Device Name</button>
            @if ($deviceName)
                <div class="mt-2">
                    <strong>Device Name:</strong> {{ $deviceName }}
                </div>
            @endif
        </div>

        <div class="mt-4">
            <button wire:click="setDemoUser" class="btn btn-secondary">Set Demo User</button>
        </div>

        <div class="mt-4">
            <button wire:click="getUsers" class="btn btn-info">Get Users</button>
            @if (!empty($users))
                <div class="mt-2">
                    <strong>Users:</strong>
                    <ul>
                        @foreach ($users as $user)
                            <li>{{ $user['name'] ?? 'N/A' }} (ID: {{ $user['id'] ?? 'N/A' }})</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


        <select wire:model="selectedDevice">
            <option value="">Select a Device</option>
            @foreach ($fingerDevices as $device)
                <option value="{{ $device->id }}">{{ $device->name }}</option>
            @endforeach
        </select>
    
        <button wire:click="deviceSelected" class="btn btn-primary">Select Device</button>
    
        <!-- Display device information or other actions -->
        @if ($fingerDevice)
            <h3>Selected Device: {{ $fingerDevice->name }}</h3>
            <button wire:click="addTeachers" class="btn btn-success">Add Teachers to Device</button>
            <button wire:click="getAttendance" class="btn btn-info">Get Attendance Logs</button>
        @endif

        <!-- Display teachers -->
        @if (!empty($teachers))
            <h4>Teachers Available:</h4>
            <ul>
                @foreach ($teachers as $teacher)
                    <li>{{ $teacher->name }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Display attendance logs -->
        @if (!empty($attendanceLogs))
            <h4>Attendance Logs:</h4>
            <ul>
                @foreach ($attendanceLogs as $log)
                    <li>
                        UID: {{ $log['uid'] }}, 
                        ID: {{ $log['id'] }}, 
                        State: {{ $log['state'] }}, 
                        Timestamp: {{ $log['timestamp'] }}, 
                        Type: {{ $log['type'] }}
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Display flash messages -->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
        @endif
    
    </div>
</div>
