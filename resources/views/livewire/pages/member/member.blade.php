{{--<div>--}}
{{--    --}}{{-- The Master doesn't talk, he acts. --}}
{{--</div>--}}

<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 overflow-auto">
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
                <a href="{{ route('member-form') }}">
                    Add Member
                </a>
            </button>
        </div>
    </div>

    <div class="mt-3 overflow-auto  border rounded-xl">
        <!-- Card Component -->
        @if($isTableView)
            <div class="min-w-full bg-white">
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
                    @foreach ($members as $member)
                        <tr>
                            <td class="whitespace-nowrap text-center py-4 pl-2 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                @if ($member['photo_url'])
                                    <img src="{{ $member['photo_url'] }}" alt="Photo" class="w-16 h-16 object-cover rounded-full">
                                @else
                                    <span class="text-gray-500 italic">No Photo</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['first_name'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['last_name'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['email'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['phone'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['date_of_birth'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['join_date'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">
                                <div class="border px-2 py-1.5 rounded-3xl
                                    {{ $member['status'] === 'Active' ? 'text-emerald-900 bg-emerald-200' : '' }}
                                    {{ $member['status'] === 'Inactive' ? 'text-red-900 bg-red-200' : '' }}
                                    {{ $member['status'] === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : '' }}">
                                    {{ $member['status'] }}
                                </div>
                            </td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['membership_level'] }}</td>
                            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['renewal_date'] }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium">
                                <div class="flex justify-center items-center space-x-3">
                                    <a href="#"
                                       class="text-amber-900 hover:bg-amber-300 text-lg flex justify-center items-center p-1 rounded-lg bg-amber-200"
                                       wire:click="editMember({{ $member['id'] }},  'form')">
                                        <i class="fas fa-edit pl-1 py-0.5"></i>
                                    </a>
                                    <a href="#"
                                       class="text-rose-900 text-lg hover:bg-rose-300 flex justify-center items-center p-1 rounded-lg bg-rose-200"
                                       wire:click="deleteMember({{ $member['id'] }})">
                                        <i class="fas fa-trash-alt pl-1 pr-1 py-0.5"></i>
                                    </a>
                                    <a href="{{ route('member-view', ['memberId' => $member['id']]) }}"
                                       class="text-sky-900 text-lg hover:bg-sky-300 flex justify-center items-center p-1 rounded-lg bg-sky-200"
                                        wire:click="editMember({{ $member['id'] }}, 'view')">
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
                @foreach ($members as $member)
                    <div class="px-6 py-6 text-center bg-white shadow-lg rounded-2xl lg:mt-0 xl:px-10 relative">
                        <div class="space-y-4 xl:space-y-6">
                            <div class="relative mx-auto h-36 w-36 rounded-full ring-2 ring-gray-400 p-0.5 flex justify-center items-center bg-white shadow-lg">
                                <img
                                    class="rounded-full h-32 w-32"
                                    src="{{ $member['photo_url'] }}"
                                    alt="author avatar">

                                <!-- Status Indicator -->
                                <div
                                    class="absolute top-2 right-6 transform translate-x-2 -translate-y-2 h-5 w-5 rounded-full ring-2 ring-white flex justify-center items-center
                                    {{ $member['status'] === 'Active' ? 'bg-green-500' : '' }}
                                    {{ $member['status'] === 'Inactive' ? 'bg-red-500' : '' }}
                                    {{ $member['status'] === 'Waiting' ? 'bg-yellow-500' : '' }}">
                                    <div
                                        class="h-3 w-3 bg-white rounded-full ring-1 ring-white">
                                    </div>
                                </div>


                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-center items-center flex-col space-y-7 text-lg font-medium leading-6">
                                    <div class="">
                                        <h3 class="text-gray-800 text-lg ">{{ $member['first_name'] }} {{ $member['last_name'] }}</h3>
                                        <p class="text-gray-800 text-lg">Joined Since: {{ \Carbon\Carbon::parse($member['join_date'])->format('M j, Y') }}</p>
                                    </div>
                                    <div class="flex justify-center mt-5 space-x-5">
                                        <!-- Twitter Icon -->
                                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-gray-500 w-8 h-8 border border-gray-600 hover:border-gray-900 rounded-full p-4 flex justify-center items-center">
                                            <span class="sr-only">Twitter</span>
                                            <i class="fas fa-phone-alt text-gray-500 hover:text-gray-800 pt-1"></i>
                                        </a>
                                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-gray-500 w-8 h-8 border border-gray-600 hover:border-gray-900 rounded-full p-4 flex justify-center items-center">
                                            <span class="sr-only">Twitter</span>
                                            <i class="fas fa-envelope text-gray-500 hover:text-gray-800 pt-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center mt-5 space-y-1 absolute -top-4 right-0 mr-3">
                            <!-- Twitter Icon -->
                            <button
                               class="text-amber-900 hover:bg-amber-300 text-lg  w-10 h-10 flex justify-center items-center p-4  rounded-full bg-amber-200"
                               wire:click="editMember({{ $member['id'] }},  'form')">
                                <i class="fas fa-edit text-gray-500  pl-1"></i>
                            </button>
                            <button
                               class="text-rose-900 text-lg hover:bg-rose-300  w-10 h-10 flex justify-center items-center p-4 rounded-full bg-rose-200"
                               wire:click="deleteMember({{ $member['id'] }})">
                                <i class="fas fa-trash-alt  pt-1"></i>
                            </button>
                            <button
                                class="text-sky-900 text-lg hover:bg-sky-300  w-10 h-10 flex justify-center items-center p-4 rounded-full bg-sky-200"
                                wire:click="editMember({{ $member['id'] }}, 'view')">
                                <i class="fas fa-info-circle  pt-1"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- Notification Container -->
    <div id="notification-container" class="fixed top-0 right-0 p-6 z-50 rounded-lg">
        <!-- Notification -->
        @if (session()->has('notification'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed top-5 right-5 bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg">
                <span x-text="{{ session('notification') }}"></span>
            </div>
        @endif
    </div>
</div>



