



<div class="isolate bg-gray-100 min-h-screen px-6 py-5 sm:py-5 lg:px-8 md:w-full mx-3 overflow-x-hidden scrollbar-custom">
    <nav class="flex items-center text-gray-600 text-md mb-4">
        <ol class="flex items-center space-x-2">

            <li>
                <a href="<?php echo e(route('member')); ?>" class="hover:text-sky-500">
                    Members
                </a>
            </li>
            <li>
                <span class="mx-1 text-gray-400">/</span>
            </li>
            <li class="text-gray-500">
                Add Member
            </li>
        </ol>
    </nav>
    <form wire:submit.prevent="submitForm" method="POST" class="bg-white mx-auto mt-8 sm:mt-8 md:w-full overflow-auto p-10 border rounded-2xl shadow-xl scrollbar-custom">
        <label for="first_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1 ">
            MEMBER DETAIL
        </label>
        <div class="grid grid-cols-1 gap-x-8 gap-y-3 sm:grid-cols-2 mt-5">
            <div class="grid col-span-2 ">
                <label for="first_name" class="block text-md font-semibold leading-6 text-gray-500">
                    Photo
                </label>
                <div class="mt-1 flex items-center justify-start">
                    <label
                        for="photo"
                        class="relative flex items-center justify-center w-24 h-24 rounded-full  overflow-hidden border-2 border-dashed border-gray-300 cursor-pointer hover:border-black">
                        <!--[if BLOCK]><![endif]--><?php if(!$photo): ?>
                            <span class="absolute text-sm text-gray-500">Upload Photo</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <input type="file" id="photo" wire:model="photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <!-- Show image preview (optional) -->
                        <!--[if BLOCK]><![endif]--><?php if($photo): ?>
                            <img src="<?php echo e($photo->temporaryUrl()); ?>" alt="Uploaded Photo Preview" />
                        <?php elseif($photoUrl): ?> <!-- Show existing photo -->
                            <img src="<?php echo e(asset($photoUrl)); ?>" alt="Existing Photo" />
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </label>
                </div>
            </div>
            <div>
                <label for="first_name" class="block text-md font-semibold leading-6 text-gray-500">
                    First Name
                </label>
                <div class="mt-1">
                    <input type="text" id="first_name" wire:model="first_name" placeholder="Your First Name"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset  sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <label for="last_name" class="block text-md font-semibold leading-6 text-gray-500">
                    Last Name
                </label>
                <div class="mt-1">
                    <input type="text" id="last_name" wire:model="last_name" placeholder="Your Last Name"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <label for="email" class="block text-md font-semibold leading-6 text-gray-500">
                    Email
                </label>
                <div class="mt-1">
                    <input type="text" id="email" wire:model="email" placeholder="Your Email"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <label for="phone" class="block text-md font-semibold leading-6 text-gray-500">
                    Phone Number
                </label>
                <div class="mt-1">
                    <input type="text" id="phone" wire:model="phone" placeholder="Your Phone Number"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <label for="date_of_birth" class="block text-md font-semibold leading-6 text-gray-500">
                    Date of Birth
                </label>
                <div class="mt-1">
                    <input type="date" id="date_of_birth" wire:model="date_of_birth" placeholder="Your Date of Birth"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <label for="bio" class="block text-md font-semibold leading-6 text-gray-500">
                    Bio
                </label>
                <div class="mt-1">
                    <input type="text" id="bio" wire:model="bio" placeholder="Describe Yourself"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['bio'];
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
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mt-5">
            <div>
                <label for="status" class="block text-md font-semibold leading-6 text-gray-500">
                    Status
                </label>
                <div class="mt-1">
                    <select id="status" wire:model="status"
                            class="block w-full border-0 px-3.5 py-3 rounded-lg shadow-sm ring-1 ring-inset bg-white ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6">
                        <option value="" disabled>Select Status</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $statusOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($option); ?>"><?php echo e($option); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <label for="join_date" class="block text-md font-semibold leading-6 text-gray-500">
                    Joined Date
                </label>
                <div class="mt-1">
                    <input type="date" id="join_date" wire:model="join_date" placeholder="Your Joined Date"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['join_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <input type="checkbox" id="leader" wire:model="leader"
                       class="h-5 w-5 text-sky-600 border-gray-300 rounded focus:ring-2 focus:ring-sky-500" />
                <label for="leader" class="ml-3 block text-md font-semibold leading-6 text-gray-500">
                    Grant Board of Directors Privilege
                </label>
            </div>
            <!-- Leader Checkbox -->

            <!--[if BLOCK]><![endif]--><?php if(!$memberId): ?> <!-- Show password field only when creating a new member -->
                <div>
                    <label for="password" class="block text-md font-semibold leading-6 text-gray-500">
                        Password
                    </label>
                    <div class="mt-1">
                        <div class="relative">
                            <input type="<?php echo e($showPassword ? 'text' : 'password'); ?>" id="password" wire:model="password" placeholder="Your Password"
                                   class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6" />
                            <button type="button" wire:click="toggleShowPassword" class="absolute inset-y-0 right-0 px-3 py-2">
                                <i class="fas <?php echo e($showPassword ? 'fa-eye-slash' : 'fa-eye'); ?> text-gray-500"></i>
                            </button>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-md"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!-- Submit Button -->
        <div class="mt-6 w-full flex justify-end ">
            <button type="submit"
                    class="bg-sky-400 text-black py-2 px-7 rounded-md shadow-sm hover:bg-sky-600 focus:ring-2 focus:ring-inset focus:ring-sky-700">
                <?php echo e($memberId ? 'Update' : 'Create'); ?>

            </button>
        </div>
    </form>
</div>
<?php /**PATH /home/saai/Documents/Projects/CGTA-CLUB/resources/views/livewire/pages/member/member-form.blade.php ENDPATH**/ ?>