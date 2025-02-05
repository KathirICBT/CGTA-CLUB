



<div
    <?php if($banner): ?>
        style="display:block;"
    <?php else: ?>
        style="display:none;"
    <?php endif; ?>
    class="p-4 rounded-md absolute top-20 right-5
           <?php echo e($bannerStyle === 'success' ? 'bg-emerald-200 text-emerald-900 border-emerald-900 border' :
              ($bannerStyle === 'danger' ? 'bg-red-200 text-red-900 border-red-900 border' :
              'bg-gray-500 text-white')); ?>"
>
    <div class="flex justify-between items-center space-x-5">
        <!-- Notification Message -->
        <p class="truncate"><?php echo e($banner); ?></p>

        <!-- Close Button -->
        <button
            @click="$el.closest('div[style]').style.display = 'none'"
            wire:click="clearNotification"
            class="text-white hover:text-gray-300 focus:outline-none text-lg bg-gray-800 w-5 h-5 rounded-full flex justify-center items-center"
        >
            &times;
        </button>
    </div>
</div>

<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/components/notification/notification.blade.php ENDPATH**/ ?>