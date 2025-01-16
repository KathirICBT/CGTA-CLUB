{{--<div>--}}
{{--    --}}{{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
{{--</div>--}}

{{--<div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4 ">--}}
{{--    @foreach ($datas as $data)--}}
{{--        <div class="rounded-lg shadow-md bg-white relative text-center p-3 transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">--}}
{{--            <!-- Top right corner icons -->--}}
{{--            <div class="absolute top-1 right-1 flex space-x-1">--}}
{{--                <button class="p-1 text-green-500 rounded-full hover:text-green-700 text-lg"--}}
{{--                        wire:click="editMember({{ $data['id'] }})">--}}
{{--                    <i class="fas fa-edit"></i>--}}
{{--                </button>--}}
{{--                <button class="p-1 text-red-500 rounded-full hover:text-red-700 text-lg"--}}
{{--                        wire:click="deleteMember({{ $data['id'] }})">--}}
{{--                    <i class="fas fa-trash-alt"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <!-- Profile picture -->--}}
{{--            @if ($data['photo_url'])--}}
{{--                <div class="relative mx-auto mt-2" style="width: fit-content; padding: 4px; border: 1px solid white; border-radius: 9999px; box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);">--}}
{{--                    <img src="{{ $data['photo_url'] }}" alt="Photo" class="w-20 h-20 object-cover rounded-full">--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="relative mx-auto mt-2" style="width: fit-content; padding: 4px; border: 1px solid white; border-radius: 9999px; box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);">--}}
{{--                    <div class="w-20 h-20 flex items-center justify-center rounded-full bg-gray-200">--}}
{{--                        <span class="text-gray-500 italic text-sm">No Photo</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <!-- Member details -->--}}
{{--            <div class="p-2">--}}
{{--                <h3 class="text-sm font-bold  text-black">--}}
{{--                    <span>{{ $data['first_name'] }}</span>--}}
{{--                    <span>{{ $data['last_name'] }}</span>--}}
{{--                </h3>--}}
{{--                <p class="text-xs text-gray-600 font-semibold">Founder and CEO</p>--}}
{{--                <p class="text-xs text-gray-600">{{ $data['email'] }}</p>--}}
{{--                <p class="text-sm font-semibold text-gray-500">{{ $data['phone'] }}</p>--}}
{{--                <p class="text-xs text-gray-600 mt-1">Join Date: {{ $data['join_date'] ?? 'N/A' }}</p>--}}

{{--                <!-- Status badge -->--}}
{{--                <div class="mt-1 inline-block px-3 py-0.5 text-xs font-medium rounded-full--}}
{{--                            {{ $data['status'] === 'Active' ? 'text-white bg-green-500' : ($data['status'] === 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-yellow-500') }}">--}}
{{--                    {{ $data['status'] }}--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Footer with Call and Mail buttons -->--}}
{{--            <div class="py-2 rounded-b-lg">--}}
{{--                <div>--}}
{{--                    <button class="py-1 px-5 text-xs font-medium text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-700 border rounded-xl shadow-xl">--}}
{{--                        <i class="fas fa-phone-alt"></i> Call--}}
{{--                    </button>--}}
{{--                    <button class="font-mono py-1 px-5 text-xs font-medium text-white bg-gradient-to-r from-gray-900 to-purple-900 hover:bg-gradient-to-r hover:from-gray-900 hover:to-purple-800 border rounded-xl shadow-xl">--}}
{{--                        <i class="fas fa-phone-alt"></i> Call--}}
{{--                    </button>--}}
{{--                    <button class="py-1 px-5 text-xs font-medium text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-700 border rounded-xl shadow-xl">--}}
{{--                        <i class="fas fa-envelope"></i> Mail--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-4 p-5 font-mono">
    @foreach ($datas as $data)
        <div class=" flex flex-col h-full max-w-md w-full rounded-lg bg-white p-6 text-center shadow-lg relative transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <div class="absolute top-1 right-1 flex flex-col space-y-1">
                <button class="p-1 text-amber-500 rounded-full hover:text-amber-700 text-lg"
                        wire:click="editMember({{ $data['id'] }})">
                    <i class="fas fa-edit text-"></i>
                </button>
                <button class="p-1 text-red-500 rounded-full hover:text-red-700 text-lg"
                        wire:click="deleteMember({{ $data['id'] }})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
            <div class="text-md [clip-path:polygon(0_0,_100%_0,_0_100%)] absolute left-0 top-0 flex h-20 w-20 items-center justify-center bg-blue-500">
                <i class="fas fa-check h-4 w-4 text-white relative -translate-x-4 -translate-y-3"></i>
            </div>
            <div class="relative mx-auto mt-2 {{ $data['status'] === 'Active' ? 'text-white bg-green-500' : ($data['status'] === 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-yellow-500') }}"
                 style="width: fit-content; padding: 4px; border-radius: 9999px; box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);">

                <!-- Inner Wrapper with White Border -->
                <div class="border-4 border-white bg-white rounded-full p-1">
                    <img src="{{ $data['photo_url'] }}" alt="Profile Picture"
                         class="mx-auto h-24 w-24 rounded-full object-cover" />
                </div>
            </div>

            <h2 class="mt-4 text-xl font-semibold">
                <span>{{ $data['first_name'] }}</span>
                <span>{{ $data['last_name'] }}</span>
            </h2>
            <p class="text-sm text-gray-500">Founder and CEO</p>

            <div class="mt-4 space-y-3 text-left">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-envelope h-5 w-5 text-lg text-gray-500"></i>
                    <div>
                        <p class="text-gray-400 font-semibold">Email</p>
                        <span class="text-sm text-gray-700 -mt-3">{{ $data['email'] }}</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-phone-alt h-5 w-5 text-lg text-gray-500"></i>
                    <div>
                        <p class="text-gray-400 font-semibold">Phone</p>
                        <span class="text-sm text-gray-700 -mt-3">{{ $data['phone'] }}</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-calendar-alt h-5 w-5 text-lg text-gray-500"></i>
                    <div>
                        <p class="text-gray-400 font-semibold">Joined Date</p>
                        <span class="text-sm text-gray-700 -mt-3">{{ $data['join_date'] }}</span>
                    </div>
                </div>
                {{--        <div class="flex items-center space-x-2">--}}
                {{--            <i class="fas fa-envelope h-5 w-5 text-lg"></i>--}}
                {{--            <div>--}}
                {{--                <p>Location</p>--}}
                {{--                <span class="text-sm text-gray-700 -mt-3">Wesley@gmail.com</span>--}}
                {{--            </div>--}}
                {{--        </div>--}}
            </div>
        </div>
    @endforeach
</div>




