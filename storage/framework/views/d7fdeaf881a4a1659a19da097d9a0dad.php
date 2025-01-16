


































































<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-4 p-5 font-mono">
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class=" flex flex-col h-full max-w-md w-full rounded-lg bg-white p-6 text-center shadow-lg relative transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <div class="absolute top-1 right-1 flex flex-col space-y-1">
                <button class="p-1 text-amber-500 rounded-full hover:text-amber-700 text-lg"
                        wire:click="editMember(<?php echo e($data['id']); ?>)">
                    <i class="fas fa-edit text-"></i>
                </button>
                <button class="p-1 text-red-500 rounded-full hover:text-red-700 text-lg"
                        wire:click="deleteMember(<?php echo e($data['id']); ?>)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
            <div class="text-md [clip-path:polygon(0_0,_100%_0,_0_100%)] absolute left-0 top-0 flex h-20 w-20 items-center justify-center bg-blue-500">
                <i class="fas fa-check h-4 w-4 text-white relative -translate-x-4 -translate-y-3"></i>
            </div>
            <div class="relative mx-auto mt-2 <?php echo e($data['status'] === 'Active' ? 'text-white bg-green-500' : ($data['status'] === 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-yellow-500')); ?>"
                 style="width: fit-content; padding: 4px; border-radius: 9999px; box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);">

                <!-- Inner Wrapper with White Border -->
                <div class="border-4 border-white bg-white rounded-full p-1">
                    <img src="<?php echo e($data['photo_url']); ?>" alt="Profile Picture"
                         class="mx-auto h-24 w-24 rounded-full object-cover" />
                </div>
            </div>

            <h2 class="mt-4 text-xl font-semibold">
                <span><?php echo e($data['first_name']); ?></span>
                <span><?php echo e($data['last_name']); ?></span>
            </h2>
            <p class="text-sm text-gray-500">Founder and CEO</p>

            <div class="mt-4 space-y-3 text-left">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-envelope h-5 w-5 text-lg text-gray-500"></i>
                    <div>
                        <p class="text-gray-400 font-semibold">Email</p>
                        <span class="text-sm text-gray-700 -mt-3"><?php echo e($data['email']); ?></span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-phone-alt h-5 w-5 text-lg text-gray-500"></i>
                    <div>
                        <p class="text-gray-400 font-semibold">Phone</p>
                        <span class="text-sm text-gray-700 -mt-3"><?php echo e($data['phone']); ?></span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-calendar-alt h-5 w-5 text-lg text-gray-500"></i>
                    <div>
                        <p class="text-gray-400 font-semibold">Joined Date</p>
                        <span class="text-sm text-gray-700 -mt-3"><?php echo e($data['join_date']); ?></span>
                    </div>
                </div>
                
                
                
                
                
                
                
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>




<?php /**PATH /home/saai/Documents/Projects/CGTA-CLUB/resources/views/livewire/pages/member/member-comp/member-card.blade.php ENDPATH**/ ?>