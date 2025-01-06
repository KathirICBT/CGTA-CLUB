{{--<div>--}}
{{--    --}}{{-- If your happiness depends on money, you will never b happy with yourself. --}}
{{--</div>--}}


<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 overflow-hidden min-h-screen w-full">
    <livewire:components.notification.notification :banner="$banner" :bannerStyle="$bannerStyle" wire:key="notification-{{ now() }}" />
    <div class="md:flex md:items-center md:justify-between bg-transparent md:p-4 px-5 rounded-xl">
        <div class="flex items-center w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-1 shadow-sm">
            <i class="fas fa-search text-gray-400"></i> <!-- Search Icon -->
            <input
                type="text"
                placeholder="Search..."
                class="ml-2 flex-grow border-none outline-none text-gray-700 bg-transparent"
            />
        </div>

        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex justify-center items-center space-x-5">

            <div class="flex items-center bg-gray-100 rounded-xl space-x-4 p-2">

                <!-- Table Icon -->
                <div class="px-1 py-1">
                    <button id="table-view" wire:click="toggleView('table')" class="text-gray-500 text-xl hover:text-gray-300 focus:outline-none transition-colors duration-300">
                        <i class="fas fa-table"></i>
                    </button>
                </div>

                <!-- Card Icon -->
                <div class="px-1 py-1">
                    <button id="card-view" wire:click="toggleView('card')" class="text-gray-500 text-xl hover:text-gray-300 focus:outline-none transition-colors duration-300">
                        <i class="fas fa-id-card"></i>
                    </button>
                </div>

            </div>


            <button
                type="button"
                class="block rounded-md bg-emerald-600 px-3 py-1 text-center text-md font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                <a href="{{ route('event-form') }}">
                    +
                </a>
            </button>
        </div>
    </div>

    <div class="mt-3 overflow-x-auto w-full border rounded-xl ">
        <!-- Card Component -->
        @if($isTableView)
            <div class="overflow-x-auto bg-white">
                <livewire:pages.member.member-comp.member-table-component
                    :datas="$filteredEvents"
                    :headers="$headers"
                    routeName="event-form"
                />
            </div>
{{--            <div class="overflow-x-auto bg-white">--}}
{{--                <livewire:pages.events.event-comp.event-table-component--}}
{{--                    :datas="$filteredEvents"--}}
{{--                    :headers="$headers"--}}
{{--                    routeName="event-form"--}}
{{--                />--}}
{{--            </div>--}}
        @endif

        <!-- Card Component -->
        @if(!$isTableView)
            <div id="card-view-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                @foreach ($events as $event)
                    <div class="px-6 py-6 text-center bg-white shadow-lg rounded-2xl relative lg:mt-0 xl:px-10">
                        <div class="space-y-6 xl:space-y-8">
                            <!-- Profile Image with Status Indicator -->
                            <div class="relative mx-auto h-32 w-32 sm:h-36 sm:w-36 lg:h-40 lg:w-40 rounded-full ring-2 ring-gray-400 p-0.5 flex justify-center items-center bg-white shadow-lg">
                                <img
                                        class="rounded-full h-28 w-28 sm:h-32 sm:w-32 lg:h-36 lg:w-36 object-cover"
                                        src="{{ $event['photo_url'] }}"
                                        alt="author avatar">
                                <!-- Status Indicator -->
                                <div
                                        class="absolute top-2 right-6 transform translate-x-2 -translate-y-2 h-5 w-5 sm:h-6 sm:w-6 rounded-full ring-2 ring-white flex justify-center items-center
                                        {{ $event['status'] === 'Active' ? 'bg-green-500' : '' }}
                                        {{ $event['status'] === 'Inactive' ? 'bg-red-500' : '' }}
                                        {{ $event['status'] === 'Waiting' ? 'bg-yellow-500' : '' }}">
                                    <div
                                            class="h-3 w-3 sm:h-4 sm:w-4 bg-white rounded-full ring-1 ring-white">
                                    </div>
                                </div>
                            </div>

                            <!-- Member Info Section -->
                            <div class="space-y-4 lg:space-y-6">
                                <div class="flex flex-col justify-center items-center space-y-4 text-lg font-medium leading-6">
                                    <h3 class="text-gray-800 text-lg sm:text-xl lg:text-2xl">
                                        {{ $event['first_name'] }} {{ $event['last_name'] }}
                                    </h3>
                                    <p class="text-gray-800 text-sm sm:text-base lg:text-lg">
                                        Joined Since: {{ \Carbon\Carbon::parse($event['join_date'])->format('M j, Y') }}
                                    </p>
                                    <p class="text-gray-800 text-sm sm:text-base lg:text-lg">
                                        Renewed Date: {{ \Carbon\Carbon::parse($event['renewal_date'])->format('M j, Y') }}
                                    </p>
                                    <!-- Contact Details -->
                                    <div class="flex flex-col justify-start items-center space-y-3 lg:space-y-4 mt-3 text-left">
                                        <!-- Phone Icon -->
                                        <button
                                                class="text-teal-500 hover:text-teal-700 flex items-center space-x-2"
                                                wire:click="copyToClipboard('phone')">
                                            <i class="fas fa-phone-alt text-lg sm:text-xl"></i>
                                            <span class="text-sm sm:text-base lg:text-lg text-gray-800">{{ $event['phone'] }}</span>
                                        </button>

                                        <!-- Email Icon -->
                                        <button
                                                class="text-teal-500 hover:text-teal-700 flex items-center space-x-2"
                                                wire:click="copyToClipboard('email')">
                                            <i class="fas fa-envelope text-lg sm:text-xl"></i>
                                            <span class="text-sm sm:text-base lg:text-lg text-gray-800">{{ $event['email'] }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons Section -->
                        <div class="flex flex-col justify-center space-y-2 lg:space-y-4 mt-5 absolute -top-4 right-0 mr-3 sm:mr-6">
                            <!-- Edit Button -->
                            <button
                                    wire:click="editMember({{ $event['id'] }}, 'form')"
                                    class="text-amber-900 hover:bg-amber-300 text-base sm:text-lg w-8 h-8 sm:w-10 sm:h-10 flex justify-center items-center rounded-full bg-amber-200">
                                <i class="fas fa-edit text-gray-500"></i>
                            </button>
                            <!-- Delete Button -->
                            <button
                                    wire:click="deleteMember({{ $event['id'] }})"
                                    class="text-rose-900 hover:bg-rose-300 text-base sm:text-lg w-8 h-8 sm:w-10 sm:h-10 flex justify-center items-center rounded-full bg-rose-200">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <!-- Info Button -->
                            <button
                                    wire:click="editMember({{ $event['id'] }}, 'view')"
                                    class="text-sky-900 hover:bg-sky-300 text-base sm:text-lg w-8 h-8 sm:w-10 sm:h-10 flex justify-center items-center rounded-full bg-sky-200">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
