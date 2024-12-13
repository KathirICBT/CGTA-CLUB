<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        @vite('resources/css/app.css')
        @livewireStyles
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
    <div x-data="{ isCollapsed: false }" class="flex">
        <!-- Sidebar -->
        <div
            :class="isCollapsed ? 'w-20' : 'w-72'"
            class="lg:fixed lg:inset-y-0 lg:z-50 flex flex-col transition-all duration-300 bg-gray-900">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto pb-4">
                <div class="flex h-16 shrink-0 items-center">
                    <img class="h-8 w-auto" src="https://example.com/assets/img.png" alt="Your Company">
                </div>
                <nav class="flex flex-1 flex-col rounded-lg p-3 bg-transparent">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-3 py-4 px-4">
                                <li class="mt-auto">
                                    <a href="{{ route('dashboard') }}"
                                       class="group flex items-center gap-x-3  p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-tachometer-alt h-6 w-6 text-gray-400 group-hover:text-white pt-1 pl-1 "
                                           :class="isCollapsed ? 'flex justify-center items-center pr-1 pb-1' : ''"></i>
                                        <span :class="isCollapsed ? 'hidden' : 'block'">Dashboard</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('member') }}"
                                       class="group flex items-center gap-x-3  p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-calendar-alt h-6 w-6 text-gray-400 group-hover:text-white pl-1 pt-1 "
                                           :class="isCollapsed ? 'pr-3' : ''"></i>
                                        <span :class="isCollapsed ? 'hidden' : 'block'">Events</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('member') }}"
                                       class="group flex items-center gap-x-3  p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-users h-6 w-6 text-gray-400 group-hover:text-white  pt-1 "
                                           :class="isCollapsed ? '' : ''"></i>
                                        <span :class="isCollapsed ? 'hidden' : 'block'">Member</span>
                                    </a>
                                </li>
                                <li class="mt-auto">
                                    <a href="{{ route('settings') }}"
                                       class="group flex items-center gap-x-3 p-2 text-lg font-semibold leading-6 text-gray-400 hover:bg-blue-700 hover:text-white">
                                        <i class="fas fa-cogs h-6 w-6 text-gray-400 group-hover:text-white  pt-1 "
                                           :class="isCollapsed ? '' : ''"></i>
                                        <span :class="isCollapsed ? 'hidden' : 'block'">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div :class="isCollapsed ? 'lg:pl-16' : 'lg:pl-72'" class="flex-grow transition-all duration-300">
            <!-- Topbar -->
            <div
                class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                <button
                    @click="isCollapsed = !isCollapsed"
                    type="button"
                    class="-m-2.5 p-2.5 text-gray-700">
                    <span class="sr-only">Toggle sidebar</span>
                    <i x-show="!isCollapsed" class="fas fa-bars h-6 w-6 text-gray-700"></i> <!-- Hamburger Icon -->
                    <i x-show="isCollapsed" class="fas fa-times h-6 w-6 text-gray-700"></i> <!-- Close (X) Icon -->
                </button>

                <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"></div>

                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <form class="relative flex flex-1" action="#" method="GET">
                        <input
                            id="search-field"
                            disabled
                            class="block h-full w-1/2 py-0 pl-8 pr-0 text-gray-900"
                            type="search"
                            name="search"/>
                    </form>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                            </svg>
                        </button>
                        <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-900/10" aria-hidden="true"></div>
                        <div class="relative">
                            <button type="button" class="-m-1.5 flex items-center p-1.5">
                                <span class="sr-only">Open user menu</span>
                                <img
                                    class="h-8 w-8 rounded-full bg-gray-50"
                                    src="https://via.placeholder.com/64"
                                    alt="User Avatar"/>
                                <span class="hidden lg:flex lg:items-center">
                                <span class="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Tom Cook</span>
                                <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                          clip-rule="evenodd"/>
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
    </body>
</html>
