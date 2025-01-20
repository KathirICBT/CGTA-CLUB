<?php

// namespace App\Http\Livewire\Pages\Package;
namespace App\Livewire\Pages\Package\PackageComp;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class PackageTableComponent extends Component
{
    // Properties for data and headers
    public $datas = [];
    public array $headers = [];
    public string $routeName = '';

    protected $listeners = [
        'edit' => 'editPackage',
        'delete' => 'deletePackage',
    ];

    // Method to handle the edit action
    public function editPackage($id)
    {
        // Log the ID for debugging
        error_log("Dispatching package-edit with ID: $id");

        // Redirect to the Package Form route with the ID as a parameter
        return Redirect::route('package-form.edit', ['packageId' => $id]);
    }

    // Method to handle the delete action
    public function deletePackage($id)
    {
        // Log the ID for debugging
        error_log("Dispatching package-delete with ID: $id");

        // Dispatch an event for deletion (you can extend this to confirm deletion)
        $this->dispatch('packageDelete', $id);
    }

    public function mount($datas, $headers = [], $routeName = ''): void
    {
        $this->datas = $datas;
        $this->headers = $headers;
        $this->routeName = $routeName;
    }

    public function render()
    {
        return view('livewire.pages.package.package-comp.package-table-component', [
            'packages' => $this->datas,
            'headers' => $this->headers,
        ]);
    }
}
