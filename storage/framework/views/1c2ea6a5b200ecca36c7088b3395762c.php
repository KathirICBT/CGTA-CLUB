



<div class="overflow-x-auto overflow-y-hidden relative max-h-full bg-white">
    <table class="w-full divide-y divide-gray-300 ">
        <thead>
        <tr class="bg-gray-50">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="py-3.5 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                    <div class="text-center pr-3"><?php echo e($header); ?></div>
                </th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500"><?php echo e($category['id']); ?></td>
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 text-wrap"><?php echo e($category['name']); ?></td>
                <!-- Action Column with Fixed Position -->
                <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500 sticky right-0 bg-white z-10">
                    <div class="flex justify-center items-center space-x-3">
                        <!-- Edit (Orange) -->
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'edit','icon' => 'true','id' => ''.e($category['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2264770914-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'delete','icon' => 'true','id' => ''.e($category['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2264770914-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        
                        
                        
                        
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

$__html = app('livewire')->mount($__name, $__params, 'lw-2264770914-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
</div>

<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/pages/events/event-category-comp/event-category-table-component.blade.php ENDPATH**/ ?>