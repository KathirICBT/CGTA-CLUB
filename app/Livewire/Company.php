<?php

namespace App\Livewire;

use App\Models\Company as CompanyModel; // Alias the model to avoid confusion
use App\Models\Member;
use App\Models\Package;
use App\Models\Region; // Import Region model
use Livewire\Component;
use Livewire\WithFileUploads;

class Company extends Component
{
    use WithFileUploads;

    public $companies = [];
    public $company_id, $member_id, $package_id, $companyName, $email, $phonenumber,
           $address, $joinDate, $services, $bio, $logoImg, $status, $region_id, $city;
    public $members, $packages, $regions;
    public $isUpdate = false;

    protected $rules = [
        'member_id' => 'required',
        'package_id' => 'required',
        'companyName' => 'required|string',
        'email' => 'required|email',
        'phonenumber' => 'required|string',
        'address' => 'nullable|string',
        'joinDate' => 'required|date',
        'services' => 'nullable|string',
        'bio' => 'nullable|string',
        'logoImg' => 'nullable|image|max:2048', // Optional image validation
        'status' => 'required|string',
        'region_id' => 'required|integer|exists:regions,id',
        'city' => 'required|string',
    ];

    public function mount()
    {
        $this->members = Member::all();
        $this->packages = Package::all();
        $this->regions = Region::all(); // Load regions
        $this->loadCompanies();
    }

    public function loadCompanies()
    {
        $this->companies = CompanyModel::with(['member', 'package'])->get(); // Use the alias for the model
    }

    public function resetForm()
    {
        $this->company_id = null;
        $this->member_id = null;
        $this->package_id = null;
        $this->companyName = '';
        $this->email = '';
        $this->phonenumber = '';
        $this->address = '';
        $this->joinDate = '';
        $this->services = '';
        $this->bio = '';
        $this->logoImg = '';
        $this->status = '';
        $this->region_id = null;
        $this->city = '';
        $this->isUpdate = false;
    }

    public function store()
    {
        $this->validate();

        $logoPath = $this->logoImg ? $this->logoImg->store('logos', 'public') : null;

        CompanyModel::create([
            'member_id' => $this->member_id,
            'package_id' => $this->package_id,
            'companyName' => $this->companyName,
            'email' => $this->email,
            'phonenumber' => $this->phonenumber,
            'address' => $this->address,
            'joinDate' => $this->joinDate,
            'services' => $this->services,
            'bio' => $this->bio,
            'logoImg' => $logoPath,
            'status' => $this->status,
            'region_id' => $this->region_id,
            'city' => $this->city,
        ]);

        session()->flash('message', 'Company created successfully.');
        $this->resetForm();
        $this->loadCompanies();
    }

    public function edit($id)
    {
        $company = CompanyModel::findOrFail($id); // Use the alias
        $this->company_id = $company->id;
        $this->member_id = $company->member_id;
        $this->package_id = $company->package_id;
        $this->companyName = $company->companyName;
        $this->email = $company->email;
        $this->phonenumber = $company->phonenumber;
        $this->address = $company->address;
        $this->joinDate = $company->joinDate;
        $this->services = $company->services;
        $this->bio = $company->bio;
        $this->logoImg = $company->logoImg;
        $this->status = $company->status;
        $this->region_id = $company->region_id;
        $this->city = $company->city;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate();

        $company = CompanyModel::findOrFail($this->company_id);

        $logoPath = $this->logoImg ? $this->logoImg->store('logos', 'public') : $company->logoImg;

        $company->update([
            'member_id' => $this->member_id,
            'package_id' => $this->package_id,
            'companyName' => $this->companyName,
            'email' => $this->email,
            'phonenumber' => $this->phonenumber,
            'address' => $this->address,
            'joinDate' => $this->joinDate,
            'services' => $this->services,
            'bio' => $this->bio,
            'logoImg' => $logoPath,
            'status' => $this->status,
            'region_id' => $this->region_id,
            'city' => $this->city,
        ]);

        session()->flash('message', 'Company updated successfully.');
        $this->resetForm();
        $this->loadCompanies();
    }

    public function delete($id)
    {
        CompanyModel::findOrFail($id)->delete();
        session()->flash('message', 'Company deleted successfully.');
        $this->loadCompanies();
    }

    public function render()
    {
        return view('livewire.company');
    }
}
