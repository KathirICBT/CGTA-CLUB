<?php

namespace App\Livewire;

use Livewire\Component ;
use App\Models\Service as ServiceModel;
use Livewire\WithFileUploads;

class Service extends Component
{
    use WithFileUploads;

    public $services = [];
    public $service_id, $service, $description;
    public $isUpdate = false;

    protected $rules = [
        'service' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',  // Add description validation
    ];

    public function mount()
    {
        $this->loadServices();
    }

    public function loadServices()
    {
        $this->services = ServiceModel::all();
    }

    public function resetForm()
    {
        $this->service_id = null;
        $this->service = '';
        $this->description = '';
        $this->isUpdate = false;
    }

    public function store()
    {
        $this->validate();

        ServiceModel::create([
            'service' => $this->service,
            'description' => $this->description,  // Add description
        ]);

        session()->flash('message', 'Service created successfully.');
        $this->resetForm();
        $this->loadServices();
    }

    public function edit($id)
    {
        $service = ServiceModel::findOrFail($id);
        $this->service_id = $service->id;
        $this->service = $service->service;
        $this->description = $service->description;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate();

        $service = ServiceModel::findOrFail($this->service_id);
        $service->update([
            'service' => $this->service,
            'description' => $this->description,  // Add description
        ]);

        session()->flash('message', 'Service updated successfully.');
        $this->resetForm();
        $this->loadServices();
    }

    public function delete($id)
    {
        ServiceModel::findOrFail($id)->delete();
        session()->flash('message', 'Service deleted successfully.');
        $this->loadServices();
    }

    public function render()
    {
        return view('livewire.service');
    }
}
