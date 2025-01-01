<?php

namespace App\Livewire\Pages\Member;

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class Member extends Component
{
    public $members = [];
    public $filteredMembers = [];
    public $showForm = false;
    public $isTableView = true; // Default is table view

    public $memberId;

    public $banner;
    public $bannerStyle;
    protected $listeners = ['clearNotification'];

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
    public function openForm()
    {
        $this->showForm = true; // Open the popup
    }
    public function toggleView($view)
    {
        $this->isTableView = $view === 'table'; // Toggle between 'table' and 'card'
        $this->banner = null;
        $this->bannerStyle = null;
    }
    public function closeForm()
    {
        $this->showForm = false;  // Close the form
        return redirect()->route('member');
    }


    public function handleEdit($id)
    {
        // Log the event for testing
        error_log("Editing member with ID: $id");

    }


    public function handleDelete($id)
    {
        // Log the event for testing
        error_log("Deleting member with ID: $id");
    }

    public function copyToClipboard($type)
    {
        if ($type === 'email') {
            session()->flash('success', 'Email copied to clipboard!');
            // Set the notification message and style
            $this->banner = 'Email copied to clipboard!';
            $this->bannerStyle = 'success'; // You can use 'danger', 'warning', etc.

        } elseif ($type === 'phone') {
            session()->flash('success', 'Phone number copied to clipboard!');
            $this->banner = 'Phone number copied to clipboard!';
            $this->bannerStyle = 'success';
        } else {
            session()->flash('error', 'Invalid copy request!');
        }

//        // Dispatch notification to show success or error messages
        $this->dispatch('notify', ['message' => session('success') ?: session('error')]);

    }


    public function mount()
    {
        error_log('mount is triggered');

        // Loop through each member and combine first_name and last_name into full_name

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

            // Create a new filtered array with only preferred fields
            $this->filteredMembers = $this->members->map(function ($member) {
                return [
                    'photo_url' => $member['photo_url'], // Include photo URL
                    'id' => $member['id'], // Include ID
//                    'full_name' => $member['first_name'] . ' ' . $member['last_name'], // Combine first and last name
                    'first_name' => $member['first_name'], // Include email
                    'last_name' => $member['last_name'], // Include email
                    'email' => $member['email'], // Include email
                    'phone' => $member['phone'], // Include email
                    'date_of_birth' => $member['date_of_birth'], // Include email
                    'joinedDate' => $member['join_date'], // Include email
                    'status' => $member['status'], // Include status
                    'membership_level' => $member['membership_level'], // Include status
                    'renewal_date' => $member['renewal_date'], // Include status
                ];
            });


//            dump($this->members);
            error_log('members successfully fetched from database ');
        } catch (\Exception $e) {
            session()->flash('error', 'Error fetching members: ' . $e->getMessage());
            error_log('Error fetching members: ' . $e->getMessage());
        }
    }


    public function editMember($memberId, $action)
    {
        error_log('editMember is triggered');
        error_log('editMember memberId is : ' . $memberId);

        if ($action === 'form') {
            // Redirect to member-form
            $url = route('member-form', ['memberId' => $memberId]);
        } elseif ($action === 'view') {
            // Redirect to member-view
            $url = route('member-view', ['memberId' => $memberId]);
        } else {
            // Default fallback or error if needed
            $url = route('member-list'); // or some default route
        }

        error_log('Redirecting to: ' . $url);

        return redirect($url);
    }

    #[On('delete')]
    public function deleteMember($id)
    {
        try {
            // Call the destroy method of MemberController
            $controller = new MemberController();
            $response = $controller->destroy($id);

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
        ]);
    }

}
