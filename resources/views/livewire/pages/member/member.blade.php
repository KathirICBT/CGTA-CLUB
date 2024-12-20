{{--<div>--}}
{{--    --}}{{-- The Master doesn't talk, he acts. --}}
{{--</div>--}}

<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 overflow-auto h-screen">
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

        {{-- @if($isTableView)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Table Header -->
            <div class="grid grid-cols-12 gap-x-6 bg-gray-50 text-sm font-semibold text-gray-700 py-2 px-4">
                <div class="w-20 pl-4">Photo</div> <!-- Added left padding -->
                <div class="col-span-3">Name</div>
                <div class="col-span-2">Email</div>
                <div class="col-span-2">Phone</div>
                <div class="col-span-2">Join Date</div>
                <div class="w-24">Status</div> <!-- Fixed width -->
                <div class="w-24 text-center">Actions</div> <!-- Fixed width -->
            </div>
    
            <!-- Table Rows -->
            <div class="space-y-4 mt-2">
                @foreach ($members as $member)
                    <div class="grid grid-cols-12 gap-x-6 text-sm text-gray-600 py-3 px-4 items-center 
                                bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                        <!-- Photo -->
                        <div class="w-20 flex justify-start pl-4"> <!-- Added left padding -->
                            @if ($member['photo_url'])
                                <img src="{{ $member['photo_url'] }}" alt="Photo" class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-500 italic">
                                    No Photo
                                </div>
                            @endif
                        </div>
                        <!-- Name -->
                        <div class="col-span-3 font-medium text-gray-900">
                            {{ $member['first_name'] }} {{ $member['last_name'] }}
                        </div>
                        <!-- Email -->
                        <div class="col-span-2">{{ $member['email'] }}</div>
                        <!-- Phone -->
                        <div class="col-span-2">{{ $member['phone'] }}</div>
                        <!-- Join Date -->
                        <div class="col-span-2">{{ $member['join_date'] }}</div>
                        <!-- Status -->
                        <div class="w-24">
                            <span class="px-2 py-1 rounded-2xl text-xs font-medium
                                {{ $member['status'] === 'Active' ? 'text-green-700 bg-green-100' : '' }}
                                {{ $member['status'] === 'Inactive' ? 'text-red-700 bg-red-100' : '' }}
                                {{ $member['status'] === 'Waiting' ? 'text-yellow-700 bg-yellow-100' : '' }}">
                                {{ $member['status'] }}
                            </span>
                        </div>
                        <!-- Actions -->
                        <div class="w-24 flex justify-center space-x-3">
                            <a href="#" class="text-amber-500 hover:text-amber-700">
                                <i class="fas fa-edit text-lg"></i>
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </a>
                            <a href="{{ route('member-view', ['memberId' => $member['id']]) }}" 
                               class="text-sky-500 hover:text-sky-700">
                                <i class="fas fa-info-circle text-lg"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif --}}
        


    
                                        

        <!-- Card Component -->
        @if(!$isTableView)
            {{-- <div id="card-view-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                @foreach ($members as $member)
                    <div class="px-6 py-6 text-center bg-white shadow-lg rounded-2xl relative lg:mt-0 xl:px-10">
                        <div class="space-y-6 xl:space-y-8">
                            <!-- Profile Image with Status Indicator -->
                            <div class="relative mx-auto h-32 w-32 sm:h-36 sm:w-36 lg:h-40 lg:w-40 rounded-full ring-2 ring-gray-400 p-0.5 flex justify-center items-center bg-white shadow-lg">
                                <img
                                    class="rounded-full h-28 w-28 sm:h-32 sm:w-32 lg:h-36 lg:w-36 object-cover"
                                    src="{{ $member['photo_url'] }}"
                                    alt="author avatar">
                                <!-- Status Indicator -->
                                <div
                                    class="absolute top-2 right-6 transform translate-x-2 -translate-y-2 h-5 w-5 sm:h-6 sm:w-6 rounded-full ring-2 ring-white flex justify-center items-center
                                        {{ $member['status'] === 'Active' ? 'bg-green-500' : '' }}
                                        {{ $member['status'] === 'Inactive' ? 'bg-red-500' : '' }}
                                        {{ $member['status'] === 'Waiting' ? 'bg-yellow-500' : '' }}">
                                    <div
                                        class="h-3 w-3 sm:h-4 sm:w-4 bg-white rounded-full ring-1 ring-white">
                                    </div>
                                </div>
                            </div>

                            <!-- Member Info Section -->
                            <div class="space-y-4 lg:space-y-6">
                                <div class="flex flex-col justify-center items-center space-y-4 text-lg font-medium leading-6">
                                    <h3 class="text-gray-800 text-lg sm:text-xl lg:text-2xl">
                                        {{ $member['first_name'] }} {{ $member['last_name'] }}
                                    </h3>
                                    <p class="text-gray-800 text-sm sm:text-base lg:text-lg">
                                        Joined Since: {{ \Carbon\Carbon::parse($member['join_date'])->format('M j, Y') }}
                                    </p>
                                    <p class="text-gray-800 text-sm sm:text-base lg:text-lg">
                                        Renewed Date: {{ \Carbon\Carbon::parse($member['renewal_date'])->format('M j, Y') }}
                                    </p>
                                    <!-- Contact Details -->
                                    <div class="flex flex-col justify-start items-center space-y-3 lg:space-y-4 mt-3 text-left">
                                        <!-- Phone Icon -->
                                        <button
                                            class="text-teal-500 hover:text-teal-700 flex items-center space-x-2"
                                            onclick="copyToClipboard('{{ $member['phone'] }}')">
                                            <i class="fas fa-phone-alt text-lg sm:text-xl"></i>
                                            <span class="text-sm sm:text-base lg:text-lg text-gray-800">{{ $member['phone'] }}</span>
                                        </button>

                                        <!-- Email Icon -->
                                        <button
                                            class="text-teal-500 hover:text-teal-700 flex items-center space-x-2"
                                            onclick="copyToClipboard('{{ $member['email'] }}')">
                                            <i class="fas fa-envelope text-lg sm:text-xl"></i>
                                            <span class="text-sm sm:text-base lg:text-lg text-gray-800">{{ $member['email'] }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons Section -->
                        <div class="flex flex-col justify-center space-y-2 lg:space-y-4 mt-5 absolute -top-4 right-0 mr-3 sm:mr-6">
                            <!-- Edit Button -->
                            <button
                                class="text-amber-900 hover:bg-amber-300 text-base sm:text-lg w-8 h-8 sm:w-10 sm:h-10 flex justify-center items-center rounded-full bg-amber-200">
                                <i class="fas fa-edit text-gray-500"></i>
                            </button>
                            <!-- Delete Button -->
                            <button
                                class="text-rose-900 hover:bg-rose-300 text-base sm:text-lg w-8 h-8 sm:w-10 sm:h-10 flex justify-center items-center rounded-full bg-rose-200">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <!-- Info Button -->
                            <button
                                class="text-sky-900 hover:bg-sky-300 text-base sm:text-lg w-8 h-8 sm:w-10 sm:h-10 flex justify-center items-center rounded-full bg-sky-200">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div> --}}


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6">
                @foreach ($members as $member)
                <div class="rounded-lg shadow-2xl bg-white relative text-center">
                    <!-- Top right corner icons -->
                    <div class="absolute top-2 right-2 flex space-x-2">
                        <button class="p-1 text-green-500 rounded-full hover:text-green-700" wire:click="editMember({{ $member['id'] }})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="p-1 text-red-500 rounded-full hover:text-red-700" wire:click="deleteMember({{ $member['id'] }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
            
                    <!-- Profile picture -->
                    @if ($member['photo_url'])
                    <div class="relative mx-auto mt-4" style="width: fit-content; padding: 6px; border: 2px solid white; border-radius: 9999px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
                        <img src="{{ $member['photo_url'] }}" alt="Photo" class="w-28 h-28 object-cover rounded-full">
                    </div>
                    @else
                    <div class="relative mx-auto mt-4" style="width: fit-content; padding: 6px; border: 2px solid white; border-radius: 9999px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
                        <div class="w-28 h-28 flex items-center justify-center rounded-full bg-gray-200">
                            <span class="text-gray-500 italic">No Photo</span>
                        </div>
                    </div>
                    @endif
            
                    <!-- Member details -->
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-500 uppercase">
                            {{ $member['first_name'] }}<br>{{ $member['last_name'] }}
                        </h3>
                        <p class="text-sm text-gray-400 font-semibold">Founder and CEO</p>
                        <p class="text-sm text-gray-400">{{ $member['email'] }}</p>
                        <p class="text-lg font-semibold text-gray-500">{{ $member['phone'] }}</p>
                        <p class="text-sm text-gray-400 mt-1">Join Date: {{ $member['join_date'] }}</p>
            
                        <!-- Status badge -->
                        <div class="mt-2 inline-block px-4 py-1 text-xs font-medium rounded-full
                            {{ $member['status'] === 'Active' ? 'text-white bg-green-500' : ($member['status'] === 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-yellow-500') }}">
                            {{ $member['status'] }}
                        </div>
                    </div>
            
                    <!-- Footer with Call and Mail buttons -->
                    <div class="bg-gray-100 py-4 rounded-b-lg">
                        <div class="flex justify-between items-center">
                            <div class="hover:bg-gray-400 w-1/2 h-full flex items-center justify-center">
                                <button class="w-full text-sm font-medium text-gray-500 hover:text-white border-r border-gray-400">
                                    <i class="fas fa-phone-alt"></i> Call
                                </button>
                            </div>
                            <div class="hover:bg-gray-400 w-1/2 h-full flex items-center justify-center">
                                <button class="w-full text-sm font-medium text-gray-500 hover:text-white">
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

<script>
    function copyToClipboard(data) {
        navigator.clipboard.writeText(data).then(() => {
            alert("Copied to clipboard: " + data);
        }).catch(err => {
            console.error("Could not copy text: ", err);
        });
    }
</script>



