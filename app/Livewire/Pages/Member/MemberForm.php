<?php

namespace App\Livewire\Pages\Member;

use App\Http\Controllers\MemberController;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class MemberForm extends Component
{
    use WithFileUploads;

    public string $first_name;
    public string $last_name;
    public string $email;
    public string $phone;
    public $date_of_birth;
    public string $bio;
    public $join_date;
    public string $status = '';
    public string $membership_level = '';
    public string $password;
    public $photo;
    public $photoUrl;
    public $renewal_date;


    public $statusOptions = ['Active', 'Inactive', 'Waiting']; // Array of options
    public $membershipOptions = ['Exclusive', 'Exclusive VIP', 'Exclusive VIP - 369G']; // Array of options

    public $memberId;
    private bool $showForm = false;
    // Listen for the event

    public function mount($memberId = null)
    {
        error_log('received memberId from MemberForm mount(): ' . $memberId);
        // If memberId is passed, you can handle it (e.g., fetch the member data)
        if ($memberId) {
            $this->memberId = $memberId;
            $this->show($memberId);
        }
    }

//    #[On('editMember')]
//    public function editMember($data)
//    {
//        error_log('editMember is triggered from MemberForm.php');
//        error_log('Received memberId: ' . $data['id']);
//        $memberId = $data['id']; // Get the ID passed from Member.php
//        $this->show($memberId);  // Use the ID to fetch member data
//        $this->showForm = true;  // Show the modal form
//    }
//


//    #[On('editMember')]
//    public function handleEditMember($memberId)
//    {
//        error_log('handleEditMember is triggered');
//        error_log('handleEditMember receives memberId: ' . $memberId);
//        $this->memberId = $memberId;
//        // ... other logic to fetch and display member data
//    }

    public function submitForm()
    {
        try {
            // Include the photo as part of the data
//            $data = $this->all();
            $data = [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'date_of_birth' => $this->date_of_birth,
                'bio' => $this->bio,
                'join_date' => $this->join_date,
                'status' => $this->status,
                'membership_level' => $this->membership_level,
                'password' => $this->password,
                'renewal_date' => $this->renewal_date,
                'photo' => $this->photo ? $this->photo->store('photos', 'public') : null,
            ];
            // Convert $data to a Request object
            $request = new Request($data);

            // Create an instance of MemberController and call the store method
            $controller = new MemberController();

            if ($this->memberId) {
                // If member_id is set, perform update
                $controller->update($request, $this->memberId);
                error_log('Member updated successfully!');
                session()->flash('success', 'Member updated successfully!');
                return redirect()->route('member');
            } else {
                // If member_id is not set, perform creation
                $controller->store($request);
                error_log('Member created successfully!');
                session()->flash('success', 'Member created successfully!');
                return redirect()->route('member');
            }

            $this->reset(); // Reset form fields
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create member: ' . $e->getMessage());
            error_log('Failed to create member: ' . $e->getMessage());

        }
    }


    public function show($memberId)
    {
        error_log('mount is triggered from MemberForm.php');
        error_log('received memberId from MemberForm show(): ' . $memberId);

        try {
            // Fetch members directly from the database using Eloquent
            $controller = new MemberController();
            $response = $controller->show($memberId);
            // Parse the response to populate fields
            $member = json_decode(json_encode($response->getData()), true);

            // Map the member data to component fields
            $this->first_name = $member['first_name'] ?? '';
            $this->last_name = $member['last_name'] ?? '';
            $this->email = $member['email'] ?? '';
            $this->phone = $member['phone'] ?? '';
            $this->date_of_birth = $member['date_of_birth'] ?? null;
            $this->bio = $member['bio'] ?? '';
            $this->join_date = $member['join_date'] ?? null;
            $this->status = $member['status'] ?? '';
            $this->membership_level = $member['membership_level'] ?? '';
            $this->password = ''; // Do not prepopulate passwords for security reasons
            $this->photoUrl = $member['photo'] ? asset('storage/' . $member['photo']) : null;
            $this->renewal_date = $member['renewal_date'] ?? null;
            error_log('photo file or url: ' . $member['photo'] ?? '' );
            error_log('members successfully fetched from database ');
        } catch (\Exception $e) {
            session()->flash('error', 'Error fetching members: ' . $e->getMessage());
            error_log('Error fetching members: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.member.member-form');
    }
}
