<div class="p-6 bg-gray-100 min-h-screen" x-data="{ showDetailsModal: false, showLogoModal: false }">
    <!-- Header -->
    <h2 class="text-2xl font-bold mb-6">Manage Companies</h2>

    <!-- Session Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Tabs -->
    <div class="mb-6">
        <ul class="flex border-b">
            <li class="mr-6">
                <button class="text-blue-500 font-semibold py-2 px-4 hover:text-blue-700"
                        wire:click="showList">
                    Companies List
                </button>
            </li>
            <li>
                <button class="text-blue-500 font-semibold py-2 px-4 hover:text-blue-700"
                        wire:click="showForm">
                    Add Company
                </button>
            </li>
        </ul>
    </div>

    <!-- Conditional Rendering -->
    @if ($isFormVisible)
        <!-- Include Company Form Component -->
        @livewire('company-form')
    @else
        <!-- Companies List Table -->
        <h3 class="text-xl font-bold mb-4">Companies List</h3>
        <div class="overflow-auto rounded-lg shadow">
            <table class="table-auto w-full">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="p-3 text-left font-medium text-gray-700">#</th>
                        <th class="p-3 text-left font-medium text-gray-700">Company Name</th>
                        <th class="p-3 text-left font-medium text-gray-700">Member</th>
                        <th class="p-3 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr class="border-b">
                            <td class="p-3">{{ $company->id }}</td>
                            <td class="p-3">{{ $company->companyName }}</td>
                            <td class="p-3">{{ $company->member->first_name ?? 'N/A' }}</td>
                            <td class="p-3">
                                <!-- Edit Button -->
                                <button wire:click="edit({{ $company->id }})"
                                        class="text-yellow-500 hover:text-yellow-700 mx-1">
                                    ✏️
                                </button>
                                <!-- Delete Button -->
                                <button wire:click="delete({{ $company->id }})"
                                        class="text-red-500 hover:text-red-700 mx-1">
                                    🗑️
                                </button>
                                <!-- View Details -->
                                <button wire:click="showDetails({{ $company->id }})"
                                        @click="showDetailsModal = true"
                                        class="text-blue-500 hover:text-blue-700 mx-1">
                                    👁️
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Details Modal -->
    @if ($selectedCompany)
    <div x-show="showDetailsModal" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="fixed inset-0 z-50 overflow-y-auto"
        @click.self="showDetailsModal = false"
        style="display: none;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

    <!-- Modal Container -->
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-md transform overflow-hidden rounded-xl bg-white shadow-2xl transition-all">
            <!-- Close Button -->
            <<button @click="showDetailsModal = false"
                class="absolute right-4 top-4 rounded-full p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
    

            <!-- Company Logo -->
            <div class="relative pt-6">
                <div class="flex justify-center">
                    <div class="relative" @click="showLogoModal = true">
                        <img src="{{ $selectedCompany->logoImg 
                            ? asset('storage/' . $selectedCompany->logoImg) 
                            : asset('images/default-logo.png') }}"
                                alt="Company Logo"
                                class="h-24 w-24 cursor-pointer rounded-full border-4 border-white object-cover shadow-lg transition-transform hover:scale-105">
                        <div class="absolute -bottom-1 -right-1 rounded-full bg-white p-1">
                            <div class="rounded-full bg-blue-500 p-1">
                                <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Information -->
            <div class="px-6 py-8">
                <h3 class="mb-6 text-center text-2xl font-bold text-gray-900">{{ $selectedCompany->companyName }}</h3>
                
                <div class="space-y-6">
                    <!-- Contact Person -->
                    <div class="flex items-center space-x-3 text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-medium">{{ $selectedCompany->member->first_name ?? 'N/A' }}</span>
                    </div>

                    <!-- Package -->
                    <div class="flex items-center space-x-3 text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span class="font-medium">{{ $selectedCompany->package->package_name ?? 'N/A' }}</span>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center space-x-3 text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="font-medium">{{ $selectedCompany->email }}</span>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-center space-x-3 text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="font-medium">{{ $selectedCompany->phonenumber }}</span>
                    </div>

                    <!-- Address -->
                    <div class="flex items-center space-x-3 text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-medium">{{ $selectedCompany->address }}</span>
                    </div>

                    <!-- Join Date -->
                    <div class="flex items-center space-x-3 text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="font-medium">Joined {{ \Carbon\Carbon::parse($selectedCompany->joinDate)->format('d/m/Y') }}</span>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center space-x-3 text-gray-700">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                        </svg>
                        <span class="font-medium">{{ $selectedCompany->region->region ?? 'N/A' }}, {{ $selectedCompany->city }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

        <!-- Full-Size Logo Modal -->
        <div x-show="showLogoModal" 
             class="fixed inset-0 bg-gray-900 bg-opacity-80 flex items-center justify-center z-50">
            <div class="relative p-4">
                <!-- Close Button -->
                <button @click="showLogoModal = false"
                        class="absolute top-2 right-2 text-white text-3xl hover:text-red-500">
                        
                    &times;
                </button>
                <!-- Large Logo Image -->
                <img src="{{ $selectedCompany->logoImg 
                        ? asset('storage/' . $selectedCompany->logoImg) 
                        : asset('images/default-logo.png') }}"
                     alt="Large Logo"
                     class="w-80 h-80 object-cover rounded-lg shadow-lg">
            </div>
        </div>
    @endif
</div>
