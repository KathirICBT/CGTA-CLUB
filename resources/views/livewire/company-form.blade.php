<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6" wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Member</label>
        <select wire:model="member_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">-- Select Member --</option>
            @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->first_name }}</option>
            @endforeach
        </select>
        @error('member_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Package</label>
        <select wire:model="package_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">-- Select Package --</option>
            @foreach ($packages as $package)
                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
            @endforeach
        </select>
        @error('package_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" wire:model="companyName" placeholder="Company Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <input type="email" wire:model="email" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" wire:model="phonenumber" placeholder="Phone Number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <input type="text" wire:model="address" placeholder="Address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Join Date</label>
        <input type="date" wire:model="joinDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <textarea wire:model="services" placeholder="Services" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        <textarea wire:model="bio" placeholder="Bio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-4"></textarea>
    </div>

    <div class="mb-4">
        <input type="file" wire:model="logoImg" class="block w-full text-gray-700">
    </div>

    <!-- Region and City fields on the same line -->
    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Region</label>
            <select wire:model="region_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">-- Select Region --</option>
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->region }}</option>
                @endforeach
            </select>
            @error('region_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">City</label>
            <input type="text" wire:model="city" placeholder="City" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        {{ $isUpdate ? 'Update' : 'Add' }}
    </button>
</form>