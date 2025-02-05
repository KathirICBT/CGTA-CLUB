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
                    <!--[if BLOCK]><![endif]--><?php if($key === 'photo_url'): ?>
                        <!-- Photo Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500  flex justify-center items-center">
                            <!--[if BLOCK]><![endif]--><?php if($value): ?>
                                <div class="relative group">
                                    <img src="<?php echo e($value); ?>" alt="Photo" class="w-12 h-12 object-cover rounded-full">
                                    <div class="absolute z-20 hidden group-hover:flex justify-center items-center w-40 h-40 left-full top-1/2 transform -translate-y-1/2 ml-0 bg-white shadow-lg rounded-full border border-gray-200">
                                        <img src="<?php echo e($value); ?>" alt="Large Photo" class="w-36 h-36 object-cover rounded-full">
                                    </div>
                                </div>
                            <?php else: ?>
                                <div>No Photo</div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                    <?php elseif($key === 'status'): ?>
                        <!-- Status Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">
                            <div class="border px-1.5 py-0.5 rounded-3xl
                                    <?php echo e($value === 'Active' ? 'text-emerald-900 bg-emerald-200' : ''); ?>

                                    <?php echo e($value === 'Inactive' ? 'text-red-900 bg-red-200' : ''); ?>

                                    <?php echo e($value === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : ''); ?>">
                                <?php echo e($value); ?>

                            </div>
                        </td>
                    <?php else: ?>
                        <!-- Default Column -->
                        <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500">
                            <?php echo e($value); ?>

                        </td>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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

$__html = app('livewire')->mount($__name, $__params, 'lw-3536117429-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'delete','icon' => 'true','id' => ''.e($data['id']).'','wire:click' => '$emit(\'deleteCompany\', '.e($data['id']).')']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3536117429-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                        <!-- View (Blue) -->
                        <button
                           class="text-sky-500 hover:text-sky-300 text-lg flex justify-center items-center">
                            <a href="<?php echo e(route('company', ['companyId' => $data['id']])); ?>">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </tbody>
</table>
<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/pages/company/company-comp/company-table-component.blade.php ENDPATH**/ ?>