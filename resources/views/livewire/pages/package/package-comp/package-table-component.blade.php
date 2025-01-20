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
                    
                   
                        <!-- Default Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">
                            {{ $value }}
                        </td>
                    
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
                            wire:click="$emit('deletePackage', {{ $data['id'] }})"
                        />

                        
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
