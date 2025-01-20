<?php

namespace App\Livewire\Pages\Company;

use App\Models\Company as CompanyModel; // Alias the model to avoid confusion
use App\Models\Member;
use App\Models\Package;
use App\Models\Region; // Import Region model
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
class Company extends Component
{
    use WithFileUploads;

    public $companies = [];
    public $company_id, $member_id, $package_id, $companyName, $email, $phonenumber,
           $address, $joinDate, $services, $bio, $logoImg, $status, $region_id, $city;
    public $members, $packages, $regions;
    public $isUpdate = false;

    public $selectedCompany;

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
        $this->loadCompanies();  // Load companies, assuming this loads data
        $this->getCompanies();   // Assuming this method gets the companies
    
        
        // Only delete the company if companyId is passed in
        
    }
    
    
    

    public function toggleCompanyView($view)
{
    // Check if the selected view is 'table'
    $this->isTableView = $view === 'table';
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

    public $datas = [];
    public $filteredCompanies = [];
    public $headers = [
        'Company Name',
        'Member',
        'Package',
        'Join Date',
        'Logo Image',
        'Status',
        'Region',
        'Action'
    ];
    

    
    
    public function getCompanies()
{
    try {
        // Fetch all companies from the database
        $this->datas = CompanyModel::all();  // This is a Collection, not an array

        // You can directly use Collection methods like map(), filter(), etc.
        $this->filteredCompanies = $this->datas->map(function ($company) {
            return [
                'companyName' => $company->companyName,
                'member' => $company->member ? $company->member->first_name . ' ' . $company->member->last_name : 'N/A',
                'package' => $company->package ? $company->package->name : 'N/A',
                'joinDate' => $company->joinDate,
                'photo_url' => $company->logoImg ? url('storage/' . $company->logoImg) : null,
                'status' => $company->status,
                'region' => $company->region ? $company->region->name : 'N/A',
                'id' => $company->id,
            ];
        });

    } catch (\Exception $e) {
        // Log the error message if something goes wrong
        error_log('Error fetching companies: ' . $e->getMessage());
    }
}

    // public function store()
    // {
    //     $this->validate();

    //     $logoPath = $this->logoImg ? $this->logoImg->store('logos', 'public') : null;

    //     CompanyModel::create([
    //         'member_id' => $this->member_id,
    //         'package_id' => $this->package_id,
    //         'companyName' => $this->companyName,
    //         'email' => $this->email,
    //         'phonenumber' => $this->phonenumber,
    //         'address' => $this->address,
    //         'joinDate' => $this->joinDate,
    //         'services' => $this->services,
    //         'bio' => $this->bio,
    //         'logoImg' => $logoPath,
    //         'status' => $this->status,
    //         'region_id' => $this->region_id,
    //         'city' => $this->city,
    //     ]);

    //     session()->flash('message', 'Company created successfully.');
    //     $this->resetForm();
    //     $this->loadCompanies();
    // }

    // public function edit($id)
    // {
    //     $company = CompanyModel::findOrFail($id); // Use the alias
    //     $this->company_id = $company->id;
    //     $this->member_id = $company->member_id;
    //     $this->package_id = $company->package_id;
    //     $this->companyName = $company->companyName;
    //     $this->email = $company->email;
    //     $this->phonenumber = $company->phonenumber;
    //     $this->address = $company->address;
    //     $this->joinDate = $company->joinDate;
    //     $this->services = $company->services;
    //     $this->bio = $company->bio;
    //     $this->logoImg = $company->logoImg;
    //     $this->status = $company->status;
    //     $this->region_id = $company->region_id;
    //     $this->city = $company->city;
    //     $this->isUpdate = true;
    // }

    // public function update()
    // {
    //     $this->validate();

    //     $company = CompanyModel::findOrFail($this->company_id);

    //     $logoPath = $this->logoImg ? $this->logoImg->store('logos', 'public') : $company->logoImg;

    //     $company->update([
    //         'member_id' => $this->member_id,
    //         'package_id' => $this->package_id,
    //         'companyName' => $this->companyName,
    //         'email' => $this->email,
    //         'phonenumber' => $this->phonenumber,
    //         'address' => $this->address,
    //         'joinDate' => $this->joinDate,
    //         'services' => $this->services,
    //         'bio' => $this->bio,
    //         'logoImg' => $logoPath,
    //         'status' => $this->status,
    //         'region_id' => $this->region_id,
    //         'city' => $this->city,
    //     ]);

    //     session()->flash('message', 'Company updated successfully.');
    //     $this->resetForm();
    //     $this->loadCompanies();
    // }

    // public function delete($id)
    // {
    //     CompanyModel::findOrFail($id)->delete();
    //     session()->flash('message', 'Company deleted successfully.');
    //     $this->loadCompanies();
    // }

    public function handleEdit($id)
    {
        // Log the event for testing
        error_log("Editing ccc with ID: $id");

    }


    public function handleDelete($id)
    {
        // Log the event for testing
        error_log("Deleting ccc with ID: $id");
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
                : route('companies'); // Default fallback route
    
            error_log('Redirecting to: ' . $url);
            return redirect($url);
    
        } catch (\Exception $e) {
            error_log('Error in editCompany: ' . $e->getMessage());
            session()->flash('error', 'Error editing company: ' . $e->getMessage());
            return redirect()->route('companies'); // Redirect to a fallback route
        }
    }
    


    protected $listeners = [
        'companyDelete' => 'deleteCompany',
    ];


public function deleteCompany($companyId)
{
    try {
        // Log the companyId for debugging
        error_log("Dispatching company-delete with ID in company php: $companyId");

        // Check if company exists
        $company = CompanyModel::findOrFail($companyId);

        // Delete logo image if it exists
        if ($company->logoImg) {
            if (Storage::disk('public')->exists($company->logoImg)) {
                Storage::disk('public')->delete($company->logoImg);
            } else {
                error_log('Logo image does not exist: ' . $company->logoImg);
            }
        }

        // Delete the company
        $company->delete();

        // Show success message
        session()->flash('message', 'Company deleted successfully!');
        return redirect()->route('companies');

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        error_log('Company not found: ' . $e->getMessage());
        session()->flash('error', 'Company not found.');
    } catch (\Exception $e) {
        // Log the error with the correct variable
        error_log('Error deleting company: ' . $e->getMessage());
        session()->flash('error', 'Error deleting company: ' . $e->getMessage());
    }

    // Redirect to a fallback route in case of an error
    return redirect()->route('company');
}


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


    // Method to show the company details in a modal
    public function showDetails($companyId)
    {
        $this->selectedCompany = CompanyModel::with(['member', 'package', 'region'])->find($companyId);
        $this->showDetailsModal = true;  // Opens the modal
    }


    public function closeModal()
    {
        $this->showDetailsModal = false;
    }
    // public function render()
    // {
    //     return view('livewire.pages.company.company', [
    //         'companies' => Company::all(), // or your custom query
    //     ]);
    // }
    public function render()
    {
        return view('livewire.pages.company.company');
    }



}
