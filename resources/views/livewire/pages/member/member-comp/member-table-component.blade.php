{{--<div>--}}
{{--    --}}{{-- Care about people's approval and you will be their prisoner. --}}
{{--</div>--}}


<table class="w-full divide-y divide-gray-300">
    <thead>
    <tr class="bg-gray-50">
        @foreach ($headers as $header)
            <th class="py-2 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                <div class="text-center pr-3">{{ $header }}</div>
            </th>
        @endforeach
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach ($datas as $data)
            <tr class="transition duration-300 ease-in-out hover:bg-gray-100 hover:shadow-md">
                @foreach ($data as $key => $value)
                    @if ($key === 'id')
                        <!-- Skip ID Column -->
                        @continue
                    @endif
                    @if ($key === 'photo_url')
                        <!-- Photo Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500  flex justify-center items-center">
                            @if ($value)
                                <div class="relative group">
                                    <img src="{{ $value }}" alt="Photo" class="w-12 h-12 object-cover rounded-full">
                                    <div class="absolute z-20 hidden group-hover:flex justify-center items-center w-40 h-40 left-full top-1/2 transform -translate-y-1/2 ml-0 bg-white shadow-lg rounded-full border border-gray-200">
                                        <img src="{{ $value }}" alt="Large Photo" class="w-36 h-36 object-cover rounded-full">
                                    </div>
                                </div>
                            @else
                                <div>No Photo</div>
                            @endif
                        </td>
                    @elseif ($key === 'status')
                        <!-- Status Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">
                            <div class="border px-1.5 py-0.5 rounded-3xl
                                    {{ $value === 'Active' ? 'text-emerald-900 bg-emerald-200' : '' }}
                                    {{ $value === 'Inactive' ? 'text-red-900 bg-red-200' : '' }}
                                    {{ $value === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : '' }}">
                                {{ $value }}
                            </div>
                        </td>
                    @else
                        <!-- Default Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">
                            {{ $value }}
                        </td>
                    @endif
                @endforeach


                <!-- Action Buttons -->
                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium">
                    <div class="flex justify-center items-center space-x-3">

                        <!-- Edit (Orange) -->
                        <livewire:components.button-comp.button
                            type="edit"
                            icon="true"
                            id="{{ $data['id'] }}"
                        />

                        <!-- Delete (Red) -->
                        <livewire:components.button-comp.button
                            type="delete"
                            icon="true"
                            id="{{ $data['id'] }}"
                        />

                        <!-- View (Blue) -->
                        <button
                           class="text-sky-500 hover:text-sky-300 text-lg flex justify-center items-center">
                            <a href="{{ route('member-view', ['memberId' => $data['id']]) }}">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
