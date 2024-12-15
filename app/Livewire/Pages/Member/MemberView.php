<?php

namespace App\Livewire\Pages\Member;

use App\Http\Controllers\MemberController;
use Livewire\Component;

class MemberView extends Component
{
    public $memberId;
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

    public function mount($memberId = null)
    {
        error_log('mount is triggered from MemberView.php');
        $this->memberId = $memberId;

        error_log('received memberId from route parameter in MemberView.php: ' . $this->memberId);

        if ($this->memberId) {
            $this->show($this->memberId); // Your logic to handle the memberId
        }
    }

    public function show($memberId)
    {
        error_log('received memberId from MemberView show(): ' . $memberId);

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
        return view('livewire.pages.member.member-view');
    }
}
