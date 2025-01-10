<?php

namespace App\Livewire\Pages\Company;

use Livewire\Component;
use App\Models\Company;
use App\Models\Member;
use App\Models\Package;
use App\Models\Region;

class CompanyForm extends Component
{
    // Properties
    public $members, $packages, $regions;
    public $companyName, $email, $phonenumber, $address, $joinDate, $services, $bio, $logoImg;
    public $member_id, $package_id, $region_id, $city;
    public $isUpdate = false;
    public $company_id;
    public $isTableView = true;

    // Function to toggle view
    public function toggleView($view)
    {
        $this->isTableView = $view === 'table';
    }
    // Mount
public function mount($companyId = null)
{
    // Load data for dropdowns
    $this->members = Member::all();
    $this->packages = Package::all();
    $this->regions = Region::all();

    // Check if a companyId is provided
    if ($companyId) {
        $this->isUpdate = true;
        $this->loadCompany($companyId);
    } else {
        $this->resetForm(); // Reset form if no companyId is provided
    }
}

    
    // Show form with data preloaded for editing
    public function showForm($companyId = null)
    {
        if ($companyId) {
            $this->isUpdate = true;
            $this->loadCompany($companyId);
        } else {
            $this->resetForm();
        }
    }

    // Load company data
    public function loadCompany($id)
    {
        $company = Company::findOrFail($id);
        $this->company_id = $company->id;
        $this->companyName = $company->companyName;
        $this->email = $company->email;
        $this->phonenumber = $company->phonenumber;
        $this->address = $company->address;
        $this->joinDate = $company->joinDate;
        $this->services = $company->services;
        $this->bio = $company->bio;
        $this->member_id = $company->member_id;
        $this->package_id = $company->package_id;
        $this->region_id = $company->region_id;
        $this->city = $company->city;
    }

    // Reset form
    public function resetForm()
    {
        $this->reset([
            'company_id', 'companyName', 'email', 'phonenumber', 'address',
            'joinDate', 'services', 'bio', 'member_id', 'package_id',
            'region_id', 'city', 'isUpdate'
        ]);
    }

    // Save company
    public function saveCompany()
{
    try {
        // Validate input fields
        $this->validate([
            'companyName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phonenumber' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'joinDate' => 'required|date',
            'services' => 'required|string|max:500',
            'bio' => 'required|string|max:500',
            'member_id' => 'required|integer',
            'package_id' => 'required|integer',
            'region_id' => 'required|integer',
            'city' => 'required|string|max:100',
        ]);

        // Prepare data for saving
        $data = [
            'companyName' => $this->companyName,
            'email' => $this->email,
            'phonenumber' => $this->phonenumber,
            'address' => $this->address,
            'joinDate' => $this->joinDate,
            'services' => $this->services,
            'bio' => $this->bio,
            'member_id' => $this->member_id,
            'package_id' => $this->package_id,
            'region_id' => $this->region_id,
            'city' => $this->city,
        ];

        // Check if it's an update or create operation
        if ($this->company_id) {
            // Update operation
            $company = Company::findOrFail($this->company_id);
            $company->update($data);

            error_log('Company updated successfully!');
            session()->flash('toasts', [
                ...session('toasts', []), // Preserve existing toasts
                ['type' => 'success', 'message' => 'Company updated successfully!'], // New toast
            ]);
        } else {
            // Create operation
            Company::create($data);

            error_log('Company created successfully!');
            session()->flash('toasts', [
                ...session('toasts', []), // Preserve existing toasts
                ['type' => 'success', 'message' => 'Company added successfully!'], // New toast
            ]);
        }

        // Redirect back to the company page
        return redirect()->route('company');

    } catch (\Exception $e) {
        // Handle errors
        error_log('Error saving company: ' . $e->getMessage());
        session()->flash('error', 'There was an error saving the company: ' . $e->getMessage());
    }
}

    
    public function edit($companyId)
{
    $company = Company::findOrFail($companyId); 
    $members = Member::all();
    $packages = Package::all();
    $regions = Region::all();
    return view('livewire.pages.company.company-form', compact('company','members','packages','regions'));
}

public function editCompany($companyId, $action = 'form')
    {
        try {
            // Debugging the company ID
            error_log('Company ID: ' . ($companyId ?? 'NULL'));
    
            // Validate company ID
            if (!$companyId || !is_numeric($companyId)) {
                throw new \Exception('Invalid company ID provided');
            }
    
            // Generate the correct URL
            $url = $action === 'form'
                ? route('company-form', ['companyId' => $companyId])
                : route('company'); // Default fallback route
    
            error_log('Redirecting to: ' . $url);
            return redirect($url);
    
        } catch (\Exception $e) {
            error_log('Error in editCompany: ' . $e->getMessage());
            session()->flash('error', 'Error editing company: ' . $e->getMessage());
            return redirect()->route('company'); // Redirect to a fallback route
        }
    }

    public function render()
    {
        return view('livewire.pages.company.company-form');
    }
}
