{{--<div>--}}
{{--    --}}{{-- If your happiness depends on money, you will never b happy with yourself. --}}
{{--</div>--}}


<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 overflow-hidden min-h-screen w-full">
    <livewire:components.notification.notification :banner="$banner" :bannerStyle="$bannerStyle" wire:key="notification-{{ now() }}" />
    <div class="md:flex md:items-center md:justify-between bg-white md:p-4 px-5 rounded-xl border">
        <div class="flex items-center w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-1 shadow-sm">
            <i class="fas fa-search text-gray-400"></i> <!-- Search Icon -->
            <input
                    type="text"
                    placeholder="Search..."
                    class="ml-2 flex-grow border-none outline-none text-gray-700 bg-transparent"
            />
        </div>

        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex justify-center items-center space-x-5">
            <div class="flex items-center  bg-gray-100 rounded-xl">
                <!-- Table Icon -->
                <div class="hover:bg-white px-3 py-1 rounded-xl hover:shadow-lg">
                    <button id="table-view"  wire:click="toggleView('table')"  class="text-gray-700 text-3xl hover:text-blue-500">
                        <i class="fas fa-table"></i>
                    </button>
                </div>
                <div class="hover:bg-white px-3 py-1 rounded-xl hover:shadow-lg">
                    <button id="card-view" wire:click="toggleView('card')" class="text-gray-700 text-3xl hover:text-blue-500">
                        <i class="fas fa-id-card"></i>
                    </button>
                </div>

                <!-- Card Icon -->
            </div>
            <button
                    type="button"
                    class="block rounded-md bg-emerald-600 px-3 py-1 text-center text-md font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                <a href="{{ route('event-form') }}">
                    Add Event
                </a>
            </button>
        </div>
    </div>

    <div class="mt-3 overflow-x-auto w-full border rounded-xl ">
        <!-- Card Component -->
        @if($isTableView)
            <div class="min-w-full bg-white">
{{--                <livewire:components.user-deletion.user-deletion />--}}
                <table class="w-full divide-y divide-gray-300">
                    <thead>
                    <tr class="bg-gray-50">
                        @foreach ($headers as $header)
                            <th class="py-3.5 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                <div class="text-center pr-3">{{ $header }}</div>
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach ($events as $event)
                        <tr>
                            <td class="whitespace-nowrap text-center py-4 pl-2 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                @if ($event['photo_url'])
                                    <img src="{{ $event['photo_url'] }}" alt="Photo" class="w-28 h-24 object-cover">
                                @else
                                    <span class="text-gray-500 italic">No Photo</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['title'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 text-wrap">{{ $event['eventCategory'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['start_date'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['start_time'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['visibility'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['release_date'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['closing_date'] }}
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['paid_free'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['user_limit'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['user_limit_per_registrants'] }}</td>
                            <!-- Action Column with Fixed Position -->
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 sticky right-0 bg-white z-10">
                                <div class="flex justify-center items-center space-x-3">
                                    <a href="#"
                                       class="text-amber-900 hover:bg-amber-300 text-lg flex justify-center items-center p-1 rounded-lg bg-amber-200"
                                       wire:click="editMember({{ $event['id'] }},  'form')">
                                        <i class="fas fa-edit pl-1 py-0.5"></i>
                                    </a>
                                    <a href="#"
                                       class="text-rose-900 text-lg hover:bg-rose-300 flex justify-center items-center p-1 rounded-lg bg-rose-200"
                                       wire:click="deleteEvent({{ $event['id'] }})">
                                        <i class="fas fa-trash-alt pl-1 pr-1 py-0.5"></i>
                                    </a>
                                    <a href="{{ route('member-view', ['memberId' => $event['id']]) }}"
                                       class="text-sky-900 text-lg hover:bg-sky-300 flex justify-center items-center p-1 rounded-lg bg-sky-200"
                                       wire:click="editMember({{ $event['id'] }}, 'view')">
                                        <i class="fas fa-info-circle p-0.5"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
