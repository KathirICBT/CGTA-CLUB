{{--<div>--}}
{{--    --}}{{-- If your happiness depends on money, you will never b happy with yourself. --}}
{{--</div>--}}


<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 overflow-hidden min-h-screen w-full">
    <livewire:components.notification.notification :banner="$banner" :bannerStyle="$bannerStyle" wire:key="notification-{{ now() }}" />
    <div class="md:flex md:items-center md:justify-between bg-transparent md:p-4 px-5 rounded-xl">
        <div class="flex items-center w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-1 shadow-sm">
            <i class="fas fa-search text-gray-400"></i> <!-- Search Icon -->
            <input
                type="text"
                placeholder="Search..."
                class="ml-2 flex-grow border-none outline-none text-gray-700 bg-transparent"
            />
        </div>

        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex justify-center items-center space-x-5">

            <div class="flex items-center bg-gray-100 rounded-xl space-x-4 p-2">

                <!-- Table Icon -->
                <div class="px-1 py-1">
                    <button id="table-view" wire:click="toggleView('table')" class="text-gray-500 text-xl hover:text-gray-300 focus:outline-none transition-colors duration-300">
                        <i class="fas fa-table"></i>
                    </button>
                </div>

                <!-- Card Icon -->
                <div class="px-1 py-1">
                    <button id="card-view" wire:click="toggleView('card')" class="text-gray-500 text-xl hover:text-gray-300 focus:outline-none transition-colors duration-300">
                        <i class="fas fa-id-card"></i>
                    </button>
                </div>

            </div>


            <button
                type="button"
                class="block rounded-md bg-emerald-600 px-3 py-1 text-center text-md font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                <a href="{{ route('event-form') }}">
                    +
                </a>
            </button>
        </div>
    </div>

    <div class="mt-3 overflow-x-auto w-full border rounded-xl ">
        <!-- Card Component -->
        @if($isTableView)
            <div key="table-view" class="overflow-x-auto bg-white">
                <livewire:pages.events.event-comp.event-table-component
                    :events="$events"
                    :headers="$headers"
                    routeName="event-form"
                />
            </div>
        @endif

        <!-- Card Component -->
        @if(!$isTableView)
            <livewire:pages.events.event-comp.event-card
                :events="$events"
            />
        @endif

    </div>
</div>
