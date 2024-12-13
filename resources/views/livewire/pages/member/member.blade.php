<div class="px-4 sm:px-6 lg:px-4 m-5">
    <div class="bg-gray-100 px-6 py-4 mb-6">
        <h1 class="text-2xl font-extrabold text-gray-800 uppercase" style="font-family: Arial, sans-serif;">
            <span class="text-blue-500 animated-cgta">CGTA</span>
            <span class="text-gray-800 animated-cgta">MEMBERS</span>
        </h1>
        <p class="text-sm text-gray-500 mt-0">Manage all community members easily.</p>
    </div>
    
    
    
    
    <div class="md:flex md:items-center md:justify-between bg-white">        
        <div class="flex items-center w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2">            
            <i class="fas fa-search text-green-500 mr-2"></i>            
            <input type="text" placeholder="Search members..." wire:model="search"
                class="w-full rounded-md text-sm text-gray-700 focus:outline-none focus:ring-0 focus:border-gray-300"
            />
        </div>    
        
        <div class="mt-4 md:mt-0 sm:flex-none">
            <button wire:click="openForm" type="button"
                class="inline-block rounded bg-green-500 px-3 py-1 text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-0">
                Add Member
            </button>
        </div>
    </div>
   
    @if ($showForm)
    <div class="absolute inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-3/4 px-5 pt-6 relative my-5">
            <button wire:click="closeForm" class="absolute top-1 right-3 text-black hover:text-emerald-900">
                <i class="fas fa-times text-xl"></i>
            </button>
            <livewire:pages.member.member-form :memberId="$memberId" />
        </div>
    </div>
    @endif
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6">
        @foreach ($members as $member)
        <div class="border rounded-lg shadow-md bg-white p-4">
            <div class="flex flex-col items-center">
                @if ($member['photo_url'])
                <img src="{{ $member['photo_url'] }}" alt="Photo" class="w-24 h-24 object-cover rounded-full mb-4">
                @else
                <div class="w-24 h-24 flex items-center justify-center rounded-full bg-gray-200 mb-4">
                    <span class="text-gray-500 italic">No Photo</span>
                </div>
                @endif

                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $member['first_name'] }} {{ $member['last_name'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $member['email'] }}</p>
                    <p class="text-sm text-gray-500">{{ $member['phone'] }}</p>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-500">DOB: {{ $member['date_of_birth'] }}</p>
                    <p class="text-sm text-gray-500">Join Date: {{ $member['join_date'] }}</p>
                    <div class="mt-2 inline-block px-3 py-1 text-xs font-medium rounded-full
                        {{ $member['status'] === 'Active' ? 'text-emerald-900 bg-emerald-200' : '' }}
                        {{ $member['status'] === 'Inactive' ? 'text-red-900 bg-red-200' : '' }}
                        {{ $member['status'] === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : '' }}">
                        {{ $member['status'] }}
                    </div>
                    <p class="text-sm mt-2 text-gray-500">Membership: {{ $member['membership_level'] }}</p>
                    <p class="text-sm text-gray-500">Renewal: {{ $member['renewal_date'] }}</p>
                </div>

                <div class="flex justify-center items-center space-x-3 mt-4">
                    <a href="#"
                        class="text-emerald-900 hover:bg-emerald-300 text-lg flex justify-center items-center p-2 rounded-lg bg-emerald-200"
                        wire:click="editMember({{ $member['id'] }})">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#"
                        class="text-rose-900 text-lg hover:bg-rose-300 flex justify-center items-center p-2 rounded-lg bg-rose-200"
                        wire:click="deleteMember({{ $member['id'] }})">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <button
                        class="text-sky-900 text-lg hover:bg-sky-300 flex justify-center items-center p-2 rounded-lg bg-sky-200">
                        <i class="fas fa-info-circle"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
