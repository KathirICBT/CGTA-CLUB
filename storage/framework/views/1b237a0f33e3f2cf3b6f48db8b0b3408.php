<div class="isolate bg-gray-100 min-h-screen px-6 py-5 sm:py-5 lg:px-8 mx-3 overflow-x-hidden scrollbar-custom">
    <nav class="flex items-center text-gray-600 text-md mb-4">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="<?php echo e(route('packages')); ?>" class="hover:text-sky-500">
                    Packages
                </a>
            </li>
            <li>
                <span class="mx-1 text-gray-400">/</span>
            </li>
            <li class="text-gray-500">Add Package</li>
        </ol>
    </nav>
    
    <form wire:submit.prevent="savePackage" class="bg-white mx-auto mt-8 p-10 border rounded-2xl shadow-xl overflow-auto scrollbar-custom">
        <label class="text-xl font-semibold leading-6 text-sky-600 flex items-start p-1">
            PACKAGE DETAILS
        </label>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-5">
            <!-- Package Name -->
            <div>
                <label class="block text-md font-semibold leading-6 text-gray-500">
                    Package Name
                </label>
                <div class="mt-1">
                    <input type="text" wire:model="packageName" placeholder="Package Name"
                        class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-md" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['packageName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>

            <!-- Package Price -->
            <div>
                <label class="block text-md font-semibold leading-6 text-gray-500">
                    Package Price
                </label>
                <div class="mt-1">
                    <input type="number" wire:model="price" placeholder="Package Price" step="0.01" min="0"
                        class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-md" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>

            <!-- Tax -->
            <div>
                <label class="block text-md font-semibold leading-6 text-gray-500">
                    Tax (%)
                </label>
                <div class="mt-1">
                    <input type="number" wire:model="tax" placeholder="Tax" step="0.01" min="0" max="100"
                        class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-md" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>

            <!-- Duration -->
            <div>
                <label class="block text-md font-semibold leading-6 text-gray-500">
                    Duration (in days)
                </label>
                <div class="mt-1">
                    <input type="number" wire:model="duration" placeholder="Duration in days"
                        class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-md" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>

            <!-- Max Member Count -->
            <div>
                <label class="block text-md font-semibold leading-6 text-gray-500">
                    Max Member Count
                </label>
                <div class="mt-1">
                    <input type="number" wire:model="maxMemberCount" placeholder="Max Members"
                        class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-md" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['maxMemberCount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
        
        <!-- Description -->
        <div class="mt-4">
            <label class="block text-md font-semibold leading-6 text-gray-500">
                Description
            </label>
            <div class="mt-1">
                <textarea wire:model="description" placeholder="Describe the package details"
                    class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-md"></textarea>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end">
            <button type="submit"
                class="bg-sky-400 text-black py-2 px-7 rounded-md shadow-sm hover:bg-sky-600 focus:ring-2 focus:ring-sky-700">
                Save Package
            </button>
        </div>
    </form>
</div>
<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/pages/package/package-form.blade.php ENDPATH**/ ?>