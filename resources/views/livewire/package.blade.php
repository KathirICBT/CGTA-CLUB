<div class="flex space-x-4">
    <!-- Form Section -->
    <div class="w-1/2 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-bold mb-4">{{ $isEditMode ? 'Edit Package' : 'Add Package' }}</h2>
        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
            <div class="mb-3">
                <label class="block font-medium text-sm text-gray-700">Package Name</label>
                <input type="text" wire:model="package_name" class="w-full border rounded p-2" />
                @error('package_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="block font-medium text-sm text-gray-700">Package Price</label>
                <input type="number" wire:model="package_price" class="w-full border rounded p-2" />
                @error('package_price') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="block font-medium text-sm text-gray-700">Tax</label>
                <input type="number" wire:model="tax" class="w-full border rounded p-2" />
                @error('tax') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="block font-medium text-sm text-gray-700">Description</label>
                <textarea wire:model="description" class="w-full border rounded p-2"></textarea>
            </div>
            <div class="mb-3">
                <label class="block font-medium text-sm text-gray-700">Duration</label>
                <input type="number" wire:model="duration" class="w-full border rounded p-2" />
                @error('duration') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="block font-medium text-sm text-gray-700">Max Member Count</label>
                <input type="number" wire:model="max_membercount" class="w-full border rounded p-2" />
                @error('max_membercount') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                {{ $isEditMode ? 'Update' : 'Add' }}
            </button>
        </form>
    </div>

    <!-- Table Section -->
    <div class="w-1/2 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Package List</h2>
        @if (session()->has('message'))
            <div class="text-green-500 mb-3">{{ session('message') }}</div>
        @endif
        <table class="w-full border-collapse border">
            <thead>
                <tr>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Price</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td class="border p-2">{{ $package->package_name }}</td>
                        <td class="border p-2">{{ $package->package_price }}</td>
                        <td class="border p-2">
                            <button wire:click="edit({{ $package->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                            <button wire:click="delete({{ $package->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
