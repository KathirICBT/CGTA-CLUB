<?php

namespace App\Livewire;

use App\Models\Package;
use App\Models\Service;
use App\Models\PackageService as PackageServiceModel;
use Livewire\Component;

class PackageService extends Component
{
    public $package_id, $selected_services = [], $packageServices, $packages, $services;
    public $isUpdate = false, $packageServiceId;

    protected $rules = [
        'package_id' => 'required|exists:packages,id',
        'selected_services.*' => 'required|exists:services,id', // Validate each selected service
    ];

    public function mount()
    {
        $this->packages = Package::all();
        $this->services = Service::all();
        $this->loadPackageServices();
        $this->selected_services = [null]; // Initialize with one empty service field
    }


    public function loadPackageServices()
    {
        // Load package services with their related package and service models
        $this->packageServices = PackageServiceModel::with('package', 'service')->get();
    }

    public function storePackageServices()
    {
        $this->validate();

        // Store each selected service for the package
        foreach ($this->selected_services as $service_id) {
            PackageServiceModel::create([
                'package_id' => $this->package_id,
                'service_id' => $service_id,
            ]);
        }

        $this->resetFields();
        $this->loadPackageServices();
        session()->flash('message', 'Package Services added successfully.');
    }

    public function editPackageService($id)
    {
        $this->isUpdate = true;
        $this->packageServiceId = $id;

        // Fetch the package service to edit
        $packageService = PackageServiceModel::findOrFail($id);
        $this->package_id = $packageService->package_id;
        $this->selected_services = [$packageService->service_id];  // For now, only one service is selected
    }

    public function updatePackageService()
    {
        $this->validate();

        // Update the package service details
        $packageService = PackageServiceModel::findOrFail($this->packageServiceId);
        $packageService->update([
            'package_id' => $this->package_id,
            'service_id' => $this->selected_services[0],  // Update with the first service
        ]);

        $this->resetFields();
        $this->loadPackageServices();
        session()->flash('message', 'Package Service updated successfully.');
    }

    public function deletePackageService($id)
    {
        PackageServiceModel::findOrFail($id)->delete();
        $this->loadPackageServices();
        session()->flash('message', 'Package Service deleted successfully.');
    }

    public function resetFields()
    {
        $this->package_id = '';
        $this->selected_services = [];
        $this->isUpdate = false;
        $this->packageServiceId = null;
        $this->selected_services = [null];
    }

    public function cancelEdit()
    {
        $this->resetFields();
    }

    public function addServiceField()
    {
        // Add a new service field dynamically
        $this->selected_services[] = null;
    }

    public function render()
    {
        return view('livewire.package-service');
    }
}

     