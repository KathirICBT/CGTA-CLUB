<?php

namespace App\Livewire\Pages\Package;

use App\Models\Package as PackageModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Package extends Component
{
    use WithFileUploads;

    public $packages = [];
    public $package_id, $package_name, $package_price, $tax, $description, $duration, $max_membercount;
    public $isEditMode = false;
    public $filteredPackages = [];
    public $headers = [
        'Package Name',
        'Price',
        'Tax %',
        'Description',
        'Duration',
        'Max Members',
        'Action',
    ];

    protected $rules = [
        'package_name' => 'required|string|max:255',
        'package_price' => 'required|numeric',
        'tax' => 'required|numeric',
        'description' => 'nullable|string',
        'duration' => 'required|integer',
        'max_membercount' => 'required|integer',
    ];

    public function mount()
    {
        $this->loadPackages();
        $this->getPackages();
    }

    public function loadPackages()
    {
        $this->packages = PackageModel::all();
    }

    public function getPackages()
    {
        try {
            $this->filteredPackages = PackageModel::all()->map(function ($package) {
                return [
                    'package_name' => $package->package_name,
                    'package_price' => $package->package_price,
                    'tax' => $package->tax,
                    'description' => $package->description,
                    'duration' => $package->duration,
                    'max_membercount' => $package->max_membercount,
                    'id' => $package->id,
                ];
            });
        } catch (\Exception $e) {
            error_log('Error fetching packages: ' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->package_id = null;
        $this->package_name = '';
        $this->package_price = '';
        $this->tax = '';
        $this->description = '';
        $this->duration = '';
        $this->max_membercount = '';
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        PackageModel::create([
            'package_name' => $this->package_name,
            'package_price' => $this->package_price,
            'tax' => $this->tax,
            'description' => $this->description,
            'duration' => $this->duration,
            'max_membercount' => $this->max_membercount,
        ]);

        session()->flash('message', 'Package added successfully.');
        $this->resetForm();
        $this->loadPackages();
        $this->getPackages();
    }

    public function edit($id)
    {
        $package = PackageModel::findOrFail($id);
        $this->package_id = $package->id;
        $this->package_name = $package->package_name;
        $this->package_price = $package->package_price;
        $this->tax = $package->tax;
        $this->description = $package->description;
        $this->duration = $package->duration;
        $this->max_membercount = $package->max_membercount;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();

        $package = PackageModel::findOrFail($this->package_id);
        $package->update([
            'package_name' => $this->package_name,
            'package_price' => $this->package_price,
            'tax' => $this->tax,
            'description' => $this->description,
            'duration' => $this->duration,
            'max_membercount' => $this->max_membercount,
        ]);

        session()->flash('message', 'Package updated successfully.');
        $this->resetForm();
        $this->loadPackages();
        $this->getPackages();
    }

    protected $listeners = [
        'packageDelete' => 'deletePackage',
    ];
    public function deletePackage($packageId)
    {
        try {
            // Log the packageId for debugging
            error_log("Attempting to delete package with ID: $packageId");
    
            // Ensure the Package model is imported
            $package = \App\Models\Package::findOrFail($packageId);
    
            // Delete the package
            $package->delete();
    
            // Show success message
            session()->flash('message', 'Package deleted successfully!');
            return redirect()->route('packages');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            error_log('Package not found: ' . $e->getMessage());
            session()->flash('error', 'Package not found.');
        } catch (\Exception $e) {
            // Log the error
            error_log('Error deleting package: ' . $e->getMessage());
            session()->flash('error', 'Error deleting package: ' . $e->getMessage());
        }
    
        // Redirect to a fallback route in case of an error
        return redirect()->route('packages');
    }
    

    // public function delete($id)
    // {
    //     try {
    //         $package = PackageModel::findOrFail($id);
    //         $package->delete();

    //         session()->flash('message', 'Package deleted successfully.');
    //         $this->loadPackages();
    //         $this->getPackages();
    //     } catch (\Exception $e) {
    //         session()->flash('error', 'Error deleting package: ' . $e->getMessage());
    //     }
    // }

    public function showDetails($packageId)
    {
        $this->selectedPackage = PackageModel::find($packageId);
        $this->showDetailsModal = true;
    }

    public function closeModal()
    {
        $this->showDetailsModal = false;
    }

    public function render()
    {
        return view('livewire.pages.package.package');
    }
}
