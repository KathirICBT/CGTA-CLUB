{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @livewireStyles
    <title>{{ $title ?? 'Page Title' }}</title>
    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            width: 80px;
            transition: width 0.3s ease;
        }

        .sidebar:hover {
            width: 250px;
        }

        .group .hidden-text {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s, visibility 0.3s;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .sidebar:hover .group .hidden-text {
            visibility: visible;
            opacity: 1;
        }

        .group .icon {
            visibility: visible;
            opacity: 1;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .sidebar:hover .group .icon {
            visibility: visible;
            opacity: 1;
        }

        .main-content {
            margin-left: 80px;
            transition: margin-left 0.3s ease;
        }

        .sidebar:hover ~ .main-content {
            margin-left: 250px;
        }

        .main-content, .sidebar {
            overflow: hidden;
        }

        html {
            overflow-x: hidden;
        }

        /* Prevent horizontal scrollbars */
        .main-content::-webkit-scrollbar {
            display: none;
        }

        .main-content {
            -ms-overflow-style: none; /* Internet Explorer 10+ */
            scrollbar-width: none; /* Firefox */
        }

        .sidebar a {
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            font-weight: 500;
        }

        .sidebar a:hover {
            font-weight: 600;
        }

    </style>
</head>

<body class="font-poppins">
    <div x-data="{ isCollapsed: false }" class="flex">
        <!-- Sidebar -->
        <div class="sidebar lg:fixed lg:inset-y-0 lg:z-50 flex flex-col transition-all duration-300 bg-gray-900">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto pb-4">
                <div class="flex pt-10 justify-center h-16 shrink-0 items-center">
                    <img class="h-20 w-auto" src="/storage/assets/img.png" alt="Your Company">
                </div>
                <nav class="flex flex-1 flex-col rounded-lg p-3 bg-transparent overflow-hidden">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-3 py-4 px-4">
                                <li class="mt-auto">
                                    <a href="{{ route('dashboard') }}"
                                        class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-tachometer-alt h-6 w-6 icon text-gray-400 group-hover:text-white pt-1 pl-1"></i>
                                        <span class="hidden-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('events') }}"
                                        class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-calendar-alt h-6 w-6 icon text-gray-400 group-hover:text-white pl-1 pt-1"></i>
                                        <span class="hidden-text">Events</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('member') }}"
                                        class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-users h-6 w-6 icon text-gray-400 group-hover:text-white pt-1"></i>
                                        <span class="hidden-text">Member</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('company') }}"
                                    class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                    <i class="fas fa-users h-6 w-6 icon text-gray-400 group-hover:text-white pt-1"></i>
                                        <span class="hidden-text">Company</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('services') }}"
                                    class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                    <i class="fas fa-users h-6 w-6 icon text-gray-400 group-hover:text-white pt-1"></i>
                                        <span class="hidden-text">Services</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('regions') }}"
                                    class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                    <i class="fas fa-users h-6 w-6 icon text-gray-400 group-hover:text-white pt-1"></i>
                                        <span class="hidden-text">Regions</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('packages') }}"
                                    class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                    <i class="fas fa-users h-6 w-6 icon text-gray-400 group-hover:text-white pt-1"></i>
                                        <span class="hidden-text">Packages</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('package-service') }}"
                                    class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                    <i class="fas fa-users h-6 w-6 icon text-gray-400 group-hover:text-white pt-1"></i>
                                        <span class="hidden-text">Package Service</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('settings') }}"
                                        class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-cogs h-6 w-6 icon text-gray-400 group-hover:text-white pt-1"></i>
                                        <span class="hidden-text">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="main-content flex-grow transition-all duration-300">
            <!-- Topbar -->
            <div
                class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">

                <!-- CONNECTING GTA Branding -->
                <div class="text-xl font-bold text-gray-700 tracking-wide flex flex-col items-start">
                    <span>Connecting GTA</span>
                    <small class="text-sm font-normal text-gray-500">Join the Network</small>
                </div>

                <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"></div>

                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <form class="relative flex flex-1" action="#" method="GET">
                        <input id="search-field" disabled class="block h-full w-1/2 py-0 pl-8 pr-0 text-gray-900"
                            type="search" name="search" />
                    </form>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                        <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-900/10" aria-hidden="true"></div>
                        <div class="relative">
                            <button type="button" class="-m-1.5 flex items-center p-1.5">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full bg-gray-50" src="https://via.placeholder.com/64"
                                    alt="User Avatar" />
                                <span class="hidden lg:flex lg:items-center">
                                    <span class="ml-4 text-sm font-semibold leading-6 text-gray-900"
                                        aria-hidden="true">Tom Cook</span>
                                    <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <main class="">
                <div class="overflow-hidden">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
    <livewire:alerts-component />
</body>

</html>
 --}}

