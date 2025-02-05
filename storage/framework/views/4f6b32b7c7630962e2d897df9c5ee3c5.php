

<div x-data="{ menuOpen: false, activeSubmenu: null }" class="relative">
    <!-- Navigation Links -->
    <ul class="lg:flex lg:items-center lg:gap-4 flex flex-col lg:flex-row text-left lg:text-center">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="relative group lg:inline-block">
                <!-- Main Link -->
                <!--[if BLOCK]><![endif]--><?php if(!empty($link['subLinks'])): ?>
                    <button 
                        type="button" 
                        class="flex items-center justify-between px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center"
                        @click="activeSubmenu === <?php echo e($loop->index); ?> ? activeSubmenu = null : activeSubmenu = <?php echo e($loop->index); ?>">
                        <?php echo e($link['name']); ?>

                        <!-- Dropdown Indicator -->
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            :class="{ 'rotate-180': activeSubmenu === <?php echo e($loop->index); ?> }"
                            class="h-5 w-5 ml-2 text-gray-500 group-hover:text-blue-600 transition-transform duration-300"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                <?php else: ?>
                    <a 
                        href="<?php echo e($link['url']); ?>" 
                        class="block px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center">
                        <?php echo e($link['name']); ?>

                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Dropdown Menu -->
                <!--[if BLOCK]><![endif]--><?php if(!empty($link['subLinks'])): ?>
                    <ul 
                        x-show="activeSubmenu === <?php echo e($loop->index); ?>" 
                        @click.away="activeSubmenu = null"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="bg-white shadow-md mt-1 px-3 w-full text-left lg:w-48 lg:absolute lg:left-0 lg:mt-2 lg:bg-white lg:shadow-lg lg:rounded-md lg:text-left z-50 border border-gray-200 origin-top"
                    >
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $link['subLinks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="py-1">
                                <a 
                                    href="<?php echo e($subLink['url']); ?>" 
                                    class="block py-1 px-3 text-gray-600 hover:text-blue-600 hover:bg-gray-100 transition duration-300 rounded-md">
                                    <?php echo e($subLink['name']); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </ul>
</div>

<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/user-panel/nav/navigation.blade.php ENDPATH**/ ?>