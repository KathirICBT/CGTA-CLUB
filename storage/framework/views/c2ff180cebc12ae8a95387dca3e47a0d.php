
















<div x-data="{ menuOpen: false }">
    <!-- Header with Increased Bottom Space -->
    <header
        class="absolute z-10 w-full"
        style="background: linear-gradient(to bottom, rgba(0, 0, 22, 0.9), rgba(0, 0, 50, 0));"
    >
        <nav
            class="flex justify-between items-center max-container h-full px-4 lg:px-0 pb-20 mt-6"
        >
            <!-- Logo -->
            

            <div class="relative flex-shrink-0">
                <!-- Ping Effect -->
                <span class="absolute inline-flex h-20 sm:h-24 md:h-28 lg:h-36 w-20 sm:w-24 md:w-28 lg:w-36 rounded-full bg-blue-500 opacity-75 animate-ping"></span>
                <!-- Logo -->
                <a href="/" class="relative flex-shrink-0">
                    <img src="<?php echo e(asset('images/logo-round.png')); ?>" alt="Connecting GTA Logo"
                        class="h-20 sm:h-24 md:h-28 lg:h-36 w-auto relative">
                </a>
            </div>
            

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex flex-1 justify-center items-center gap-10">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user-panel.nav.navigation', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1977014318-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </ul>

            <!-- Sign In & Register Buttons (Desktop) -->
            <div class="hidden lg:flex gap-3">
                <a href="<?php echo e(url('/login')); ?>" 
                class="px-4 py-1 border border-blue-500 text-blue-500 bg-blue-100 rounded-full hover:bg-blue-500 hover:text-white transition duration-300 text-sm font-medium">
                    Member Login
                </a>
                <a href="<?php echo e(url('/register')); ?>" 
                class="px-4 py-1 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-300 text-sm font-medium">
                    Join CGTA
                </a>
            </div>


            <!-- Mobile Menu Button -->
            <button class="lg:hidden px-4 py-2" @click="menuOpen = !menuOpen">
                <span x-show="!menuOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </span>
                <span x-show="menuOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div 
            x-show="menuOpen" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 transform -translate-y-6 scale-95"
            class="lg:hidden bg-white shadow-md rounded-md mt-2 absolute left-0 w-full z-20 overflow-hidden">
            <ul class="flex flex-col items-center gap-4 py-4">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user-panel.nav.navigation', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1977014318-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </ul>
            <!-- Sign In & Register Buttons (Mobile) -->
            <div class="flex justify-center gap-3 mt-4 mb-4">
                <a href="<?php echo e(url('/login')); ?>" 
                class="px-4 py-1 border border-blue-500 text-blue-500 bg-blue-100 rounded-full hover:bg-blue-500 hover:text-white transition duration-300 text-sm font-medium">
                    Member Login
                </a>
                <a href="<?php echo e(url('/register')); ?>" 
                class="px-4 py-1 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-300 text-sm font-medium">
                    Join CGTA
                </a>
            </div>

        </div>
    </header>
</div>











<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/user-panel/nav/nav.blade.php ENDPATH**/ ?>