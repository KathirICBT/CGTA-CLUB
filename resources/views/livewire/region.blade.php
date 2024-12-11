<div class="container mx-auto p-4">
    <div class="flex">
        <!-- Left: Regions Table -->
        <div class="w-1/2 p-4">
            @if (session()->has('message'))
                <div class="bg-green-500 text-white p-2 mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Region Name</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regions as $region)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $region->region }}</td>
                            <td class="px-4 py-2 border-b">
                                <button wire:click="edit({{ $region->id }})" class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                <button wire:click="delete({{ $region->id }})" class="text-red-500 hover:text-red-700">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Right: Add/Update Form -->
        <div class="w-1/2 p-4">
            <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}" class="space-y-4">
                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700">Region Name</label>
                    <input type="text" wire:model="region" id="region" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    @error('region') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-lg hover:bg-indigo-700">
                        {{ $isUpdate ? 'Update' : 'Add' }} Region
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
