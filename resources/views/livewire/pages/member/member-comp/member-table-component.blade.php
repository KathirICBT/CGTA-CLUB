{{--<div>--}}
{{--    --}}{{-- Care about people's approval and you will be their prisoner. --}}
{{--</div>--}}
<div class="overflow-x-auto overflow-y-hidden relative max-h-full bg-white">
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
                <td class="whitespace-nowrap text-center py-2 pl-2 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                    @if ($member['photo_url'])
                        <div class="relative inline-block group">
                            <!-- Original Image -->
                            <img src="{{ $member['photo_url'] }}" alt="Photo" class="w-12 h-12 object-cover rounded-full">

                            <!-- Enlarged Image on Hover -->
                            <div class="absolute left-20 top-1/2 transform -translate-y-1/2 w-24 h-24 rounded-full overflow-hidden border-2 border-gray-300 opacity-0 transition-opacity duration-300 group-hover:opacity-100 pointer-events-none z-50">
                                <img src="{{ $member['photo_url'] }}" alt="Enlarged Photo" class="w-full h-full object-cover">
                            </div>
                        </div>
                    @else
                        <span class="text-gray-500 italic">No Photo</span>
                    @endif
                </td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['first_name'] }}</td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['last_name'] }}</td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['email'] }}</td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['phone'] }}</td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['date_of_birth'] }}</td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">{{ $member['join_date'] }}</td>
                <td class="whitespace-nowrap text-center text-sm text-gray-500">
                    <div class="border px-1 py-1 rounded-3xl
                                    {{ $member['status'] === 'Active' ? 'text-emerald-900 bg-emerald-200' : '' }}
                                    {{ $member['status'] === 'Inactive' ? 'text-red-900 bg-red-200' : '' }}
                                    {{ $member['status'] === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : '' }}">
                        {{ $member['status'] }}
                    </div>
                </td>
                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium">
                    <div class="flex justify-center items-center space-x-3">
                        <livewire:components.button-comp.button
                            type="edit"
                            icon="true"
                            id="{{ $member['id'] }}"
                        />
                        <livewire:components.button-comp.button
                            type="delete"
                            icon="true"
                            id="{{ $member['id'] }}"
                        />
                        <a href="{{ route('member-view', ['memberId' => $member['id']]) }}"
                           class=" text-lg  flex justify-center items-center p-1 rounded-lg text-sky-500 hover:text-sky-300"
                           wire:click="editMember({{ $member['id'] }}, 'view')">
                            <i class="fas fa-info-circle p-0.5"></i>
                        </a>
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

