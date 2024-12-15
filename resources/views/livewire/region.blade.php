<div class="flex space-x-2 p-6 bg-blue-50 h-screen overflow-hidden">
    <!-- Form Section (Left) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col overflow-hidden">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6 flex items-center">
            <span class="mr-2 text-blue-500 text-3xl">+</span>
            {{ $isUpdate ? 'Edit Region' : 'Add Region' }}
        </h2>
        <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}" class="flex flex-col justify-between">
            <div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 p-2">Region Name</label>
                    <input 
                        type="text" 
                        wire:model="region" 
                        class="w-full border rounded-md p-2 text-sm focus:outline-blue-500" 
                    />
                    @error('region') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex space-x-2">
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition">
                    {{ $isUpdate ? 'Update Region' : 'Add Region' }}
                </button>
                @if ($isUpdate)
                    <button 
                        type="button" 
                        wire:click="cancelEdit" 
                        class="w-full bg-gray-400 text-white py-3 rounded-md hover:bg-gray-500 transition">
                        Cancel Edit
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Section (Right) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Region List</h2>
        @if (session()->has('message'))
            <div class="text-green-600 text-sm mb-4">{{ session('message') }}</div>
        @endif
        <div class="overflow-y-auto h-full">
            <table class="w-full border rounded-lg overflow-hidden">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="p-3 text-left font-medium text-gray-700">Region Name</th>
                        <th class="p-3 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regions as $region)
                        <tr class="border-b">
                            <td class="p-3">{{ $region->region }}</td>
                            <td class="p-3">
                                <button 
                                    wire:click="edit({{ $region->id }})" 
                                    class="text-blue-500 hover:text-blue-700 mx-1">
                                    ✏️
                                </button>
                                <button 
                                    wire:click="delete({{ $region->id }})" 
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
