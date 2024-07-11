<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium">
                Create Device
            </h3>
        </div>
        <div class="px-4 py-5 sm:p-6">
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {!! session('success') !!}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {!! session('error') !!}
                </div>
            @endif

            <form wire:submit.prevent="store" class="space-y-6">
                @csrf

                <div class="form-group">
                    <label class="block text-sm font-medium" for="name">Device Name</label>
                    <input wire:model="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror" type="text" name="name" id="name" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium" for="ip">Device IP</label>
                    <input wire:model="ip" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('ip') border-red-500 @enderror" type="text" name="ip" id="ip" required>
                    @error('ip') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-600 focus:outline-none focus:border-red-600 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">
                        Save
                    </button>
                </div>
            </form>

            <div class="mt-4">
                <button wire:click="getDeviceName" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">Get Device Name</button>
                @if ($deviceName)
                    <div class="mt-2">
                        <strong class=">Device Name:</strong> <span class=">{{ $deviceName }}</span>
                    </div>
                @endif
            </div>


            <div class="mt-4">
                <button wire:click="getUsers" class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-500 active:bg-teal-600 focus:outline-none focus:border-teal-600 focus:ring ring-teal-300 disabled:opacity-25 transition ease-in-out duration-150">Get Users</button>
                @if (!empty($users))
                    <div class="mt-2">
                        <strong class=">Users:</strong>
                        <ul class="list-disc pl-5">
                            @foreach ($users as $user)
                                <li class=">{{ $user['name'] ?? 'N/A' }} (ID: {{ $user['id'] ?? 'N/A' }})</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <label for="selectedDevice" class="block text-sm font-medium">Select a Device</label>
                <select wire:model="selectedDevice" id="selectedDevice" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">Select a Device</option>
                    @foreach ($fingerDevices as $device)
                        <option value="{{ $device->id }}">{{ $device->name }}</option>
                    @endforeach
                </select>
                <button wire:click="deviceSelected" class="mt-2 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-600 focus:outline-none focus:border-indigo-600 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">Select Device</button>
            </div>

            @if ($fingerDevice)
                <h3 class="mt-4 text-lg leading-6 font-medium">Selected Device: {{ $fingerDevice->name }}</h3>
                <button wire:click="addTeachers" wire:loading.attr="disabled" class="mt-2 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-600 focus:outline-none focus:border-green-600 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <span wire:loading.remove>Add Teachers to Device</span>
                    <span wire:loading>Loading...</span>
                </button>
                <button wire:click="getAttendance" wire:loading.attr="disabled" class="mt-2 inline-flex items-center px-4 py-2 bg-cyan-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-500 active:bg-cyan-600 focus:outline-none focus:border-cyan-600 focus:ring ring-cyan-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <span wire:loading.remove>Get Attendance Logs</span>
                    <span wire:loading>Loading...</span>
                </button>
            @endif


            @if (!empty($teachers))
            <h4 class="mt-4 text-lg leading-6 font-medium">Teachers Available:</h4>
            <ul class= list-disc pl-5">
                @foreach ($teachers as $teacher)
                    <li>{{ $teacher->name }}</li>
                @endforeach
            </ul>
        @endif

        @if (!empty($attendanceLogs))
            <h4 class="mt-4 text-lg leading-6 font-medium">Attendance Logs:</h4>
            <table class="mt-2 min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">State</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($attendanceLogs as $log)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $log->uid }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $log->teacher->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $log->state }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ \Carbon\Carbon::parse($log->timestamp)->format('Y-m-d H:i:s') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $log->type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        </div>
    </div>
</div>
