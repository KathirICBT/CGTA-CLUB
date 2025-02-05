



<button class="
    <?php echo e($type === 'edit' ? 'text-amber-500 hover:text-amber-300' : ''); ?>

    <?php echo e($type === 'delete' ? 'text-rose-500 hover:text-rose-300' : ''); ?>

    text-lg flex justify-center items-center space-x-2"
    wire:click="emitAction"
>

    <!--[if BLOCK]><![endif]--><?php if($icon): ?>
        <i class="
            <?php echo e($type === 'edit' ? 'fas fa-edit' : ''); ?>

            <?php echo e($type === 'delete' ? 'fas fa-trash-alt' : ''); ?>">
        </i>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($text): ?>
        <span><?php echo e($text); ?></span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</button>
<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/components/button-comp/button.blade.php ENDPATH**/ ?>