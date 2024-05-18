<div>
    <div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New School Class</h2>
            <form wire:submit.prevent="submit">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Class Name</label>
                    <input wire:model="name" type="text" class="form-input shadow-sm w-full p-2 border focus:outline-none rounded-md" id="name" required>
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Class</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Display table showing school classes and their associated branches -->
    <div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">School Classes</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Class Name</th>
                        <th class="px-4 py-2">Branches</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $class)
                        <tr>
                            <td class="border px-4 py-2">{{ $class->name }}</td>
                            <td class="border px-4 py-2">
                                <ul>
                                    @foreach($class->branches as $branch)
                                        <li>{{ $branch->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
