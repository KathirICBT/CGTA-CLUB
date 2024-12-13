<?php

namespace App\Livewire\Pages\Member;

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Member extends Component
{
    public $members = [];
    public $showForm = false;
    public $isTableView = true; // Default is table view

    public $memberId;
    public function openForm()
    {
        $this->showForm = true; // Open the popup
    }
    public function toggleView($view)
    {
        $this->isTableView = $view === 'table'; // Toggle between 'table' and 'card'
    }
    public function closeForm()
    {
        $this->showForm = false;  // Close the form
        return redirect()->route('member');
    }

    public function copyToClipboard($type)
    {
        if ($type === 'email') {
            session()->flash('success', 'Email copied to clipboard!');
        } elseif ($type === 'phone') {
            session()->flash('success', 'Phone number copied to clipboard!');
        } else {
            session()->flash('error', 'Invalid copy request!');
        }

        // Dispatch notification to show success or error messages
        $this->dispatch('notify', ['message' => session('success') ?: session('error')]);
    }

    public $headers = [
//        'ID',
        'Photo',
        'First Name',
        'Last Name',
        'Email',
        'Phone',
        'Date of Birth',
        'Joined Date',
        'Status',
        'Membership Type',
        'Renewal Date',
        'Action'
    ];

    public function mount()
    {
        error_log('mount is triggered');
        try {
            // Fetch members directly from the database using Eloquent
            $controller = new MemberController();
            $response = $controller->index();
            // Convert the stdClass object to an array
            $this->members = collect(json_decode(json_encode($response->getData()), true))->map(function ($member) {
                // Ensure each member has a full photo URL
                $member['photo_url'] = $member['photo'] ? (str_contains($member['photo'], 'http') ? $member['photo'] : url('storage/' . $member['photo'])) : null;
                return $member;
            });
//            dump($this->members);
            error_log('members successfully fetched from database ');
        } catch (\Exception $e) {
            session()->flash('error', 'Error fetching members: ' . $e->getMessage());
            error_log('Error fetching members: ' . $e->getMessage());
        }
    }



//    public $members = [
//        [
//            "id" => 1,
//            "first_name" => "John",
//            "last_name" => "Doe",
//            "email" => "johndoe@example.com",
//            "phone" => "1234567890",
//            "date_of_birth" => "1990-01-01",
//            "join_date" => "2024-01-01",
//            "photo" => null,
//            "bio" => "A passionate developer and community leader.",
//            "status" => "waiting",
//            "membership_level" => "Premium",
//            "renewal_date" => "2024-12-31",
//        ],
//    ];

//    public function editMember($memberId)
//    {
//        $this->showForm = true; // Open the popup
//        if ($this->showForm) {
//            error_log('editMember is triggered');
//            error_log('editMember memberId is : ' . $memberId);
//
//            // Dispatch the event to MemberForm component
//            $this->dispatch('editMember', ['id' => $memberId]);
//            error_log('editMember event dispatched with memberId: ' . $memberId);
//
//        } else {
//            error_log('MemberForm is not visible, cannot dispatch event');
//        }
//
//    }

    public function editMember($memberId)
    {
        error_log('editMember is triggered');
        error_log('editMember memberId is : ' . $memberId);

        // Set the memberId when the edit button is clicked
        $this->memberId = $memberId;

        // Open the form by setting showForm to true
        $this->showForm = true;
    }

    public function deleteMember($memberId)
    {
        try {
            // Call the destroy method of MemberController
            $controller = new MemberController();
            $response = $controller->destroy($memberId);

            // Handle success response
            if ($response->getStatusCode() == 204) {
                session()->flash('success', 'Member deleted successfully!');
                return redirect()->route('member');
            } else {
                session()->flash('error', 'Failed to delete member.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting member: ' . $e->getMessage());
            error_log('Error deleting member: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.member.member', [
            'headers' => $this->headers,
//            'members' => $this->members,
        ]);
    }

}
