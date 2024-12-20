<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Region as RegionModel;

class Region extends Component
{
    public $regions;        // List of regions
    public $region_id;      // ID for editing
    public $region;         // Name of the region
    public $isUpdate = false;

    protected $rules = [
        'region' => 'required|string|unique:regions,region|max:255',
    ];

    public function mount()
    {
        $this->loadRegions();
    }

    public function loadRegions()
    {
        $this->regions = RegionModel::all(); // Load all regions
    }

    public function resetForm()
    {
        $this->region_id = null;
        $this->region = '';
        $this->isUpdate = false;
    }

    public function store()
    {
        $this->validate();

        RegionModel::create(['region' => $this->region]);

        session()->flash('message', 'Region added successfully.');
        $this->resetForm();
        $this->loadRegions();
    }

    public function edit($id)
    {
        $region = RegionModel::findOrFail($id);
        $this->region_id = $region->id;
        $this->region = $region->region;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate();

        $region = RegionModel::findOrFail($this->region_id);
        $region->update(['region' => $this->region]);

        session()->flash('message', 'Region updated successfully.');
        $this->resetForm();
        $this->loadRegions();
    }

    public function delete($id)
    {
        RegionModel::findOrFail($id)->delete();

        session()->flash('message', 'Region deleted successfully.');
        $this->loadRegions();
    }

    
    public function render()
    {
        return view('livewire.region');
    }

   
    

    // Method to reset the form and switch to Add mode
    public function cancelEdit()
    {
        $this->reset(['region']);
        $this->isUpdate = false;
    }

}
