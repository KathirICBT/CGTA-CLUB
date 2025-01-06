{{--<div>--}}
{{--    --}}{{-- Stop trying to control. --}}
{{--</div>--}}


<div>
    <!-- Trigger Button -->
    <button
        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50"
        wire:click="confirmUserDeletion" wire:loading.attr="disabled">
        {{ __('Delete lol') }}
    </button>

    <!-- Modal -->
    <div x-data="{ open: @entangle('confirmingUserDeletion') }" x-show="open"
         class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 max-w-md overflow-hidden">
            <!-- Modal Title -->
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    {{ __('Delete Entity') }}
                </h3>
            </div>

            <!-- Modal Content -->
            <div class="px-6 py-4">
                <p class="text-sm text-gray-700">
                    {{ __('Are you sure you want to delete this?') }}
                </p>
{{--                <div class="mt-4">--}}
{{--                    <input--}}
{{--                        type="password"--}}
{{--                        placeholder="{{ __('Password') }}"--}}
{{--                        autocomplete="current-password"--}}
{{--                        wire:model="password"--}}
{{--                        wire:keydown.enter="deleteUser"--}}
{{--                        class="border border-gray-300 rounded-md shadow-sm w-full py-2 px-3 focus:ring focus:ring-red-300"--}}
{{--                    />--}}
{{--                    @error('password')--}}
{{--                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3 bg-gray-100 flex justify-end space-x-2">
                <button
                    @click="open = false"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    {{ __('Cancel') }}
                </button>
                <button
                    wire:click="deleteUser"
                    wire:loading.attr="disabled"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Delete Entity') }}
                </button>
            </div>
        </div>
    </div>

</div>+
