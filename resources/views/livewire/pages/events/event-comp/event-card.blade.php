{{--<div>--}}
{{--    --}}{{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{--</div>--}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-4 ">
    @foreach ($events as $event)
        <div class="bg-white shadow-md overflow-hidden ">
            <div class="relative">
                <!-- Image Section -->
                <div class="relative">
                    <!-- Image Section -->
                    <img class="w-full h-48 object-cover" src="{{ $event['photo_url'] }}" alt="Festival of Happiness">

                    <!-- Smokey Blue Overlay -->
                    <div class="absolute top-0 left-0 w-full h-full bg-blue-900 opacity-40"></div> <!-- Adjust opacity as needed -->

                    @if (!$event['photo_url'])
                        <span class="text-gray-500 italic">No Photo</span>
                    @endif
                </div>
                {{--                @dd($event['photo_url'])--}}
                <!-- Price Tag and Location -->
                <div class="absolute bottom-0 w-full px-3 flex justify-between items-center bg-black bg-opacity-40">
                    <!-- Location -->
                    <div class="flex items-center text-white text-sm font-semibold">
                        <i class="fa-solid fa-location-dot w-4 h-4"></i>
                        <span>{{ $event['location'] }}</span>
                    </div>

                    <!-- Price Tag -->
                    <div class="bg-blue-700 text-white text-sm font-bold px-4 py-0.5 my-1 rounded-full">$50 - $250</div>
                </div>

                <div class="text-white font-semibold  text-lg mb-2 p-2 absolute top-0 left-0 bg-black bg-opacity-40 w-16 h-16">
                    <span class="block text-3xl -mt-2 font-mono text-center">{{ \Carbon\Carbon::parse($event['start_date'])->format('j') }}</span>
                    <span class="block text-xl -mt-3 font-mono text-center">{{ strtoupper(\Carbon\Carbon::parse($event['start_date'])->format('M')) }}</span>
                </div>

            </div>

            <div class="p-4">
                <!-- Date & Time -->
{{--                <div class="text-gray-800 font-medium text-sm mb-2">--}}
{{--                    {{ \Carbon\Carbon::parse($event['start_date'])->format('F jS, Y') }}--}}
{{--                </div>--}}

                <div class="text-gray-800 font-medium text-sm mb-2">
                    {{ \Carbon\Carbon::parse($event['start_time'])->format('g:i A') }} to {{ \Carbon\Carbon::parse($event['end_time'])->format('g:i A') }}
                </div>

                <!-- Title -->
                <h2 class="text-lg font-bold text-gray-900 mb-1">{{ $event['title'] }}</h2>

                <!-- Venue -->
                <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $event['description'] }}</p>
                <p class="text-lg text-gray-600 mb-4">Allowed: {{ $event['visibility'] }}</p>

                <!-- Tags -->
                <div class="flex space-x-2 text-xs text-gray-500">
                    <span class="bg-gray-100 px-2 py-1 rounded-full">{{ $event['eventCategory'] }}</span>
                    <span class="bg-gray-100 px-2 py-1 rounded-full">Gathering</span>
                    <span class="bg-gray-100 px-2 py-1 rounded-full">Promotion</span>
                    <span class="bg-gray-100 px-2 py-1 rounded-full">Conferences</span>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 border-t">

                <livewire:components.button-comp.button
                    type="edit"
                    icon="true"
                    id="{{ $event['id'] }}"
                />

                <!-- Delete (Red) -->
                <livewire:components.button-comp.button
                    type="delete"
                    icon="true"
                    id="{{ $event['id'] }}"
                />
                <a href="{{ route('member-view', ['memberId' => $event['id']]) }}"
                   class="text-sky-500 hover:text-sky-300 text-lg  flex justify-center items-center p-1 rounded-lg ">
                    <i class="fas fa-info-circle p-0.5"></i>
                </a>
            </div>
        </div>
    @endforeach
</div>

