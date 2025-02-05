<div class="flex space-x-2 p-6 bg-blue-50 h-screen overflow-hidden">
    <!-- Form Section (Left) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col overflow-hidden">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6 flex items-center">
            <span class="mr-2 text-blue-500 text-3xl">+</span>
            <?php echo e($isUpdate ? 'Edit Package Service' : 'Add Package Service'); ?>

        </h2>
        <form wire:submit.prevent="<?php echo e($isUpdate ? 'updatePackageService' : 'storePackageServices'); ?>" class="flex flex-col justify-between">
            <div class="mb-4">
                <!-- Package Dropdown (Select once) -->
                <label class="block text-sm font-medium text-gray-700 p-2">Select Package</label>
                <select wire:model="package_id" class="w-full border rounded-md p-2 text-sm focus:outline-blue-500">
                    <option value="">-- Select Package --</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($package->id); ?>"><?php echo e($package->package_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['package_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Dynamic Services -->
            <div id="service-selects-container">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $selected_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-4 service-select-item">
                        <label class="block text-sm font-medium text-gray-700 p-2">Select Service</label>
                        <select wire:model="selected_services.<?php echo e($index); ?>" class="w-full border rounded-md p-2 text-sm focus:outline-blue-500">
                            <option value="">-- Select Service --</option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($serviceOption->id); ?>"><?php echo e($serviceOption->service); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selected_services.' . $index];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Add More Services Button -->
            <button type="button" wire:click="addServiceField" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition mb-4">
                + Add Service
            </button>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition">
                <?php echo e($isUpdate ? 'Update Package Service' : 'Add Package Service'); ?>

            </button>
        </form>

        <!-- Cancel Edit Button (Only shown when updating) -->
        <!--[if BLOCK]><![endif]--><?php if($isUpdate): ?>
            <button wire:click="cancelEdit" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 transition mt-4">
                Cancel Edit
            </button>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- Table Section (Right) -->
    <div class="w-1/2 bg-white p-6 rounded shadow-md h-full flex flex-col">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Package Service List</h2>

        <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
            <div class="text-green-600 text-sm mb-4"><?php echo e(session('message')); ?></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="overflow-y-auto h-full">
            <table class="w-full border rounded-lg overflow-hidden">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="p-3 text-left font-medium text-gray-700">Package</th>
                        <th class="p-3 text-left font-medium text-gray-700">Service</th>
                        <th class="p-3 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $packageServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b">
                            <td class="p-3"><?php echo e($packageService->package->package_name); ?></td>
                            <td class="p-3"><?php echo e($packageService->service->service); ?></td>
                            <td class="p-3">
                                <button wire:click="editPackageService(<?php echo e($packageService->id); ?>)" class="text-yellow-500 hover:text-yellow-700 mx-1">
                                    ✏️
                                </button>
                                <button wire:click="deletePackageService(<?php echo e($packageService->id); ?>)" class="text-red-500 hover:text-red-700 mx-1">
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

<script>
    // JavaScript function to add a new service field dynamically
    let serviceFieldCount = 1;

    function addServiceField() {
        const container = document.getElementById('service-selects-container');
        const newServiceField = document.createElement('div');
        newServiceField.classList.add('mb-4', 'service-select-item');
        newServiceField.innerHTML = `
            <label class="block text-sm font-medium text-gray-700 p-2">Select Service</label>
            <select wire:model="selected_services.${serviceFieldCount}" class="w-full border rounded-md p-2 text-sm focus:outline-blue-500">
                <option value="">-- Select Service --</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($service->id); ?>"><?php echo e($service->service); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selected_services.${serviceFieldCount}'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        `;
        container.appendChild(newServiceField);
        serviceFieldCount++;
    }
</script>
<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/package-service.blade.php ENDPATH**/ ?>