

<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full">
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex flex-col justify-start items-start text-left relative">
            <!-- Icon with Ping Effect -->
            <div class="relative flex items-center justify-center h-8 w-8">
                <!-- Ping Effect -->
                <span 
                    class="absolute h-12 w-12 rounded-full bg-blue-500 opacity-75 animate-ping">
                </span>
                <!-- Icon -->
                <i class="<?php echo e($stat['icon']); ?> text-blue-500 text-2xl relative"></i>
            </div>

            <!-- Value -->
            <p class="text-3xl font-bold text-blue-800 mt-2"><?php echo e($stat['value']); ?></p>

            <!-- Label -->
            <p class="text-sm text-gray-500 uppercase"><?php echo e($stat['label']); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>





<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/user-panel/component/statistics.blade.php ENDPATH**/ ?>