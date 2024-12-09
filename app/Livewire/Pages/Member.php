<?php

namespace App\Livewire\Pages;

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Member extends Component
{
    public $members = [];
    public $headers = [
        'ID',
        'First Name',
        'Last Name',
        'Email',
        'Phone',
        'Date of Birth',
        'join_date',
        'status',
        'membership_level',
        'renewal_date',
        'Action'
    ];

    public function mount()
    {

//        echo"<script>console.log('mount is triggered')</script>";
        error_log('mount is triggered');
        // Fetch data from API
//        try {
//            $response = Http::timeout(60)->get('http://localhost:8000/api/members');
//            echo"<script>console.log('hello')</script>";
//            if ($response->ok()) {
//                $this->members = $response->json();
//                error_log('members successfully received');
//            } else {
//                session()->flash('error', 'Failed to fetch members.');
//                error_log('Failed to fetch members.');
//            }
//        } catch (\Exception $e) {
//            session()->flash('error', 'Error connecting to the API: ' . $e->getMessage());
//            error_log('Error connecting to the API:' . $e->getMessage());
//
//        }

        try {
            // Fetch members directly from the database using Eloquent
            $controller = new MemberController();
            $response = $controller->index();
            // Convert the stdClass object to an array
            $this->members = json_decode(json_encode($response->getData()), true);
            


//           $this->members = MemberController::index();
//           $this->members = Member::all();

            dump($this->members);
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

    public function render()
    {
        return view('livewire.pages.member', [
            'headers' => $this->headers,
            'members' => $this->members,
        ]);
    }
}
