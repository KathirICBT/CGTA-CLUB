<div class="container mx-auto p-6 bg-gray-100 min-h-screen overflow-auto flex flex-col">
    <!-- Service Table -->
    <div class="w-full mb-12">
        <div class="bg-white shadow-lg rounded-lg p-6">
            @if (session()->has('message'))
                <div class="bg-green-500 text-white p-3 mb-4 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            <h2 class="text-2xl font-semibold mb-6 text-gray-800 border-b pb-2">Service List</h2>
            <table class="w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Service Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Description</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-3 border-b text-sm text-gray-700">{{ $service->service }}</td>
                            <td class="px-6 py-3 border-b text-sm text-gray-700">{{ $service->description }}</td>
                            <td class="px-6 py-3 border-b text-sm flex space-x-4">
                                <button wire:click="edit({{ $service->id }})" 
                                    class="text-blue-600 hover:text-blue-800 font-medium px-4">Edit</button>
                                <button wire:click="delete({{ $service->id }})" 
                                    class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Update Service Form -->
    <div class="w-full">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 border-b pb-2">
                {{ $isUpdate ? 'Update Service' : 'Create Service' }}
            </h2>
            <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}" class="space-y-6">
                <div>
                    <label for="service" class="block text-sm font-medium text-gray-700">Service Name</label>
                    <input type="text" wire:model="service" id="service" 
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    @error('service') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea wire:model="description" id="description" 
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-3"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <button type="submit" 
                        class="mt-3 w-full bg-indigo-600 text-white py-3 rounded-lg shadow-md hover:bg-indigo-700 transition ease-in-out duration-200 text-sm font-medium">
                        {{ $isUpdate ? 'Update' : 'Create' }} Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
