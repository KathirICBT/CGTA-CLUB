




<div class="isolate bg-gray-100 min-h-screen px-5 py-5 sm:py-5 md:w-full overflow-x-hidden  scrollbar-custom">

    <form wire:submit.prevent="submitForm" method="POST" class="bg-white mx-auto mt-8 sm:mt-8 md:w-full overflow-auto p-5 border rounded-2xl scrollbar-custom">
        <label for="first_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1 ">
            EVENT CATEGORY
        </label>
        <div class="mt-5">
            <div>
                <label for="first_name" class="block text-sm font-semibold leading-6 text-gray-500">
                    Event Category Name
                </label>
                <div class="mt-1">
                    <input type="text" id="name" wire:model="name" placeholder="Event Category Name"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset  sm:text-md sm:leading-6" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
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
        <div class="mt-6 w-full flex justify-end ">
            <button type="submit"
                    class="bg-sky-400 text-black py-2 px-7 rounded-md shadow-sm hover:bg-sky-600 focus:ring-2 focus:ring-inset focus:ring-sky-700">
                <?php echo e($eventCategoryId ? 'Update' : 'Create'); ?>

            </button>
        </div>
    </form>
</div>
<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/pages/events/event-category-comp/event-category-form-component.blade.php ENDPATH**/ ?>