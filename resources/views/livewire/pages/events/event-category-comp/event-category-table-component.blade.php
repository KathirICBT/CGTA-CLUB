{{--<div>--}}
{{--    --}}{{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{--</div>--}}

<div class="overflow-x-auto overflow-y-hidden relative max-h-full bg-white">
    <table class="w-full divide-y divide-gray-300 ">
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
        @foreach ($categories as $category)
            <tr>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $category['id'] }}</td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 text-wrap">{{ $category['name'] }}</td>
                <!-- Action Column with Fixed Position -->
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 sticky right-0 bg-white z-10">
                    <div class="flex justify-center items-center space-x-3">
                        <!-- Edit (Orange) -->
                        <livewire:components.button-comp.button
                            type="edit"
                            icon="true"
                            id="{{ $category['id'] }}"
                        />

                        <!-- Delete (Red) -->
                        <livewire:components.button-comp.button
                            type="delete"
                            icon="true"
                            id="{{ $category['id'] }}"
                        />
                        {{--                        <a href="{{ route('event-view', ['eventId' => $category['id']]) }}"--}}
                        {{--                           class="text-sky-500 hover:text-sky-300 text-lg  flex justify-center items-center p-1 rounded-lg ">--}}
                        {{--                            <i class="fas fa-info-circle p-0.5"></i>--}}
                        {{--                        </a>--}}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-2">
        <livewire:components.paginat-comp.paginator/>
    </div>
</div>

