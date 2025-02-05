



<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 min-h-screen w-full ">
    <!-- Card (Above Table) -->
    <div class="p-4 bg-white shadow rounded-lg mb-4">
        <h2 class="text-lg font-bold">Event Category</h2>
    </div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.notification.notification', ['banner' => $banner,'bannerStyle' => $bannerStyle]);

$__html = app('livewire')->mount($__name, $__params, 'notification-'.e(now()).'', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.events.event-category-comp.event-category-table-component', ['categories' => $categories,'headers' => $headers]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2775039708-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>

        <!-- Right Section (Form) -->
        <div class="w-full md:w-1/2 bg-white md:ml-6 shadow-md">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.events.event-category-comp.event-category-form-component', ['categories' => $categories,'headers' => $headers]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2775039708-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>

</div>

<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/pages/events/event-categories.blade.php ENDPATH**/ ?>