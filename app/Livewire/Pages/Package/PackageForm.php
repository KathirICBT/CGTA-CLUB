<?php

namespace App\Livewire\Pages\Package;

use Livewire\Component;
use App\Models\Package;

class PackageForm extends Component
{
    // Define all properties used in the form
    public $packageName, $price, $tax, $duration, $description, $maxMemberCount;
    public $package_id = null; // For editing
    public $isUpdate = false;

    // Mount the component
    public function mount($packageId = null)
    {
        if ($packageId) {
            $this->isUpdate = true;
            $this->loadPackage($packageId);
        } else {
            $this->resetForm();
        }
    }

    // Load existing package for editing
    public function loadPackage($id)
    {
        $package = Package::findOrFail($id);
        $this->package_id = $package->id;
        $this->packageName = $package->package_name;
        $this->price = $package->package_price;
        $this->tax = $package->tax;
        $this->duration = $package->duration;
        $this->description = $package->description;
        $this->maxMemberCount = $package->max_membercount;
    }

    // Reset form fields
    public function resetForm()
    {
        $this->reset(['package_id', 'packageName', 'price', 'tax', 'duration', 'description', 'maxMemberCount']);
    }

    // Save or update the package
    public function savePackage()
    {
        $this->validate([
            'packageName' => 'required|string|max:255',
            'price' => 'required|numeric|min:0', // Ensure price is validated
            'tax' => 'required|numeric|min:0|max:100', // Tax as a percentage
            'duration' => 'required|integer|min:1',
            'description' => 'required|string|max:500',
            'maxMemberCount' => 'required|integer|min:1',
        ]);

        $data = [
            'package_name' => $this->packageName,
            'package_price' => $this->price,
            'tax' => $this->tax,
            'duration' => $this->duration,
            'description' => $this->description,
            'max_membercount' => $this->maxMemberCount,
        ];

        if ($this->isUpdate) {
            $package = Package::findOrFail($this->package_id);
            $package->update($data);
            session()->flash('success', 'Package updated successfully!');
        } else {
            Package::create($data);
            session()->flash('success', 'Package added successfully!');
        }

        return redirect()->route('packages');
    }

    public function render()
    {
        return view('livewire.pages.package.package-form');
    }
}
