










<div>
    <a href="<?php echo e($url); ?>"
        class="flex items-center px-6 py-2 rounded-full shadow-md transition duration-300"
        style="
            background-color: <?php echo e($color); ?>;
            color: <?php echo e($textColor); ?>;
            transition: background-color 0.3s ease, color 0.3s ease;"
        onmouseover="this.style.backgroundColor='<?php echo e($hoverColor); ?>';"
        onmouseout="this.style.backgroundColor='<?php echo e($color); ?>';"
    >
        <!-- Display Icon if Provided -->
        <!--[if BLOCK]><![endif]--><?php if($iconURL): ?>
            <img src="<?php echo e(asset('images/' . $iconURL)); ?>" alt="<?php echo e($iconAlt); ?>" class="h-5 w-5 mr-2" />
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- Display Label -->
        <?php echo e($label); ?>

    </a>
</div>



<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/user-panel/component/button.blade.php ENDPATH**/ ?>