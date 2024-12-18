{{--<div>--}}
{{--    --}}{{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{--</div>--}}

<div class="isolate bg-gray-100 min-h-screen px-6 py-5 sm:py-5 lg:px-8 md:w-full mx-3 overflow-x-hidden scrollbar-custom">
    <nav class="flex items-center text-gray-600 text-md mb-4">
        <ol class="flex items-center space-x-2">

            <li>
                <a href="{{ route('member') }}" class="hover:text-sky-500">
                    Members
                </a>
            </li>
            <li>
                <span class="mx-1 text-gray-400">/</span>
            </li>
            <li class="text-gray-500">
                Add Member
            </li>
        </ol>
    </nav>
    <form wire:submit.prevent="submitForm" method="POST" class="bg-white mx-auto mt-8 sm:mt-8 md:w-full overflow-auto p-10 border rounded-2xl shadow-xl scrollbar-custom">
        <label for="first_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1 ">
            MEMBER DETAIL
        </label>
        <div class="grid grid-cols-1 gap-x-8 gap-y-3 sm:grid-cols-2 mt-5">
            <div class="grid col-span-2 ">
                <label for="first_name" class="block text-md font-semibold leading-6 text-gray-500">
                    Photo
                </label>
                <div class="mt-1 flex items-center justify-start">
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
                <label for="first_name" class="block text-md font-semibold leading-6 text-gray-500">
                    First Name
                </label>
                <div class="mt-1">
                    <input type="text" id="first_name" wire:model="first_name" placeholder="Your First Name"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset  sm:text-md sm:leading-6" />
                    @error('first_name') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="last_name" class="block text-md font-semibold leading-6 text-gray-500">
                    Last Name
                </label>
                <div class="mt-1">
                    <input type="text" id="last_name" wire:model="last_name" placeholder="Your Last Name"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('last_name') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block text-md font-semibold leading-6 text-gray-500">
                    Email
                </label>
                <div class="mt-1">
                    <input type="text" id="email" wire:model="email" placeholder="Your Email"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('email') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="phone" class="block text-md font-semibold leading-6 text-gray-500">
                    Phone Number
                </label>
                <div class="mt-1">
                    <input type="text" id="phone" wire:model="phone" placeholder="Your Phone Number"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('phone') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="date_of_birth" class="block text-md font-semibold leading-6 text-gray-500">
                    Date of Birth
                </label>
                <div class="mt-1">
                    <input type="date" id="date_of_birth" wire:model="date_of_birth" placeholder="Your Date of Birth"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('date_of_birth') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="bio" class="block text-md font-semibold leading-6 text-gray-500">
                    Bio
                </label>
                <div class="mt-1">
                    <input type="text" id="bio" wire:model="bio" placeholder="Describe Yourself"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('bio') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <label for="first_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1  mt-5">
            MEMBERSHIP DETAILS
        </label>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mt-5">
            <div>
                <label for="status" class="block text-md font-semibold leading-6 text-gray-500">
                    Status
                </label>
                <div class="mt-1">
                    <select id="status" wire:model="status"
                            class="block w-full border-0 px-3.5 py-3 rounded-lg shadow-sm ring-1 ring-inset bg-white ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6">
                        <option value="" disabled>Select Status</option>
                        @foreach ($statusOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('status') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="membership_level" class="block text-md leading-6 text-gray-500 font-semibold" >
                    Membership Level
                </label>
                <div class="mt-1">
                    <select id="membership_level" wire:model="membership_level"
                            class="block w-full border-0 px-3.5 py-3 rounded-lg shadow-sm ring-1 ring-inset bg-white ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6">
                        <option value="" disabled>Select Membership Level</option>
                        @foreach ($membershipOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('membership_level') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="join_date" class="block text-md font-semibold leading-6 text-gray-500">
                    Joined Date
                </label>
                <div class="mt-1">
                    <input type="date" id="join_date" wire:model="join_date" placeholder="Your Joined Date"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('join_date') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="renewal_date" class="block text-md font-semibold leading-6 text-gray-500">
                    Renewal Date
                </label>
                <div class="mt-1">
                    <input type="date" id="renewal_date" wire:model="renewal_date" placeholder="Your Renewal Date"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    @error('renewal_date') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            @if (!$memberId) <!-- Show password field only when creating a new member -->
                <div>
                    <label for="password" class="block text-md font-semibold leading-6 text-gray-500">
                        Password
                    </label>
                    <div class="mt-1">
                        <div class="relative">
                            <input type="{{ $showPassword ? 'text' : 'password' }}" id="password" wire:model="password" placeholder="Your Password"
                                   class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                            <button type="button" wire:click="toggleShowPassword" class="absolute inset-y-0 right-0 px-3 py-2">
                                <i class="fas {{ $showPassword ? 'fa-eye-slash' : 'fa-eye' }} text-gray-500"></i>
                            </button>
                        </div>
                        @error('password') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="mt-6 w-full flex justify-end ">
            <button type="submit"
                    class="bg-sky-400 text-black py-2 px-7 rounded-md shadow-sm hover:bg-sky-600 focus:ring-2 focus:ring-inset focus:ring-sky-700">
                {{ $memberId ? 'Update' : 'Create' }}
            </button>
        </div>

        <!-- Success Message -->
        <div id="notification-container" class="fixed top-14 right-0 p-6 z-50 rounded-lg">
            @if (session()->has('success'))
                <div
                    class="bg-green-500 text-white p-3 rounded-lg mb-4 animate-fade-in-out"
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 3000)"
                >
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div
                    class="bg-red-500 text-white p-3 rounded-lg mb-4 animate-fade-in-out"
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 3000)"
                >
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </form>
</div>
