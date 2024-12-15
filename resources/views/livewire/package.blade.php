<div class="flex space-x-4 p-4 bg-blue-50 overflow-hidden">
    <!-- Form Section -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6 flex items-center">
            <span class="mr-2 text-blue-500 text-3xl">+</span>
            {{ $isEditMode ? 'Edit Package' : 'Add Package' }}
        </h2>
        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Package Name</label>
                <input type="text" wire:model="package_name" class="w-full border rounded-md p-2 focus:outline-blue-500" />
                @error('package_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Package Price</label>
                <input type="number" wire:model="package_price" step="0.01" min="0" class="w-full border rounded-md p-2 focus:outline-blue-500" />
                @error('package_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tax</label>
                <input type="number" wire:model="tax" class="w-full border rounded-md p-2 focus:outline-blue-500" />
                @error('tax') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea wire:model="description" class="w-full border rounded-md p-2 focus:outline-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Duration (in days)</label>
                <input type="number" wire:model="duration" class="w-full border rounded-md p-2 focus:outline-blue-500" />
                @error('duration') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Max Member Count</label>
                <input type="number" wire:model="max_membercount" class="w-full border rounded-md p-2 focus:outline-blue-500" />
                @error('max_membercount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="space-x-4 mt-4 flex">
                <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition">
                    {{ $isEditMode ? 'Update Package' : 'Add Package' }}
                </button>
                @if ($isEditMode)
                    <button type="button" wire:click="cancelEdit" class="w-full bg-gray-400 text-white py-3 rounded-md hover:bg-gray-500 transition">
                        Cancel
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="w-2/3 bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Package List</h2>
        @if (session()->has('message'))
            <div class="text-green-600 text-sm mb-4">{{ session('message') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table class="w-full border rounded-lg overflow-hidden">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="p-3 text-left font-medium text-gray-700">Name</th>
                        <th class="p-3 text-left font-medium text-gray-700">Price</th>
                        <th class="p-3 text-left font-medium text-gray-700">Tax</th>
                        <th class="p-3 text-left font-medium text-gray-700">Description</th>
                        <th class="p-3 text-left font-medium text-gray-700">Duration</th>
                        <th class="p-3 text-left font-medium text-gray-700">Max Members</th>
                        <th class="p-3 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr class="border-b">
                            <td class="p-3">{{ $package->package_name }}</td>
                            <td class="p-3">${{ number_format($package->package_price, 2) }}</td>
                            <td class="p-3">{{ $package->tax }}%</td>
                            <td class="p-3 text-gray-600">{{ Str::limit($package->description, 50) }}</td>
                            <td class="p-3">{{ $package->duration }} days</td>
                            <td class="p-3">{{ $package->max_membercount }}</td>
                            <td class="p-3">
                                <button wire:click="edit({{ $package->id }})" class="text-blue-500 hover:text-blue-700 mx-1">
                                    ✏️
                                </button>
                                <button wire:click="delete({{ $package->id }})" class="text-red-500 hover:text-red-700 mx-1">
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
