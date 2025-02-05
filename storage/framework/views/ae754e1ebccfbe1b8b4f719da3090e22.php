







<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon.png')); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <title><?php echo e($title ?? 'CGTA Admin'); ?></title>
</head>

<body class="font-poppins overflow-x-auto">
    <div x-data="{ isSidebarOpen: false, isCollapsed: false }" class="flex">
        <!-- Sidebar -->
        <div class="hidden lg:block group lg:fixed lg:inset-y-0 lg:z-50 flex flex-col bg-gray-900 transition-all duration-300 ease-in-out" :class="{ 'w-64': isCollapsed, 'w-20': !isCollapsed }" @mouseover="isCollapsed = true" @mouseleave="isCollapsed = false">
            <div class="flex flex-col grow gap-y-5 overflow-y-auto pb-4">
                <div class="flex justify-center pt-10 h-16 shrink-0 items-center">
                    <img class="h-20 w-auto" src="/assets/event1.jpg" alt="Your Company">
                </div>
                <nav class="flex flex-1 flex-col p-3 overflow-hidden">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="space-y-3 py-4 px-4">


                                


                                <li>
                                    <a href="<?php echo e(route('dashboard')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-tachometer-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('events')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-calendar-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Events</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('event-category')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-list h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Event Category</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('member')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-users h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('company')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-building h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Company</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('services')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-briefcase h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('regions')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-map-marker-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Regions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('packages')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Packages</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('package-service')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box-open h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Package Service</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('settings')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-cogs h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Mobile Sidebar -->
        <div
            class="lg:hidden fixed inset-y-0 z-50 bg-gray-900 transition-all duration-300 ease-in-out"
            :class="{ 'w-64': isSidebarOpen, 'w-0': !isSidebarOpen }"
        >
            <div class="flex flex-col gap-y-5 overflow-y-auto pb-4">
                <div class="flex justify-center pt-10 h-16 shrink-0 items-center">
                    <img class="h-20 w-auto" src="/storage/app/public/assets/img.png" alt="Your Company">
                    <button @click="isSidebarOpen = false" class="absolute top-5 right-4 text-md font-semibold border-gray-200 text-white hover:bg-white hover:text-gray-900 transition-colors duration-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <nav class="flex flex-1 flex-col p-3 overflow-x-hidden">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="space-y-3 py-4 px-4">
                                <li>
                                    <a href="<?php echo e(route('dashboard')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-tachometer-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('events')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-calendar-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Events</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('event-category')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-list h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Event Category</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('member')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-users h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('company')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-building h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Company</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('services')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-briefcase h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('regions')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-map-marker-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Regions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('packages')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Packages</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('package-service')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box-open h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Package Service</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('settings')); ?>" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-cogs h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="main-content flex-grow transition-all duration-300" :class="{ 'ml-64': isCollapsed && window.innerWidth >= 1024, 'lg:ml-20': !isCollapsed }">
            <!-- Topbar -->
            <div class="sticky top-0 z-40 flex h-16 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                <button
                    @click="isSidebarOpen = !isSidebarOpen"
                    class="lg:hidden p-2 text-gray-500 hover:text-gray-900 focus:outline-none"
                >
                    <i class="fas fa-bars h-6 w-6"></i>
                </button>
                <div class="text-xl font-bold text-gray-700 tracking-wide flex flex-col items-start">
                    <span>Connecting GTA</span>
                    <small class="text-sm font-normal text-gray-500">Join the Network</small>
                </div>

                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <form class="relative flex flex-1" action="#" method="GET">
                        <input id="search-field" disabled class="block h-full w-1/2 py-2 pl-8 pr-0 text-gray-900 border border-gray-300 rounded-md" type="search" name="search" placeholder="Search...">
                    </form>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <button type="button" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View notifications</span>
                            <i class="fas fa-bell h-6 w-6"></i>
                        </button>
                        <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-900/10" aria-hidden="true"></div>
                        <div class="relative">
                            <button type="button" class="flex items-center">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full bg-gray-50" src="https://via.placeholder.com/64" alt="User Avatar">
                                <span class="hidden lg:flex lg:items-center">
                                    <span class="ml-4 text-sm font-semibold leading-6 text-gray-900">Tom Cook</span>
                                    <i class="fas fa-chevron-down ml-2 text-gray-400"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <div class="overflow-auto ">
                    <?php echo e($slot); ?>

                </div>
            </main>
        </div>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('alerts-component', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-144950530-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</body>

</html>
<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>