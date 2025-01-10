<?php

namespace App\Livewire\Pages\Company\CompanyComp;
use Illuminate\Support\Facades\Redirect;
// namespace App\Livewire\Components\Pages\Company\CompanyComp;

use Livewire\Component;

class CompanyTableComponent extends Component
{
     // Properties for data and headers
     public $datas = [];
     public array $headers = [];
     public string $routeName = '';
    

     protected $listeners = [
        'edit' => 'editCompany',
        'delete' => 'deleteCompany',
    ];

    // Method to handle the edit action
    public function editCompany($id)
    {
        // Log the ID for debugging
        error_log("Dispatching company-edit with ID: $id");

        // Redirect to the Company Form route with the ID as a parameter
        return Redirect::route('company-form.edit', ['companyId' => $id]);
    }

    // Method to handle the delete action
    public function deleteCompany($id)
    {
        // Log the ID for debugging
        error_log("Dispatching company-delete with ID: $id");

        // Dispatch an event with the company's ID (you can extend this to confirm deletion)
        $this->dispatch('companyDelete', $id);
        // return Redirect::route('company.delete', ['companyId' => $id]);
        // $this->emit('company-delete', $id);   
    }
    

    
   

    
    public function mount($datas, $headers = [], $routeName = ''): void
    {
        $this->datas = $datas;
        $this->headers = $headers;
        $this->routeName = $routeName;
        // foreach ($this->datas as $key => $data) {
        //     error_log("Key: $key, Type: " . gettype($data) . ", Value: " . print_r($data, true));
        // }
    }

    public function render()
    {
        return view('livewire.pages.company.company-comp.company-table-component', [
            'companies' => $this->datas,
            'headers' => $this->headers,
        ]);
    }
    
}
