<div class="isolate bg-gray-100 min-h-screen px-6 py-5 sm:py-5 lg:px-8 md:w-full mx-3 overflow-x-hidden scrollbar-custom">
    <nav class="flex items-center text-gray-600 text-md mb-4">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{ route('company') }}" class="hover:text-sky-500">
                    Companies
                </a>
            </li>
            <li>
                <span class="mx-1 text-gray-400">/</span>
            </li>
            <li class="text-gray-500">
                Add Company
            </li>
        </ol>
    </nav>
    <form wire:submit.prevent="saveCompany" class="bg-white mx-auto mt-8 sm:mt-8 md:w-full overflow-auto p-10 border rounded-2xl shadow-xl scrollbar-custom">
        <label for="company_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1">
            COMPANY DETAILS
        </label>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mt-5">
            <div>
                <label for="member_id" class="block text-md font-semibold leading-6 text-gray-500">
                    Member
                </label>
                <div class="mt-1">
                    <select wire:model="member_id" class="block w-full border-0 px-3.5 py-3 rounded-lg shadow-sm ring-1 ring-inset bg-white ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6">
                        <option value="">-- Select Member --</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->first_name }}</option>
                        @endforeach
                    </select>
                    @error('member_id') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="package_id" class="block text-md font-semibold leading-6 text-gray-500">
                    Package
                </label>
                <div class="mt-1">
                    <select wire:model="package_id" class="block w-full border-0 px-3.5 py-3 rounded-lg shadow-sm ring-1 ring-inset bg-white ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6">
                        <option value="">-- Select Package --</option>
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                        @endforeach
                    </select>
                    @error('package_id') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="company_name" class="block text-md font-semibold leading-6 text-gray-500">
                    Company Name
                </label>
                <div class="mt-1">
                    <input type="text" wire:model="companyName" placeholder="Company Name"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('companyName') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block text-md font-semibold leading-6 text-gray-500">
                    Email
                </label>
                <div class="mt-1">
                    <input type="email" wire:model="email" placeholder="Email"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('email') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="phonenumber" class="block text-md font-semibold leading-6 text-gray-500">
                    Phone Number
                </label>
                <div class="mt-1">
                    <input type="text" wire:model="phonenumber" placeholder="Phone Number"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('phonenumber') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="address" class="block text-md font-semibold leading-6 text-gray-500">
                    Address
                </label>
                <div class="mt-1">
                    <input type="text" wire:model="address" placeholder="Address"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('address') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="joinDate" class="block text-md font-semibold leading-6 text-gray-500">
                    Join Date
                </label>
                <div class="mt-1">
                    <input type="date" wire:model="joinDate"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('joinDate') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="services" class="block text-md font-semibold leading-6 text-gray-500">
                Services
            </label>
            <div class="mt-1">
                <textarea wire:model="services" placeholder="Describe the services offered by the company"
                          class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6"></textarea>
                @error('services') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-6 w-full flex justify-end">
            <button type="submit" class="bg-sky-400 text-black py-2 px-7 rounded-md shadow-sm hover:bg-sky-600 focus:ring-2 focus:ring-inset focus:ring-sky-700">
                Save Company
            </button>
        </div>
    </form>
</div>
