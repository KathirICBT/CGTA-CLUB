{{--<div>--}}
{{--    --}}{{-- In work, do what you enjoy. --}}
{{--</div>--}}

<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 min-h-screen w-full ">
    <!-- Card (Above Table) -->
    <div class="p-4 bg-white shadow rounded-lg mb-4">
        <h2 class="text-lg font-bold">Event Category</h2>
    </div>
    <livewire:components.notification.notification :banner="$banner" :bannerStyle="$bannerStyle" wire:key="notification-{{ now() }}" />
    <div class="flex flex-col md:flex-row items-start">
        <!-- Left Section (Card + Table) -->
        <div class="w-full md:w-1/2 h-full md:p-4 px-5 mb-6 md:mb-0 ">
            <!-- Search + Table -->
            <div class="flex flex-row md:items-center md:justify-between bg-transparent rounded-xl">
                <div class="flex items-center w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-1 shadow-sm">
                    <i class="fas fa-search text-gray-400"></i> <!-- Search Icon -->
                    <input
                        type="text"
                        placeholder="Search..."
                        class="ml-2 flex-grow border-none outline-none text-gray-700 bg-transparent"
                    />
                </div>
            </div>

            <div class="mt-3 overflow-x-auto w-full border rounded-xl bg-white">
                <livewire:pages.events.event-category-comp.event-category-table-component
                    :categories="$categories"
                    :headers="$headers"
                />
            </div>
        </div>

        <!-- Right Section (Form) -->
        <div class="w-full md:w-1/2 bg-white md:ml-6 shadow-md">
            <livewire:pages.events.event-category-comp.event-category-form-component
                :categories="$categories"
                :headers="$headers"
            />
        </div>
    </div>

</div>

