<?php

namespace App\Livewire;


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

    // Mount
    public function mount()
    {
        $this->members = Member::all();
        $this->packages = Package::all();
        $this->regions = Region::all();
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
        $this->validate([
            'companyName' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'address' => 'required',
            'joinDate' => 'required|date',
            'services' => 'required',
            'bio' => 'required',
            'member_id' => 'required',
            'package_id' => 'required',
            'region_id' => 'required',
            'city' => 'required',
        ]);

        if ($this->isUpdate) {
            // Update company
            $company = Company::findOrFail($this->company_id);
            $company->update([
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
            ]);
            session()->flash('message', 'Company updated successfully!');
        } else {
            // Add new company
            Company::create([
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
            ]);
            session()->flash('message', 'Company added successfully!');
        }

        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.company-form');
    }
}
