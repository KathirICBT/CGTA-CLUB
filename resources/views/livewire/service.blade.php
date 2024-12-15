<div class="flex space-x-4 p-6 bg-gray-100 h-screen overflow-hidden">
    <!-- Add Service Form (Left) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4 flex items-center">
            <span class="mr-2 text-blue-500 text-3xl">+</span>
            {{ $isUpdate ? 'Update Service' : 'Add Service' }}
        </h2>
        <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
            <div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Service Name</label>
                    <input 
                        type="text" 
                        wire:model="service" 
                        class="w-full border rounded-md p-3 text-sm focus:outline-blue-500" 
                    />
                    @error('service') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea 
                        wire:model="description" 
                        class="w-full border rounded-md p-3 text-sm focus:outline-blue-500" 
                    ></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="space-x-4 mt-2 flex">
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                    {{ $isUpdate ? 'Update Service' : 'Add Service' }}
                </button>
                @if ($isUpdate)
                    <button 
                        type="button" 
                        wire:click="cancelEdit" 
                        class="w-full bg-gray-400 text-white py-2 rounded-md hover:bg-gray-500 transition">
                        Cancel
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- Service List Table (Right) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Service List</h2>
        @if (session()->has('message'))
            <div class="text-green-600 text-sm mb-4">{{ session('message') }}</div>
        @endif
        <div class="overflow-y-auto h-full">
            <table class="w-full border rounded-lg overflow-hidden">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="p-3 text-left font-medium text-gray-700">Service Name</th>
                        <th class="p-3 text-left font-medium text-gray-700">Description</th>
                        <th class="p-3 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr class="border-b">
                            <td class="p-3 text-sm text-gray-700">{{ $service->service }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $service->description }}</td>
                            <td class="p-3 text-sm">
                                <button 
                                    wire:click="edit({{ $service->id }})" 
                                    class="text-blue-500 hover:text-blue-700 mx-1">
                                    ✏️
                                </button>
                                <button 
                                    wire:click="delete({{ $service->id }})" 
                                    class="text-red-500 hover:text-red-700 mx-1">
                                    🗑️
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
