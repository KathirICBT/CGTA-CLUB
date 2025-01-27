{{--<div>--}}
{{--    --}}{{-- The Master doesn't talk, he acts. --}}
{{--</div>--}}

<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 overflow-auto h-screen">
    <div class="p-4 bg-white shadow rounded-lg mb-4">
        <h2 class="text-lg font-bold">Member Session</h2>
    </div>
    <!-- Notification Component -->
    <livewire:components.notification.notification
        :banner="$banner"
        :bannerStyle="$bannerStyle"
        wire:key="notification-{{ now() }}"
    />

    <!-- Search Bar and Actions -->
    <div class="md:flex md:items-center md:justify-between md:p-4 px-5 space-y-4 md:space-y-0">
        <!-- Search Input -->
        <div class="flex items-center w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-1 shadow-sm">
            <input
                type="text"
                placeholder="Search..."
                class="ml-2 flex-grow border-none outline-none text-gray-700 bg-transparent"
                wire:model="searchQuery"
            />
            <i wire:click="triggerSearch" class="fas fa-search text-gray-400 cursor-pointer"></i>
        </div>


        <!-- Action Buttons -->
        <div class="flex justify-between md:justify-end items-center space-x-5 w-full md:w-auto">
            <!-- View Toggle Buttons -->
            <div class="flex items-center bg-gray-100 rounded-xl space-x-4 p-2">
                <!-- Table View Icon -->
                <div class="px-1 py-1">
                    <button id="table-view" wire:click="toggleView('table')" class="text-gray-500 text-xl hover:text-gray-300 focus:outline-none transition-colors duration-300">
                        <i class="fas fa-table"></i>
                    </button>
                </div>

                <!-- Card View Icon -->
                <div class="px-1 py-1">
                    <button id="card-view" wire:click="toggleView('card')" class="text-gray-500 text-xl hover:text-gray-300 focus:outline-none transition-colors duration-300">
                        <i class="fas fa-id-card"></i>
                    </button>
                </div>
            </div>

            <!-- Add Member Button -->
            <button
                type="button"
                class="block rounded-md bg-emerald-600 px-3 py-1 text-center text-md font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                <a href="{{ route('member-form') }}">+</a>
            </button>
        </div>
    </div>

    <!-- Table or Card View -->
    <div class="mt-3 overflow-hidden w-full border rounded-xl hidden md:block">
        <!-- Table View -->
        @if($isTableView)
            <livewire:pages.member.member-comp.member-table-component
                :members="$members"
                :headers="$headers"
                routeName="member-form"
                :key="'member-table-' . implode('-', array_column($members, 'id'))"
            />
        @endif

        <!-- Card View -->
        @if(!$isTableView)
            <livewire:pages.member.member-comp.member-card
                :datas="$members"
                routeName="member-form"
                :key="'event-card-' . implode('-', array_column($members, 'id'))"
            />
        @endif
    </div>
    <div class="mt-3 overflow-x-auto w-full border rounded-xl block md:hidden">
        <livewire:pages.member.member-comp.member-card
            :datas="$members"
            routeName="member-form"
        />
    </div>
</div>

<script>
    // Listen for the event to reset the notification after 3 seconds
    Livewire.on('reset-notification', ({ delay }) => {
        setTimeout(() => {
            // Use Livewire to reset the notification state after the delay
        @this.set('banner', null);
        @this.set('bannerStyle', null);
        }, delay * 1000); // Convert seconds to milliseconds
    });
</script>




