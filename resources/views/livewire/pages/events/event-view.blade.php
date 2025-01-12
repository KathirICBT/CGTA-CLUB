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
                        Events
                    </a>
                </li>
                <li>
                    <span class="mx-1 text-gray-400">/</span>
                </li>
                <li class="text-gray-500">
                    View Event
                </li>
            </ol>
        </nav>
        <!-- Cover Photo Section -->
        <div class="relative border bg-gray-50 rounded-xl p-5 flex gap-4 justify-center items-start">
            <!-- Left side: Image -->
            <div class="relative border w-2/3">
                <img src="{{ asset($photoUrl) }}" alt="Cover Photo" class="w-full h-full object-cover rounded-lg">
                <button class="absolute top-2 right-2 px-4 py-2 bg-gray-800 text-white text-sm rounded-lg">Edit Cover</button>
            </div>

            <!-- Right side: Description -->
            <div class="border w-1/3 p-4 rounded-lg shadow-lg bg-white">
                <h2 class="text-2xl font-bold mb-2">Event Description</h2>
                <p class="text-gray-700 mb-4">
                    {{$description}}
                </p>
{{--                <button class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg">Learn More</button>--}}
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6 flex justify-center items-center ">
            <button class="-mb-px mr-1" wire:click="toggleView('information')">
                <span  class="bg-white inline-block py-2 px-4 text-gray-600 hover:text-teal-500 font-semibold  hover:border-teal-500">Information</span>
            </button>
            <button class="mr-1" wire:click="toggleView('activity')">
                <span class="bg-white inline-block py-2 px-4 text-gray-600 hover:text-teal-500 hover:border-teal-500">Activity</span>
            </button>
        </div>

        <!-- Information Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
            <!-- Contact Card -->
            @if($isTableView)
                <div class="bg-white px-6 py-8 rounded-lg shadow- xl">
                    <h2 class="text-2xl font-bold ">Event Details</h2>
                    <div class="flex flex-col space-y-7 mt-5">
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Title:</label>
                            <dd class="text-black font-semibold">
                                {{$title}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Category: </label>
                            <dd class="text-black font-semibold">
                                {{$eventCategory}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Period:</label>
                            <dd class="text-black font-semibold">
                                {{$start_date}} - {{$end_date}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Time Periods:</label>
                            <dd class="text-black font-semibold">
                                {{$start_time}} - {{$end_time}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Website:</label>
                            <dd class="text-black font-semibold">
                                <a href="#" class="text-teal-500">{{$event_url}}</a>
                            </dd>
                        </div>
                    </div>
                </div>
                <!-- Information Card -->
                <div class="bg-white px-6 py-8   rounded-lg shadow-xl">
                    <h2 class="text-2xl font-bold ">Event Registration Details</h2>
                    <div class="flex flex-col space-y-7 mt-5">
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Registration Opening:</label>
                            <dd class="text-black font-semibold">
                                {{$release_date}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Registration Closing:</label>
                            <dd class="text-black font-semibold">
                                {{$closing_date}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Joined Date:</label>
                            <dd class="text-black font-semibold">
                                {{$paid_free}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Event Price:</label>
                            <dd class="text-black font-semibold">
                                {{$user_limit_per_registrants}}
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Event Visible to:</label>
                            <dd class="text-black font-semibold">
                                {{$visibility}}
                            </dd>
                        </div>
                    </div>
                </div>
            @endif
            @if(!$isTableView)
                <div class="bg-white px-6 py-8 rounded-lg shadow- xl">
                    <h2 class="text-2xl font-bold ">Event Details</h2>
                    <div class="flex flex-col space-y-7 mt-5">
                        <!-- Total Attendance -->
                        <!-- Total Attendance -->
                        <div class="flex justify-between items-center">
                            <label class="font-semibold text-gray-700">Total Attendance:</label>
                            <dd class="text-black font-semibold">
                                1200 people
                            </dd>
                        </div>

                        <!-- Tickets Sold -->
                        <div class="flex justify-between items-center">
                            <label class="font-semibold text-gray-700">Tickets Sold:</label>
                            <dd class="text-black font-semibold">
                                900 / 1000 (90%)
                            </dd>
                        </div>

                        <!-- Revenue -->
                        <div class="flex justify-between items-center">
                            <label class="font-semibold text-gray-700">Total Revenue:</label>
                            <dd class="text-black font-semibold">
                                $45,000.00
                            </dd>
                        </div>

                        <!-- Donations -->
                        <div class="flex justify-between items-center">
                            <label class="font-semibold text-gray-700">Donations Collected:</label>
                            <dd class="text-black font-semibold">
                                $5,000.00
                            </dd>
                        </div>

                        <!-- Feedback Score -->
                        <div class="flex justify-between items-center">
                            <label class="font-semibold text-gray-700">Average Feedback Score:</label>
                            <dd class="text-black font-semibold">
                                4.8 / 5
                            </dd>
                        </div>

                        <!-- Sponsors -->
                        <div class="flex flex-col">
                            <label class="font-semibold text-gray-700">Event Sponsors:</label>
                            <ul class="list-disc pl-5 text-black font-semibold">
                                <li>Sponsor A</li>
                                <li>Sponsor B</li>
                                <li>Sponsor C</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Information Card -->
{{--                <div class="bg-white px-6 py-8   rounded-lg shadow-xl">--}}
{{--                    <h2 class="text-2xl font-bold ">Event Registration Details</h2>--}}
{{--                    <div class="flex flex-col space-y-7 mt-5">--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <label class="font-semibold text-gray-700">Registration Opening:</label>--}}
{{--                            <dd class="text-black font-semibold">--}}
{{--                                {{$release_date}}--}}
{{--                            </dd>--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <label class="font-semibold text-gray-700">Registration Closing:</label>--}}
{{--                            <dd class="text-black font-semibold">--}}
{{--                                {{$closing_date}}--}}
{{--                            </dd>--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <label class="font-semibold text-gray-700">Joined Date:</label>--}}
{{--                            <dd class="text-black font-semibold">--}}
{{--                                {{$paid_free}}--}}
{{--                            </dd>--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <label class="font-semibold text-gray-700">Event Price:</label>--}}
{{--                            <dd class="text-black font-semibold">--}}
{{--                                {{$user_limit_per_registrants}}--}}
{{--                            </dd>--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <label class="font-semibold text-gray-700">Event Visible to:</label>--}}
{{--                            <dd class="text-black font-semibold">--}}
{{--                                {{$visibility}}--}}
{{--                            </dd>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            @endif
        </div>
    </div>
</div>
