<div class="flex space-x-2 p-6 bg-blue-50 h-screen overflow-hidden">
    <!-- Form Section (Left) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col overflow-hidden">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6 flex items-center">
            <span class="mr-2 text-blue-500 text-3xl">+</span>
            {{ $isUpdate ? 'Edit Package Service' : 'Add Package Service' }}
        </h2>
        <form wire:submit.prevent="{{ $isUpdate ? 'updatePackageService' : 'storePackageServices' }}" class="flex flex-col justify-between">
            <div class="mb-4">
                <!-- Package Dropdown (Select once) -->
                <label class="block text-sm font-medium text-gray-700 p-2">Select Package</label>
                <select wire:model="package_id" class="w-full border rounded-md p-2 text-sm focus:outline-blue-500">
                    <option value="">-- Select Package --</option>
                    @foreach ($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                    @endforeach
                </select>
                @error('package_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Dynamic Services -->
            <div id="service-selects-container">
                @foreach ($selected_services as $index => $service)
                    <div class="mb-4 service-select-item">
                        <label class="block text-sm font-medium text-gray-700 p-2">Select Service</label>
                        <select wire:model="selected_services.{{ $index }}" class="w-full border rounded-md p-2 text-sm focus:outline-blue-500">
                            <option value="">-- Select Service --</option>
                            @foreach ($services as $serviceOption)
                                <option value="{{ $serviceOption->id }}">{{ $serviceOption->service }}</option>
                            @endforeach
                        </select>
                        @error('selected_services.' . $index) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                @endforeach
            </div>

            <!-- Add More Services Button -->
            <button type="button" wire:click="addServiceField" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition mb-4">
                + Add Service
            </button>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition">
                {{ $isUpdate ? 'Update Package Service' : 'Add Package Service' }}
            </button>
        </form>

        <!-- Cancel Edit Button (Only shown when updating) -->
        @if ($isUpdate)
            <button wire:click="cancelEdit" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 transition mt-4">
                Cancel Edit
            </button>
        @endif
    </div>

    <!-- Table Section (Right) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Package Service List</h2>

        @if (session()->has('message'))
            <div class="text-green-600 text-sm mb-4">{{ session('message') }}</div>
        @endif

        <div class="overflow-y-auto h-full">
            <table class="w-full border rounded-lg overflow-hidden">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="p-3 text-left font-medium text-gray-700">Package</th>
                        <th class="p-3 text-left font-medium text-gray-700">Service</th>
                        <th class="p-3 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packageServices as $packageService)
                        <tr class="border-b">
                            <td class="p-3">{{ $packageService->package->package_name }}</td>
                            <td class="p-3">{{ $packageService->service->service }}</td>
                            <td class="p-3">
                                <button wire:click="editPackageService({{ $packageService->id }})" class="text-yellow-500 hover:text-yellow-700 mx-1">
                                    ✏️
                                </button>
                                <button wire:click="deletePackageService({{ $packageService->id }})" class="text-red-500 hover:text-red-700 mx-1">
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

<script>
    // JavaScript function to add a new service field dynamically
    let serviceFieldCount = 1;

    function addServiceField() {
        const container = document.getElementById('service-selects-container');
        const newServiceField = document.createElement('div');
        newServiceField.classList.add('mb-4', 'service-select-item');
        newServiceField.innerHTML = `
            <label class="block text-sm font-medium text-gray-700 p-2">Select Service</label>
            <select wire:model="selected_services.${serviceFieldCount}" class="w-full border rounded-md p-2 text-sm focus:outline-blue-500">
                <option value="">-- Select Service --</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->service }}</option>
                @endforeach
            </select>
            @error('selected_services.${serviceFieldCount}') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        `;
        container.appendChild(newServiceField);
        serviceFieldCount++;
    }
</script>
