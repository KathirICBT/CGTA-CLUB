<div>
    <a href="<?php echo e($url); ?>"
        class="flex items-center px-6 py-2 text-white rounded-full shadow-md transition duration-300"
        style="background-color: <?php echo e($color); ?>; 
               color: white; 
               transition: background-color 0.3s ease;"
        onmouseover="this.style.backgroundColor='<?php echo e($hoverColor); ?>'"
        onmouseout="this.style.backgroundColor='<?php echo e($color); ?>'"
    >
        <!-- Display Icon if Provided -->
        <!--[if BLOCK]><![endif]--><?php if($iconURL): ?>
            <img src="<?php echo e(asset('images/' . $iconURL)); ?>" alt="Icon" class="h-5 w-5 mr-2" />
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- Display Label -->
        <?php echo e($label); ?>

    </a>
</div>
<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/user-panel/component/button.blade.php ENDPATH**/ ?>