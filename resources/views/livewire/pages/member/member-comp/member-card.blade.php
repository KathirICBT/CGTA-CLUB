{{--<div>--}}
{{--    --}}{{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
{{--</div>--}}

<div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4 ">
    @foreach ($datas as $data)
        <div class="rounded-lg shadow-md bg-white relative text-center p-3 transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <!-- Top right corner icons -->
            <div class="absolute top-1 right-1 flex space-x-1">
                <button class="p-1 text-green-500 rounded-full hover:text-green-700 text-lg"
                        wire:click="editMember({{ $data['id'] }})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="p-1 text-red-500 rounded-full hover:text-red-700 text-lg"
                        wire:click="deleteMember({{ $data['id'] }})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>

            <!-- Profile picture -->
            @if ($data['photo_url'])
                <div class="relative mx-auto mt-2" style="width: fit-content; padding: 4px; border: 1px solid white; border-radius: 9999px; box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);">
                    <img src="{{ $data['photo_url'] }}" alt="Photo" class="w-20 h-20 object-cover rounded-full">
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
                    {{ $data['first_name'] }}<br>{{ $data['last_name'] }}
                </h3>
                <p class="text-xs text-gray-400 font-semibold">Founder and CEO</p>
                <p class="text-xs text-gray-400">{{ $data['email'] }}</p>
                <p class="text-sm font-semibold text-gray-500">{{ $data['phone'] }}</p>
                <p class="text-xs text-gray-400 mt-1">Join Date: {{ $data['join_date'] ?? 'N/A' }}</p>

                <!-- Status badge -->
                <div class="mt-1 inline-block px-3 py-0.5 text-xs font-medium rounded-full
                            {{ $data['status'] === 'Active' ? 'text-white bg-green-500' : ($data['status'] === 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-yellow-500') }}">
                    {{ $data['status'] }}
                </div>
            </div>

            <!-- Footer with Call and Mail buttons -->
            <div class="bg-gray-100 py-2 rounded-b-lg">
                <div class="flex justify-between items-center">
                    <div class="hover:bg-gray-400 w-1/2 h-full flex items-center justify-center rounded-lg mr-2">
                        <button class="w-full text-xs font-medium text-gray-500 hover:text-white border-r border-gray-400">
                            <i class="fas fa-phone-alt"></i> Call
                        </button>
                    </div>
                    <div class="hover:bg-gray-400 w-1/2 h-full flex items-center justify-center rounded-lg mx-1">
                        <button class="w-full text-xs font-medium text-gray-500 hover:text-white">
                            <i class="fas fa-envelope"></i> Mail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


