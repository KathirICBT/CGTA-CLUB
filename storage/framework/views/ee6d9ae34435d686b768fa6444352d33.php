




<div class="sm:px-6 lg:py-6 shadow-md bg-gray-100 min-h-screen w-full font-mono">
    <div class="p-4 bg-white shadow rounded-lg mb-4">
        <h2 class="text-lg font-bold">Event Session</h2>
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
    <div class="md:flex md:items-center md:justify-between bg-transparent md:p-4 px-5 rounded-xl">
        <div class="flex items-center w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-1 shadow-sm">
            <i class="fas fa-search text-gray-400"></i> <!-- Search Icon -->
            <input
                type="text"
                placeholder="Search..."
                class="ml-2 flex-grow border-none outline-none text-gray-700 bg-transparent"
            />
        </div>

        <div class="flex justify-between md:justify-end items-center space-x-5 w-full md:w-auto">

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
                <a href="<?php echo e(route('event-form')); ?>">
                    +
                </a>
            </button>
        </div>
    </div>

    <div class="mt-3 overflow-hidden w-full border rounded-xl hidden md:block">
        <!-- Card Component -->
        <!--[if BLOCK]><![endif]--><?php if($isTableView): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.events.event-comp.event-table-component', ['events' => $events,'headers' => $headers,'routeName' => 'event-form']);

$__html = app('livewire')->mount($__name, $__params, 'lw-160419669-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- Card Component -->
        <!--[if BLOCK]><![endif]--><?php if(!$isTableView): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.events.event-comp.event-card', ['events' => $events]);

$__html = app('livewire')->mount($__name, $__params, 'lw-160419669-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="mt-3 overflow-x-auto w-full border rounded-xl block md:hidden">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.events.event-comp.event-card', ['events' => $events]);

$__html = app('livewire')->mount($__name, $__params, 'lw-160419669-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
</div>

<?php /**PATH /home/saai/Documents/Projects/CGTA-CLUB/resources/views/livewire/pages/events/events.blade.php ENDPATH**/ ?>