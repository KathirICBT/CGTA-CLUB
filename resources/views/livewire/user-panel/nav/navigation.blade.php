{{-- <div x-data="{ menuOpen: false, activeSubmenu: null }" class="relative">
    <!-- Navigation Links -->
    <ul class="lg:flex lg:items-center lg:gap-4 flex flex-col lg:flex-row text-left lg:text-center">
        @foreach ($links as $link)
            <li class="relative group lg:inline-block">
                <!-- Main Link -->
                @if (!empty($link['subLinks']))
                    <button 
                        type="button" 
                        class="flex items-center justify-between px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center"
                        @click="activeSubmenu === {{ $loop->index }} ? activeSubmenu = null : activeSubmenu = {{ $loop->index }}">
                        {{ $link['name'] }}
                        <!-- Stylish Dropdown Indicator -->
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            :class="{ 'rotate-180': activeSubmenu === {{ $loop->index }} }"
                            class="h-5 w-5 ml-2 text-gray-500 group-hover:text-blue-600 transition-transform duration-300"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                @else
                    <a 
                        href="{{ $link['url'] }}" 
                        class="block px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center">
                        {{ $link['name'] }}
                    </a>
                @endif

                <!-- Dropdown Menu -->
                @if (!empty($link['subLinks']))
                    <ul 
                        x-show="activeSubmenu === {{ $loop->index }}" 
                        @click.away="activeSubmenu = null"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:leave="transition ease-in duration-150"
                        class="bg-white shadow-md mt-1 px-3 w-full text-left lg:w-48 lg:absolute lg:left-0 lg:mt-2 lg:bg-white lg:shadow-lg lg:rounded-md lg:text-left z-50 border border-gray-200"
                    >
                        @foreach ($link['subLinks'] as $subLink)
                            <li class="py-1">
                                <a 
                                    href="{{ $subLink['url'] }}" 
                                    class="block py-1 px-3 text-gray-600 hover:text-blue-600 hover:bg-gray-100 transition duration-300 rounded-md">
                                    {{ $subLink['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div> --}}


{{-- GOOD ONE ================= --}}

{{-- <div x-data="{ menuOpen: false, activeSubmenu: null }" class="relative">
    <!-- Navigation Links -->
    <ul class="lg:flex lg:items-center lg:gap-4 flex flex-col lg:flex-row text-left lg:text-center">
        @foreach ($links as $link)
            <li class="relative group lg:inline-block">
                <!-- Main Link -->
                @if (!empty($link['subLinks']))
                    <button 
                        type="button" 
                        class="flex items-center justify-between px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center"
                        @click="activeSubmenu === {{ $loop->index }} ? activeSubmenu = null : activeSubmenu = {{ $loop->index }}">
                        {{ $link['name'] }}
                        <!-- Dropdown Indicator -->
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            :class="{ 'rotate-180': activeSubmenu === {{ $loop->index }} }"
                            class="h-5 w-5 ml-2 text-gray-500 group-hover:text-blue-600 transition-transform duration-300"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                @else
                    <a 
                        href="{{ $link['url'] }}" 
                        class="block px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center">
                        {{ $link['name'] }}
                    </a>
                @endif

                <!-- Dropdown Menu -->
                @if (!empty($link['subLinks']))
                    <ul 
                        x-show="activeSubmenu === {{ $loop->index }}" 
                        @click.away="activeSubmenu = null"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="bg-white shadow-md mt-1 px-3 w-full text-left lg:w-48 lg:absolute lg:left-0 lg:mt-2 lg:bg-white lg:shadow-lg lg:rounded-md lg:text-left z-50 border border-gray-200 origin-top"
                    >
                        @foreach ($link['subLinks'] as $subLink)
                            <li class="py-1">
                                <a 
                                    href="{{ $subLink['url'] }}" 
                                    class="block py-1 px-3 text-gray-600 hover:text-blue-600 hover:bg-gray-100 transition duration-300 rounded-md">
                                    {{ $subLink['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div> --}}


{{-- ANOTHER GOOD ONE =================================== --}}


<div x-data="{ menuOpen: false, activeSubmenu: null }" class="relative">
    <!-- Navigation Links -->
    <ul class="lg:flex lg:items-center lg:gap-4 flex flex-col lg:flex-row text-left lg:text-center">
        @foreach ($links as $link)
            <li class="relative group lg:inline-block">
                <!-- Main Link -->
                @if (!empty($link['subLinks']))
                    <button 
                        type="button" 
                        class="flex items-center justify-between px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center"
                        @click="activeSubmenu === {{ $loop->index }} ? activeSubmenu = null : activeSubmenu = {{ $loop->index }}">
                        {{ $link['name'] }}
                        <!-- Dropdown Indicator -->
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            :class="{ 'rotate-180': activeSubmenu === {{ $loop->index }} }"
                            class="h-5 w-5 ml-2 text-gray-500 group-hover:text-blue-600 transition-transform duration-300"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                @else
                    <a 
                        href="{{ $link['url'] }}" 
                        class="block px-3 py-2 text-lg font-medium text-gray-700 transition duration-300 hover:text-blue-600 w-full text-left lg:w-auto lg:text-center">
                        {{ $link['name'] }}
                    </a>
                @endif

                <!-- Dropdown Menu -->
                @if (!empty($link['subLinks']))
                    <ul 
                        x-show="activeSubmenu === {{ $loop->index }}" 
                        @click.away="activeSubmenu = null"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-y-0 origin-top"
                        x-transition:enter-end="opacity-100 transform scale-y-100 origin-top"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-y-100 origin-top"
                        x-transition:leave-end="opacity-0 transform scale-y-0 origin-top"
                        class="bg-white shadow-md mt-1 px-3 w-full text-left lg:w-48 lg:absolute lg:left-0 lg:mt-2 lg:bg-white lg:shadow-lg lg:rounded-md lg:text-left z-50 border border-gray-200 overflow-hidden"
                    >
                        @foreach ($link['subLinks'] as $subLink)
                            <li class="py-1">
                                <a 
                                    href="{{ $subLink['url'] }}" 
                                    class="block py-1 px-3 text-gray-600 hover:text-blue-600 hover:bg-gray-100 transition duration-300 rounded-md">
                                    {{ $subLink['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>


