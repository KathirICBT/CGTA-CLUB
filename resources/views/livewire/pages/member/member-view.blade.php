{{--<div>--}}
{{--    --}}{{-- The whole world belongs to you. --}}
{{--</div>--}}

<div class="border bg-gray-200 min-h-screen">
    <!-- Profile Section -->
    <div class="w-full mx-auto p-6 ">
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
                    View Member
                </li>
            </ol>
        </nav>
        <!-- Cover Photo Section -->
        <div class="relative border">
            <img src="/storage/assets/img2.png" alt="Cover Photo" class="w-full h-96 object-cover rounded-lg">
{{--            <button class="absolute top-2 right-2 px-4 py-2 bg-gray-800 text-white text-sm rounded">Edit Cover</button>--}}
        </div>
        <div class="rounded-lg shadow-md p-3 -mt-24 bg-white">
            <div class="flex items-center space-x-6 bg-white bg-opacity-30 backdrop-blur-md shadow-xl rounded-2xl p-6">
                <div class="relative">
                    <img src="{{ asset($photoUrl) }}" alt="Profile Photo" class="w-24 h-24 rounded-full">
                    <div
                        class="absolute top-2 right-5 transform translate-x-2 -translate-y-2 h-4 w-4 rounded-full ring-2 ring-white flex justify-center items-center
                                    {{ $status === 'Active' ? 'bg-green-500' : '' }}
                                    {{ $status === 'Inactive' ? 'bg-red-500' : '' }}
                                    {{ $status === 'Waiting' ? 'bg-yellow-500' : '' }}">
                        <div
                            class="h-2 w-2 bg-white rounded-full ring-1 ring-white">
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl text-black font-bold">
                        {{ $first_name }} {{ $last_name }} |
{{--                        <span class="text-md font-normal border border-black px-2 py-0.5 rounded-2xl--}}
{{--                            {{ $status === 'Active' ? 'text-emerald-900 bg-emerald-200' : '' }}--}}
{{--                            {{ $status === 'Inactive' ? 'text-red-900 bg-red-200' : '' }}--}}
{{--                            {{ $status === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : '' }}">--}}
{{--                            {{ $status }}--}}
{{--                        </span>--}}
                    </h1>
                    <p class="text-gray-600 text-lg">{{ $membership_level }}</p>
                </div>
            </div>
            <!-- Tabs -->
            <div class="mt-6 flex justify-center items-center ">
                <ul class="flex border-b">
                    <li class="-mb-px mr-1">
                        <a href="#" class="bg-white inline-block py-2 px-4 text-teal-500 font-semibold border-b-2 border-teal-500">Activity</a>
                    </li>
                    <li class="mr-1">
                        <a href="#" class="bg-white inline-block py-2 px-4 text-gray-600 hover:text-teal-500">Information</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Information Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <!-- Contact Card -->
            <div class="bg-white px-6 py-8 rounded-lg shadow- xl">
                <h2 class="text-lg font-bold ">Contact</h2>
                <div class="flex flex-col space-y-7 mt-5">
                    <div class="flex flex-col">
                        <label class="font-semibold text-gray-700">Email:</label>
                        <dd class="text-black font-semibold">
                            {{$email}}
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold text-gray-700">Phone:</label>
                        <dd class="text-black font-semibold">
                            {{$phone}}
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold text-gray-700">Website:</label>
                        <dd class="text-black font-semibold">
                            <a href="#" class="text-teal-500">https://www.hailio.com</a>
                        </dd>
                    </div>
                </div>
            </div>
            <!-- Information Card -->
            <div class="bg-white px-6 py-8   rounded-lg shadow- xl">
                <h2 class="text-lg font-bold ">Information</h2>
                <div class="flex flex-col space-y-7 mt-5">
                    <div class="flex flex-col">
                        <label class="font-semibold text-gray-700">Birthday:</label>
                        <dd class="text-black font-semibold">
                            {{$date_of_birth}}
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold text-gray-700">Joined Date:</label>
                        <dd class="text-black font-semibold">
                            {{$join_date}}
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold text-gray-700">Renewal Date:</label>
                        <dd class="text-black font-semibold">
                            {{$renewal_date}}
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-semibold text-gray-700">Company Website:</label>
                        <dd class="text-black font-semibold">
                            <a href="#" class="text-teal-500">https://www.hailio.com</a>
                        </dd>
                    </div>
                </div>
            </div>

            <!-- Work Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold">Work</h2>
            </div>
        </div>
    </div>
</div>
