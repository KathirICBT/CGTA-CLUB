<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use App\Models\Package;
use App\Models\Region;
use App\Models\Company;

class CompanyForm extends Component
{
    public $members, $packages, $regions;
    public $companyName, $email, $phonenumber, $address, $joinDate, $services, $bio, $logoImg;
    public $member_id, $package_id, $region_id, $city;
    public $isUpdate = false;
    public $company;

    public function mount($company = null)
    {
        $this->members = Member::all();
        $this->packages = Package::all();
        $this->regions = Region::all();
        
        if ($company) {
            $this->isUpdate = true;
            $this->company = $company;
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
    }

    public function store()
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
        $this->reset();
    }

    public function update()
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

        $this->company->update([
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
        $this->reset();
    }

    // public function render()
    // {
    //     return view('livewire.company-form');
    // }
    public $isFormVisible = false; // This flag determines which view to show.

    // Handle showing the form for adding a company
    public function showForm()
    {
        $this->isFormVisible = true;
    }

    // Handle showing the list of companies
    public function showList()
    {
        $this->isFormVisible = false;
    }

    public function render()
    {
        return view('livewire.company-form', [
            'companies' => Company::all(), // or your custom query
        ]);
    }
}
