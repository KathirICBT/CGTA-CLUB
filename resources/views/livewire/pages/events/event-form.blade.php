{{--<div>--}}
{{--    --}}{{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{--</div>--}}


<div class="isolate bg-gray-100 min-h-screen px-6 py-5 sm:py-5 lg:px-8 md:w-full mx-3 overflow-x-hidden scrollbar-custom">
    <livewire:components.notification.notification :banner="$banner" :bannerStyle="$bannerStyle" wire:key="notification-{{ now() }}" />

    <nav class="flex items-center text-gray-600 text-md mb-4">
        <ol class="flex items-center space-x-2">

            <li>
                <a href="{{ route('events') }}" class="hover:text-sky-500">
                    Events
                </a>
            </li>
            <li>
                <span class="mx-1 text-gray-400">/</span>
            </li>
            <li class="text-gray-500">
                Add Event
            </li>
        </ol>
    </nav>
    <form wire:submit.prevent="submitForm" method="POST" class="bg-white mx-auto mt-8 sm:mt-8 md:w-full overflow-auto p-10 border rounded-2xl shadow-xl scrollbar-custom">
        <label for="first_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1 ">
            EVENT DETAIL
        </label>
        <div class="grid grid-cols-1 gap-x-8 gap-y-3 sm:grid-cols-2 mt-5">
            <div class="grid col-span-2 ">
                <label for="first_name" class="block text-md font-semibold leading-6 text-gray-500">
                    Photo
                </label>
                <div class="mt-1 flex items-center justify-start">
                    <label
                        for="photo"
                        class="relative flex items-center justify-center w-48 h-32  overflow-hidden border-2 border-dashed border-gray-300 cursor-pointer hover:border-black">
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
                <!-- Title -->
                <label for="title" class="block text-md font-semibold leading-6 text-gray-500">
                    Title
                </label>
                <div class="mt-1">
                    <input type="text" id="title" wire:model="title" placeholder="Event Title"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('title') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- Description -->
                <label for="description" class="block text-md font-semibold leading-6 text-gray-500">
                    Description
                </label>
                <div class="mt-1">
                <textarea id="description" wire:model="description" placeholder="Event Description"
                  class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6"></textarea>
                    @error('description') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- Event Category -->
                <label for="eventCategory" class="block text-md font-semibold leading-6 text-gray-500">
                    Event Category
                </label>
                <div class="mt-1">
                    <input type="text" id="eventCategory" wire:model="eventCategory" placeholder="Category"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('eventCategory') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- Start Date -->
                <label for="start_date" class="block text-md font-semibold leading-6 text-gray-500">
                    Start Date
                </label>
                <div class="mt-1">
                    <input type="date" id="start_date" wire:model="start_date"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('start_date') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- Start Time -->
                <label for="start_time" class="block text-md font-semibold leading-6 text-gray-500">
                    Start Time
                </label>
                <div class="mt-1">
                    <input type="time" id="start_time" wire:model="start_time"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('start_time') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- End Date -->
                <label for="end_date" class="block text-md font-semibold leading-6 text-gray-500">
                    End Date
                </label>
                <div class="mt-1">
                    <input type="date" id="end_date" wire:model="end_date"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('end_date') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- End Time -->
                <label for="end_time" class="block text-md font-semibold leading-6 text-gray-500">
                    End Time
                </label>
                <div class="mt-1">
                    <input type="time" id="end_time" wire:model="end_time"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('end_time') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <!-- Timezone -->
                <label for="timezone" class="block text-md font-semibold leading-6 text-gray-500">
                    Timezone
                </label>
                <div class="mt-1">
                    <input type="text" id="timezone" wire:model="timezone" placeholder="Event Timezone"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('timezone') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <label for="first_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1  mt-5">
            EVENT PARTICIPANTS' DETAILS
        </label>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mt-5">
            <div>
                <!-- Paid or Free -->
                <label for="paid_free" class="block text-md font-semibold leading-6 text-gray-500">
                    Paid/Free
                </label>
                <div class="mt-1">
                    <select id="paid_free" wire:model="paid_free"
                            class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6">
                        <option value="">Select Option</option>
                        <option value="paid">Paid</option>
                        <option value="free">Free</option>
                    </select>
                    @error('paid_free') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <!-- Visibility -->
                <label for="visibility" class="block text-md font-semibold leading-6 text-gray-500">
                    Visibility
                </label>
                <div class="mt-1">
                    <select id="visibility" wire:model="visibility"
                            class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6">
                        <option value="">Select Visibility</option>
                        <option value="members">Members</option>
                        <option value="allUsers">All Users</option>
                    </select>
                    @error('visibility') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <!-- Release Date -->
                <label for="release_date" class="block text-md font-semibold leading-6 text-gray-500">
                    Release Date
                </label>
                <div class="mt-1">
                    <input type="date" id="release_date" wire:model="release_date"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('release_date') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- Closing Date -->
                <label for="closing_date" class="block text-md font-semibold leading-6 text-gray-500">
                    Closing Date
                </label>
                <div class="mt-1">
                    <input type="date" id="closing_date" wire:model="closing_date"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('closing_date') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <!-- Event URL -->
                <label for="event_url" class="block text-md font-semibold leading-6 text-gray-500">
                    Event URL
                </label>
                <div class="mt-1">
                    <input type="url" id="event_url" wire:model="event_url" placeholder="Event URL"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('event_url') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- Location -->
                <label for="location" class="block text-md font-semibold leading-6 text-gray-500">
                    Location
                </label>
                <div class="mt-1">
                    <input type="text" id="location" wire:model="location" placeholder="Event Location"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('location') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <!-- User Limit -->
                <label for="user_limit" class="block text-md font-semibold leading-6 text-gray-500">
                    User Limit
                </label>
                <div class="mt-1">
                    <input type="number" id="user_limit" wire:model="user_limit" placeholder="Max Users"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('user_limit') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <!-- User Limit per Registrant -->
                <label for="user_limit_per_registrants" class="block text-md font-semibold leading-6 text-gray-500">
                    User Limit Per Registrant
                </label>
                <div class="mt-1">
                    <input type="number" id="user_limit_per_registrants" wire:model="user_limit_per_registrants" placeholder="Limit Per Registrant"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset sm:text-md sm:leading-6" />
                    @error('user_limit_per_registrants') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 w-full flex justify-end ">
            <button type="submit"
                    class="bg-sky-400 text-black py-2 px-7 rounded-md shadow-sm hover:bg-sky-600 focus:ring-2 focus:ring-inset focus:ring-sky-700">
                {{ $eventId ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
