


<div class="overflow-x-auto overflow-y-hidden relative max-h-full bg-white">
    <table class="w-full divide-y divide-gray-300">
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
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="whitespace-nowrap text-center py-2 pl-2 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                    <!--[if BLOCK]><![endif]--><?php if($member['photo_url']): ?>
                        <div class="relative inline-block group">
                            <!-- Original Image -->
                            <img src="<?php echo e($member['photo_url']); ?>" alt="Photo" class="w-12 h-12 object-cover rounded-full">

                            <!-- Enlarged Image on Hover -->
                            <div class="absolute left-20 top-1/2 transform -translate-y-1/2 w-24 h-24 rounded-full overflow-hidden border-2 border-gray-300 opacity-0 transition-opacity duration-300 group-hover:opacity-100 pointer-events-none z-50">
                                <img src="<?php echo e($member['photo_url']); ?>" alt="Enlarged Photo" class="w-full h-full object-cover">
                            </div>
                        </div>
                    <?php else: ?>
                        <span class="text-gray-500 italic">No Photo</span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500"><?php echo e($member['first_name']); ?></td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500"><?php echo e($member['last_name']); ?></td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500"><?php echo e($member['email']); ?></td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500"><?php echo e($member['phone']); ?></td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500"><?php echo e($member['date_of_birth']); ?></td>
                <td class="whitespace-nowrap text-center py-2 text-sm text-gray-500"><?php echo e($member['join_date']); ?></td>
                <td class="whitespace-nowrap text-center text-sm text-gray-500">
                    <div class="border px-1 py-1 rounded-3xl
                                    <?php echo e($member['status'] === 'Active' ? 'text-emerald-900 bg-emerald-200' : ''); ?>

                                    <?php echo e($member['status'] === 'Inactive' ? 'text-red-900 bg-red-200' : ''); ?>

                                    <?php echo e($member['status'] === 'Waiting' ? 'text-yellow-900 bg-yellow-200' : ''); ?>">
                        <?php echo e($member['status']); ?>

                    </div>
                </td>
                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium">
                    <div class="flex justify-center items-center space-x-3">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'edit','icon' => 'true','id' => ''.e($member['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3415079863-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'delete','icon' => 'true','id' => ''.e($member['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3415079863-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <a href="<?php echo e(route('member-view', ['memberId' => $member['id']])); ?>"
                           class=" text-lg  flex justify-center items-center p-1 rounded-lg text-sky-500 hover:text-sky-300"
                           wire:click="editMember(<?php echo e($member['id']); ?>, 'view')">
                            <i class="fas fa-info-circle p-0.5"></i>
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

$__html = app('livewire')->mount($__name, $__params, 'lw-3415079863-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
</div>

<?php /**PATH /home/saai/Documents/Projects/CGTA-CLUB/resources/views/livewire/pages/member/member-comp/member-table-component.blade.php ENDPATH**/ ?>