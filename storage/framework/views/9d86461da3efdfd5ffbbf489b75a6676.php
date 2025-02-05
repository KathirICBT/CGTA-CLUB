



<div class="overflow-x-auto overflow-y-hidden relative max-h-full bg-white">
    <table class="w-full divide-y divide-gray-300">
        <thead>
        <tr class="bg-gray-50">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="py-3.5 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                    <div class="text-center pr-3"><?php echo e($header); ?></div>
                </th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <th class="py-3.5 pr-4 text-left text-sm font-semibold text-gray-900 sticky right-0 bg-gray-50 z-10">
                Actions
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <!-- Scrollable Columns -->
                <td class="whitespace-nowrap text-left px-4 py-4 text-sm text-gray-500 line-clamp-2"><?php echo e($event['title']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['category_name']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['start_date']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['start_time']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['visibility']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['release_date']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['closing_date']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['paid_free']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['user_limit']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($event['user_limit_per_registrants']); ?></td>

                <!-- Fixed Action Column -->
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 sticky right-0 z-10">
                    <div class="flex justify-center items-center space-x-3">
                        <!-- Edit (Orange) -->
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'edit','icon' => 'true','id' => ''.e($event['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3453223235-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <!-- Delete (Red) -->
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'delete','icon' => 'true','id' => ''.e($event['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3453223235-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <a href="<?php echo e(route('event-view', ['eventId' => $event['id']])); ?>"
                           class="text-sky-500 hover:text-sky-300 text-lg flex justify-center items-center rounded-lg pr-2">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
    <div class="p-2">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.paginat-comp.paginator', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3453223235-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
</div>

<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/pages/events/event-comp/event-table-component.blade.php ENDPATH**/ ?>