{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @livewireStyles
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="font-poppins overflow-x-hidden">
    <div x-data="{ isCollapsed: false }" class="flex">
        <!-- Sidebar -->
        <div class="lg:fixed lg:inset-y-0 lg:z-50 flex flex-col bg-gray-900 transition-all duration-300 ease-in-out" :class="{ 'w-64': isCollapsed, 'w-20': !isCollapsed }" @mouseover="isCollapsed = true" @mouseleave="isCollapsed = false">
            <div class="flex flex-col grow gap-y-5 overflow-y-auto pb-4">
                <div class="flex justify-center pt-10 h-16 shrink-0 items-center">
                    <img class="h-20 w-auto" src="/storage/assets/img.png" alt="Your Company">
                </div>
                <nav class="flex flex-1 flex-col p-3">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="space-y-3 py-4 px-4">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-tachometer-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('events') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-calendar-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Events</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('member') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-users h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('company') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-building h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Company</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-briefcase h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('regions') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-map-marker-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Regions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('packages') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Packages</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('package-service') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box-open h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Package Service</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('settings') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-cogs h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 group-hover:inline-block transition-opacity duration-300 ease-in-out">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="main-content flex-grow transition-all duration-300" :class="{ 'ml-64': isCollapsed, 'ml-20': !isCollapsed }">
            <!-- Topbar -->
            <div class="sticky top-0 z-40 flex h-16 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
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
                <div class="overflow-hidden">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
    <livewire:alerts-component />
</body>

</html> --}}


{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @livewireStyles
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="font-poppins overflow-x-hidden">
    <div x-data="{ isCollapsed: false }" class="flex">
        <!-- Sidebar -->
        <div class="group lg:fixed lg:inset-y-0 lg:z-50 flex flex-col bg-gray-900 transition-all duration-300 ease-in-out" :class="{ 'w-64': isCollapsed, 'w-20': !isCollapsed }" @mouseover="isCollapsed = true" @mouseleave="isCollapsed = false">
            <div class="flex flex-col grow gap-y-5 overflow-y-auto pb-4">
                <div class="flex justify-center pt-10 h-16 shrink-0 items-center">
                    <img class="h-20 w-auto" src="/storage/assets/img.png" alt="Your Company">
                </div>
                <nav class="flex flex-1 flex-col p-3">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="space-y-3 py-4 px-4">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-x-3 p-2 text-lg font-normal text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-tachometer-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('events') }}" class="group flex items-center gap-x-3 p-2 text-lg font-normal text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-calendar-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Events</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('member') }}" class="group flex items-center gap-x-3 p-2 text-lg font-normal text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-users h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('company') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-building h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Company</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-briefcase h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('regions') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-map-marker-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Regions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('packages') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Packages</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('package-service') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box-open h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Package Service</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('settings') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-cogs h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out font-roboto">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="main-content flex-grow transition-all duration-300" :class="{ 'ml-64': isCollapsed, 'ml-20': !isCollapsed }">
            <!-- Topbar -->
            <div class="sticky top-0 z-40 flex h-16 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
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
                <div class="overflow-hidden">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
    <livewire:alerts-component />
</body>

</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @livewireStyles
    <title>{{ $title ?? 'CGTA Admin' }}</title>
</head>

<body class="font-poppins overflow-x-hidden">
    <div x-data="{ isCollapsed: false }" class="flex">
        <!-- Sidebar -->
        <div class="group lg:fixed lg:inset-y-0 lg:z-50 flex flex-col bg-gray-900 transition-all duration-300 ease-in-out" :class="{ 'w-64': isCollapsed, 'w-20': !isCollapsed }" @mouseover="isCollapsed = true" @mouseleave="isCollapsed = false">
            <div class="flex flex-col grow gap-y-5 overflow-y-auto pb-4">
                <div class="flex justify-center pt-10 h-16 shrink-0 items-center">
                    <img class="h-20 w-auto" src="/storage/app/public/assets/img.png" alt="Your Company">
                </div>
                <nav class="flex flex-1 flex-col p-3">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="space-y-3 py-4 px-4">


                                {{-- <li>
                                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-x-3 p-2 text-lg font-thin text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-tachometer-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Dashboard</span>
                                    </a>
                                </li> --}}


                                <li>
                                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-tachometer-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('events') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-calendar-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Events</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('member') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-users h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('company') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-building h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Company</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-briefcase h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('regions') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-map-marker-alt h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Regions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('packages') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Packages</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('package-service') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
                                        <i class="fas fa-box-open h-6 w-6 text-gray-400 group-hover:text-white transition-all duration-300 ease-in-out"></i>
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">Package Service</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('settings') }}" class="group flex items-center gap-x-3 p-2 text-lg font-semibold text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300 ease-in-out">
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

        <!-- Main content -->
        <div class="main-content flex-grow transition-all duration-300" :class="{ 'ml-64': isCollapsed, 'ml-20': !isCollapsed }">
            <!-- Topbar -->
            <div class="sticky top-0 z-40 flex h-16 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
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
                <div class="overflow-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
    <livewire:alerts-component />
</body>

</html>
