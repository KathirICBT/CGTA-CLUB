<div class="flex space-x-2 p-6 bg-blue-50 h-screen overflow-hidden">
    <!-- Form Section (Left) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col overflow-hidden">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6 flex items-center">
            <span class="mr-2 text-blue-500 text-3xl">+</span>
            <?php echo e($isUpdate ? 'Edit Region' : 'Add Region'); ?>

        </h2>
        <form wire:submit.prevent="<?php echo e($isUpdate ? 'update' : 'store'); ?>" class="flex flex-col justify-between">
            <div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 p-2">Region Name</label>
                    <input 
                        type="text" 
                        wire:model="region" 
                        class="w-full border rounded-md p-2 text-sm focus:outline-blue-500" 
                    />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['region'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="flex space-x-2">
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition">
                    <?php echo e($isUpdate ? 'Update Region' : 'Add Region'); ?>

                </button>
                <!--[if BLOCK]><![endif]--><?php if($isUpdate): ?>
                    <button 
                        type="button" 
                        wire:click="cancelEdit" 
                        class="w-full bg-gray-400 text-white py-3 rounded-md hover:bg-gray-500 transition">
                        Cancel Edit
                    </button>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </form>
    </div>

    <!-- Table Section (Right) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Region List</h2>
        <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
            <div class="text-green-600 text-sm mb-4"><?php echo e(session('message')); ?></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="overflow-y-auto h-full">
            <table class="w-full divide-y divide-gray-300">
                <thead class="py-2 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                    <tr class="bg-gray-50">
                        <th >Region Name</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b">
                            <td class="p-3"><?php echo e($region->region); ?></td>
                            <td class="p-3">
                                <button 
                                    wire:click="edit(<?php echo e($region->id); ?>)" 
                                    class="text-blue-500 hover:text-blue-700 mx-1">
                                    ✏️
                                </button>
                                <button 
                                    wire:click="delete(<?php echo e($region->id); ?>)" 
                                    class="text-red-500 hover:text-red-700 mx-1">
                                    🗑️
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/region.blade.php ENDPATH**/ ?>