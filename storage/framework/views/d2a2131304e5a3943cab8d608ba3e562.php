<div class="bg-gray-50/5">
  <div class="xl:w-1200 mx-auto w-11/12 py-12 md:py-20 lg:w-10/12">
    <div class="space-y-20">
      <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="space-y-6 text-center md:flex md:items-center md:justify-around md:space-x-12 md:space-y-0 md:text-left <?php echo e($section['reverse'] ? 'md:flex-row-reverse' : ''); ?>">
          <div class="w-full space-y-4 md:w-1/3">
            <h3 class="text-3xl lg:text-4xl font-bold text-gray-800"><?php echo e($section['title']); ?></h3>
            <p class="text-gray-600 leading-relaxed">
              <?php echo e($section['content']); ?>

            </p>
          </div>
          <div class="mx-auto w-full sm:w-3/4 md:w-1/3">
              <img
                src="<?php echo e($section['image']); ?>"
                alt="<?php echo e($section['title']); ?>"
                class="w-full h-auto object-cover rounded-lg shadow-lg">
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
  </div>
</div>
<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/user-panel/program-service/program-service.blade.php ENDPATH**/ ?>