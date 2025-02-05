<table class="w-full divide-y divide-gray-300">
    <thead>
        <tr class="bg-gray-50">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="py-2 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                    <div class="text-center pr-3"><?php echo e($header); ?></div>
                </th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="transition duration-300 ease-in-out hover:bg-gray-100 hover:shadow-md">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if($key === 'id'): ?>
                        <!-- Skip ID Column -->
                        <?php continue; ?>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    
                   
                        <!-- Default Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">
                            <?php echo e($value); ?>

                        </td>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Action Buttons -->
                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium">
                    <div class="flex justify-center items-center space-x-3">
                        <!-- Edit (Orange) -->
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'edit','icon' => 'true','id' => ''.e($data['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3653759007-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'delete','icon' => 'true','id' => ''.e($data['id']).'','wire:click' => '$emit(\'deletePackage\', '.e($data['id']).')']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3653759007-1', $__slots ?? [], get_defined_vars());

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
<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/pages/package/package-comp/package-table-component.blade.php ENDPATH**/ ?>