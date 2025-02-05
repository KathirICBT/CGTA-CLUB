<div class="p-6 bg-gray-100 min-h-screen" x-data="{ showDetailsModal: false }">
    <!-- Header -->
    <h2 class="text-2xl font-bold mb-6">Manage Companies</h2>

    <div class="md:flex md:items-center md:justify-between bg-transparent md:p-4 px-5 rounded-xl">
        <div class="flex items-center w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-1 shadow-sm">
            <i class="fas fa-search text-gray-400"></i> <!-- Search Icon -->
            <input
                type="text"
                placeholder="Search..."
                class="ml-2 flex-grow border-none outline-none text-gray-700 bg-transparent"
            />
        </div>

        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex justify-center items-center space-x-5">
            <div class="flex items-center bg-gray-100 rounded-xl space-x-4 p-2">
                <!-- Table Icon -->
                <div class="px-1 py-1">
                    <button id="table-view" wire:click="toggleView('table')" class="text-gray-500 text-xl hover:text-gray-300 focus:outline-none transition-colors duration-300">
                        <i class="fas fa-table"></i>
                    </button>
                </div>
            </div>

            <button
                type="button"
                class="block rounded-md bg-emerald-600 px-3 py-1 text-center text-md font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                <a href="<?php echo e(route('company-form.create')); ?>">
                    +
                </a>
            </button>

        </div>
    </div>

    
    <div class="overflow-x-auto bg-white">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.company.company-comp.company-table-component', ['datas' => $filteredCompanies,'headers' => $headers,'routeName' => 'company-form']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2861286975-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
    

    <!-- Company Details Modal -->
    <div x-show="showDetailsModal" x-cloak class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
        <button wire:click="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Close</button>

        <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
            <h3 class="text-xl font-bold mb-4">Company Details</h3>
            <!--[if BLOCK]><![endif]--><?php if($selectedCompany): ?>
                <p><strong>Company Name:</strong> <?php echo e($selectedCompany->companyName); ?></p>
                <p><strong>Member:</strong> <?php echo e($selectedCompany->member->first_name ?? 'N/A'); ?> <?php echo e($selectedCompany->member->last_name ?? ''); ?></p>
                <p><strong>Package:</strong> <?php echo e($selectedCompany->package->name ?? 'N/A'); ?></p>
                <p><strong>Region:</strong> <?php echo e($selectedCompany->region->name ?? 'N/A'); ?></p>
                <!-- Add more details as needed -->

                <!-- Close Button -->
                <button wire:click="$set('showDetailsModal', false)" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Close</button>
            <?php else: ?>
                <p>No details available.</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>
<?php /**PATH D:\Akshino\Client\CGTA\Project\CGTAProject\CGTA-CLUB\resources\views/livewire/pages/company/company.blade.php ENDPATH**/ ?>