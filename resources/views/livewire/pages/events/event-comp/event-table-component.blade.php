{{--<div>--}}
{{--    --}}{{-- Stop trying to control. --}}
{{--</div>--}}

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
{{--            <td class="whitespace-nowrap text-center py-4 pl-2 pr-3 text-sm font-medium text-gray-900 sm:pl-6">--}}
{{--                @if ($event['photo_url'])--}}
{{--                    <img src="{{ $event['photo_url'] }}" alt="Photo" class="w-28 h-24 object-cover">--}}
{{--                @else--}}
{{--                    <span class="text-gray-500 italic">No Photo</span>--}}
{{--                @endif--}}
{{--            </td>--}}
            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $event['title'] }}</td>
            <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 text-wrap">{{ $event['category_name'] }}</td>
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
                    <!-- Edit (Orange) -->
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
                    <a href="{{ route('event-view', ['eventId' => $event['id']]) }}"
                       class="text-sky-500 hover:text-sky-300 text-lg  flex justify-center items-center p-1 rounded-lg ">
                        <i class="fas fa-info-circle p-0.5"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
