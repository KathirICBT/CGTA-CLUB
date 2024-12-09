{{--<div>--}}
{{--    --}}{{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{--</div>--}}

<div class="isolate bg-white px-6 py-5 sm:py-5 lg:px-8 md:w-full rounded-lg mx-3">
    <form wire:submit.prevent="submitForm" method="POST" class="mx-auto mt-8 sm:mt-8 md:w-full overflow-auto h-[45em]">
        <button wire:click="closeForm"
                class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
            ✖
        </button>
        <label for="first_name" class="block text-lg font-semibold leading-6 text-gray-900">
            Member's Information
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mt-5">
            <div class="grid col-span-2 ">
                <label for="first_name" class="block text-sm font-semibold leading-6 text-gray-900">
                    Photo
                </label>
                <div class="mt-2.5 flex items-center justify-start">
                    <label
                        for="photo"
                        class="relative flex items-center justify-center w-24 h-24 rounded-full  overflow-hidden border-2 border-dashed border-gray-300 cursor-pointer hover:border-black">
                        @if (!$photo)
                            <span class="absolute text-sm text-gray-500">Upload Photo</span>
                        @endif
                        <input type="file" id="photo" wire:model="photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <!-- Show image preview (optional) -->
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="Uploaded Photo Preview" />
                        @elseif ($photoUrl) <!-- Show existing photo -->
                            <img src="{{ asset($photoUrl) }}" alt="Existing Photo" />
                        @endif
                    </label>
                </div>
            </div>
            <div>
                <label for="first_name" class="block text-sm font-semibold leading-6 text-gray-900">
                    First Name
                </label>
                <div class="mt-2.5">
                    <input type="text" id="first_name" wire:model="first_name"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="last_name" class="block text-sm font-semibold leading-6 text-gray-900">
                    Last Name
                </label>
                <div class="mt-2.5">
                    <input type="text" id="last_name" wire:model="last_name"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">
                    Email
                </label>
                <div class="mt-2.5">
                    <input type="text" id="email" wire:model="email"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="phone" class="block text-sm font-semibold leading-6 text-gray-900">
                    Phone Number
                </label>
                <div class="mt-2.5">
                    <input type="text" id="phone" wire:model="phone"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="date_of_birth" class="block text-sm font-semibold leading-6 text-gray-900">
                    Date of Birth
                </label>
                <div class="mt-2.5">
                    <input type="date" id="date_of_birth" wire:model="date_of_birth"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('date_of_birth') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="bio" class="block text-sm font-semibold leading-6 text-gray-900">
                    Bio
                </label>
                <div class="mt-2.5">
                    <input type="text" id="bio" wire:model="bio"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('bio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <label for="first_name" class="block text-lg font-semibold leading-6 text-gray-900 mt-5">
            Membership Information
        </label>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mt-5">
            <div>
                <label for="status" class="block text-sm font-normal leading-6 text-gray-900">
                    Status
                </label>
                <div class="mt-2.5">
                    <select id="status" wire:model="status"
                            class="block w-full border-0 px-3.5 py-3 text-gray-900 shadow-sm ring-1 ring-inset bg-white ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="" disabled>Select Status</option>
                        @foreach ($statusOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="membership_level" class="block text-sm leading-6 text-gray-900">
                    Membership Level
                </label>
                <div class="mt-2.5">
                    <select id="membership_level" wire:model="membership_level"
                            class="block w-full border-0 px-3.5 py-3 text-gray-900 shadow-sm ring-1 ring-inset bg-white ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="" disabled>Select Membership Level</option>
                        @foreach ($membershipOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('membership_level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="join_date" class="block text-sm font-semibold leading-6 text-gray-900">
                    Joined Date
                </label>
                <div class="mt-2.5">
                    <input type="date" id="join_date" wire:model="join_date"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('join_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="renewal_date" class="block text-sm font-semibold leading-6 text-gray-900">
                    Renewal Date
                </label>
                <div class="mt-2.5">
                    <input type="date" id="renewal_date" wire:model="renewal_date"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('renewal_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">
                    Password
                </label>
                <div class="mt-2.5">
                    <input type="text" id="password" wire:model="password"
                           class="block w-full border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 w-full flex justify-end ">
            <button type="submit"
                    class="bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                {{ $memberId ? 'Update' : 'Create' }}
            </button>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="mt-4 text-green-500 text-sm">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
