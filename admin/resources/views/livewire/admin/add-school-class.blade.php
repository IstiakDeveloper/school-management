<div>
    <div>
        <div class="shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-semibold mb-4">Add New School Class</h2>
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
    
    <div>
        <div class="shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-semibold mb-4">School Classes</h2>
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Branches</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($classes as $class)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $class->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
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
