{{-- <div x-data="{ menuOpen: false }">
    <header class="padding-x py-8 absolute z-10 w-full">
        <nav class="flex justify-between items-center max-container">
            <!-- Logo -->
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Connecting GTA Logo"
                    class="h-8 sm:h-10 md:h-16 lg:h-24 w-auto">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex flex-1 justify-center items-center gap-16">
                <livewire:user-panel.nav.navigation />
            </ul>

            <!-- Sign In & Register Buttons (Desktop) -->
            <div class="hidden lg:flex gap-3">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
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
        <div x-show="menuOpen" x-transition:enter="transition ease-out duration-200" 
             x-transition:leave="transition ease-in duration-150"
             class="lg:hidden bg-white shadow-md rounded-md mt-2 absolute left-0 w-full z-20">
            <ul class="flex flex-col items-center gap-4 py-4">
                <livewire:user-panel.nav.navigation />
            </ul>
            <!-- Sign In & Register Buttons (Mobile) -->
            <div class="flex justify-center gap-3 mt-4">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
                </a>
            </div>
        </div>
    </header>
</div> --}}

{{-- 
<div x-data="{ menuOpen: false }">
    <header class="padding-x py-8 absolute z-10 w-full">
        <nav class="flex justify-between items-center max-container">
            <!-- Logo -->
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Connecting GTA Logo"
                    class="h-8 sm:h-10 md:h-16 lg:h-24 w-auto">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex flex-1 justify-center items-center gap-16">
                <livewire:user-panel.nav.navigation />
            </ul>

            <!-- Sign In & Register Buttons (Desktop) -->
            <div class="hidden lg:flex gap-3">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
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
        <div x-show="menuOpen" x-transition:enter="transition ease-out duration-200" 
             x-transition:leave="transition ease-in duration-150"
             class="lg:hidden bg-white shadow-md rounded-md mt-2 absolute left-0 w-full z-20">
            <ul class="flex flex-col items-center gap-4 py-4">
                <livewire:user-panel.nav.navigation />
            </ul>
            <!-- Sign In & Register Buttons (Mobile) -->
            <div class="flex justify-center gap-3 mt-4 mb-4">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
                </a>
            </div>
        </div>
    </header>
</div> --}}

{{-- <div x-data="{ menuOpen: false, activeSubmenu: null }">
    <header class="padding-x py-8 absolute z-10 w-full">
        <nav class="flex justify-between items-center max-container">
            <!-- Logo -->
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Connecting GTA Logo"
                    class="h-8 sm:h-10 md:h-16 lg:h-24 w-auto">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex flex-1 justify-center items-center gap-16">
                <livewire:user-panel.nav.navigation />
            </ul>

            <!-- Sign In & Register Buttons (Desktop) -->
            <div class="hidden lg:flex gap-3">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
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
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-4"
            class="lg:hidden bg-white shadow-md rounded-md mt-2 absolute left-0 w-full z-20">
            <ul class="flex flex-col items-center gap-4 py-4">
                <livewire:user-panel.nav.navigation />
            </ul>

            <!-- Sign In & Register Buttons (Mobile) -->
            <div class="flex justify-center gap-3 mt-4 mb-4">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
                </a>
            </div>
        </div>
    </header>
</div> --}}




<div x-data="{ menuOpen: false }">
    <header class="padding-x py-8 absolute z-10 w-full">
        <nav class="flex justify-between items-center max-container">
            <!-- Logo -->
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Connecting GTA Logo"
                    class="h-8 sm:h-10 md:h-16 lg:h-24 w-auto">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex flex-1 justify-center items-center gap-16">
                <livewire:user-panel.nav.navigation />
            </ul>

            <!-- Sign In & Register Buttons (Desktop) -->
            <div class="hidden lg:flex gap-3">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
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
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-4"
            class="lg:hidden bg-white shadow-md rounded-md mt-2 absolute left-0 w-full z-20">
            <ul class="flex flex-col items-center gap-4 py-4">
                <livewire:user-panel.nav.navigation />
            </ul>
            <!-- Sign In & Register Buttons (Mobile) -->
            <div class="flex justify-center gap-3 mt-4 mb-4">
                <a href="{{ url('/login') }}" 
                   class="px-4 py-1 border border-teal-500 text-teal-500 bg-teal-100 rounded-full hover:bg-teal-500 hover:text-white transition duration-300 text-sm font-medium">
                    Sign In
                </a>
                <a href="{{ url('/register') }}" 
                   class="px-4 py-1 bg-teal-500 text-white rounded-full hover:bg-teal-600 transition duration-300 text-sm font-medium">
                    Register
                </a>
            </div>
        </div>
    </header>
</div>

