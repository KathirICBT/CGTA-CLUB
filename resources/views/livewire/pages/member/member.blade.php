{{--<div>--}}
{{--    --}}{{-- The Master doesn't talk, he acts. --}}
{{--</div>--}}

<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 overflow-auto h-screen">
    <livewire:components.notification.notification :banner="$banner" :bannerStyle="$bannerStyle" wire:key="notification-{{ now() }}" />
    <div class="md:flex md:items-center md:justify-between md:p-4 px-5">
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
                <a href="{{ route('member-form') }}">
                    +
                </a>
            </button>
        </div>
    </div>

    <div class="mt-3">
        <!-- Card Component -->
        @if($isTableView)
            <div class="min-w-full bg-white">
                <table class="w-full divide-y divide-gray-300">
                    <thead>
                        <tr class="bg-gray-50">
                            @foreach ($headers as $header)
                                <th class="py-2 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                    <div class="text-center pr-3">{{ $header }}</div>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($members as $member)
                            <tr class="transition duration-300 ease-in-out hover:bg-gray-100 hover:shadow-md">
                                <td class="whitespace-nowrap text-center py-2 pl-2 pr-3 text-sm font-medium text-gray-900 sm:pl-6 relative">
                                    @if ($member['photo_url'])
                                        <div class="relative group">
                                            <!-- Smaller Photo -->
                                            <img src="{{ $member['photo_url'] }}" alt="Photo" class="w-10 h-10 object-cover rounded-full">
                                            <!-- Large Popup Photo on Right Side -->
                                            <div class="absolute z-20 hidden group-hover:flex justify-center items-center w-40 h-40 left-full top-1/2 transform -translate-y-1/2 ml-0 bg-white shadow-lg rounded-full border border-gray-200">
                                                <img src="{{ $member['photo_url'] }}" alt="Large Photo" class="w-36 h-36 object-cover rounded-full">
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-gray-500 italic">No Photo</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['first_name'] }}</td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['last_name'] }}</td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['email'] }}</td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['phone'] }}</td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['date_of_birth'] }}</td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['join_date'] }}</td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">
                                    <div class="border px-1.5 py-0.5 rounded-3xl
                                        {{ $member['status'] === 'Active' ? 'text-emerald-900 bg-emerald-200' : '' }}
                                        {{ $member['status'] === 'Inactive' ? 'text-red-900 bg-red-200' : '' }}
                                        {{ $member['status'] === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : '' }}">
                                        {{ $member['status'] }}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['membership_level'] }}</td>
                                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['renewal_date'] }}</td>
                                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium">
                                    <div class="flex justify-center items-center space-x-3">
                                        <!-- Edit (Orange) -->
                                        <a href="#"
                                           class="text-amber-500 hover:text-amber-300 text-lg flex justify-center items-center"
                                           wire:click="editMember({{ $member['id'] }}, 'form')">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete (Red) -->
                                        <a href="#"
                                           class="text-rose-500 hover:text-rose-300 text-lg flex justify-center items-center"
                                           wire:click="deleteMember({{ $member['id'] }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <!-- View (Blue) -->
                                        <a href="{{ route('member-view', ['memberId' => $member['id']]) }}"
                                           class="text-sky-500 hover:text-sky-300 text-lg flex justify-center items-center">
                                            <i class="fas fa-info-circle"></i>
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
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
                @foreach ($members as $member)
                <div class="rounded-lg shadow-md bg-white relative text-center p-3 transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <!-- Top right corner icons -->
                    <div class="absolute top-1 right-1 flex space-x-1">
                        <button class="p-1 text-green-500 rounded-full hover:text-green-700 text-xs" wire:click="editMember({{ $member['id'] }})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="p-1 text-red-500 rounded-full hover:text-red-700 text-xs" wire:click="deleteMember({{ $member['id'] }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>

                    <!-- Profile picture -->
                    @if ($member['photo_url'])
                    <div class="relative mx-auto mt-2" style="width: fit-content; padding: 4px; border: 1px solid white; border-radius: 9999px; box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);">
                        <img src="{{ $member['photo_url'] }}" alt="Photo" class="w-20 h-20 object-cover rounded-full">
                    </div>
                    @else
                    <div class="relative mx-auto mt-2" style="width: fit-content; padding: 4px; border: 1px solid white; border-radius: 9999px; box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);">
                        <div class="w-20 h-20 flex items-center justify-center rounded-full bg-gray-200">
                            <span class="text-gray-500 italic text-sm">No Photo</span>
                        </div>
                    </div>
                    @endif

                    <!-- Member details -->
                    <div class="p-2">
                        <h3 class="text-sm font-bold text-gray-500 uppercase">
                            {{ $member['first_name'] }}<br>{{ $member['last_name'] }}
                        </h3>
                        <p class="text-xs text-gray-400 font-semibold">Founder and CEO</p>
                        <p class="text-xs text-gray-400">{{ $member['email'] }}</p>
                        <p class="text-sm font-semibold text-gray-500">{{ $member['phone'] }}</p>
                        <p class="text-xs text-gray-400 mt-1">Join Date: {{ $member['join_date'] }}</p>

                        <!-- Status badge -->
                        <div class="mt-1 inline-block px-3 py-0.5 text-xs font-medium rounded-full
                            {{ $member['status'] === 'Active' ? 'text-white bg-green-500' : ($member['status'] === 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-yellow-500') }}">
                            {{ $member['status'] }}
                        </div>
                    </div>

                    <!-- Footer with Call and Mail buttons -->
                    <div class="bg-gray-100 py-2 rounded-b-lg">
                        <div class="flex justify-between items-center">
                            <div class="hover:bg-gray-400 w-1/2 h-full flex items-center justify-center">
                                <button class="w-full text-xs font-medium text-gray-500 hover:text-white border-r border-gray-400">
                                    <i class="fas fa-phone-alt"></i> Call
                                </button>
                            </div>
                            <div class="hover:bg-gray-400 w-1/2 h-full flex items-center justify-center">
                                <button class="w-full text-xs font-medium text-gray-500 hover:text-white">
                                    <i class="fas fa-envelope"></i> Mail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>
    // Listen for the event to reset the notification after 3 seconds
    Livewire.on('reset-notification', ({ delay }) => {
        setTimeout(() => {
            // Use Livewire to reset the notification state after the delay
        @this.set('banner', null);
        @this.set('bannerStyle', null);
        }, delay * 1000); // Convert seconds to milliseconds
    });
</script>




