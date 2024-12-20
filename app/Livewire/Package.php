<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package as PackageModel;

class Package extends Component
{
    public $packages, $package_name, $package_price, $tax, $description, $duration, $max_membercount, $package_id;
    public $isEditMode = false;

    protected $rules = [
        'package_name' => 'required|string|max:255',
        'package_price' => 'required|numeric',
        'tax' => 'required|numeric',
        'description' => 'nullable|string',
        'duration' => 'required|integer',
        'max_membercount' => 'required|integer',
    ];


    public function resetFields()
    {
        $this->package_name = '';
        $this->package_price = '';
        $this->tax = '';
        $this->description = '';
        $this->duration = '';
        $this->max_membercount = '';
        $this->package_id = null;
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
        $this->resetFields();
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
        $this->resetFields();
    }

    public function delete($id)
    {
        PackageModel::findOrFail($id)->delete();
        session()->flash('message', 'Package deleted successfully.');
    }
    public function cancelEdit()
    {
        $this->resetFields();
    }
    
    public function render()
    {
        $this->packages = PackageModel::all();
        return view('livewire.package');
    }
}
